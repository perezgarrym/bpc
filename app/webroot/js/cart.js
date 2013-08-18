$(document).ready(function(){

	$('.numeric1').on('keypress', function(event) {
		if (event.keyCode == 13) {
			return true;
		}
		return (/\d/.test(String.fromCharCode(event.keyCode)));
	});

	$('.numeric').on('keyup change', function(event) {

		var quantity = Math.round($(this).val());

		if ((event.keyCode == 46 || event.keyCode == 8) && quantity > 0) {
		} else {
			if(/\d/.test(String.fromCharCode(event.keyCode)) === false) {
				return false;
			}
		}

		var id = $(this).attr("data-id");

		ajaxcart(id, quantity);

	});

	$(".remove").each(function() {
		$(this).replaceWith('<a class="remove" id="' + $(this).attr('id') + '" href="' + Shop.basePath + 'shop/remove/' + $(this).attr('id') + '" title="Remove item"><img src="' + Shop.basePath + 'img/icon-remove.gif" alt="Remove" /></a>');
	});

	$(".remove").click(function() {
		ajaxcart($(this).attr("id"), 0);
		return false;
	});

	function ajaxcart(id, quantity) {

		if(quantity === 0) {
			$('#row-' + id).fadeOut(1000, function(){ $('#row-' + id).remove(); });
		}

		$.ajax({
			type: "POST",
			url: Shop.basePath + "shop/itemupdate",
			data: {
				id: id,
				quantity: quantity
			},
			dataType: "json",
			success: function(data) {
				$.each(data.OrderItem, function(key, value) {
					if($('#subtotal-' + key).html() != value.subtotal) {
						$('#ProductQuantity-' + key).val(value.quantity);
						$('#subtotal-' + key).html(value.subtotal).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
					}
				});
				$('#subtotal').html('Php ' + data.Order.total).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
				$('#total').html('Php ' + data.Order.total).animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: "#fff" }, 500);
				if(data.Order.total === 0) {
					window.location.replace(Shop.basePath + "shop/clear");
				}
			},
			error: function() {
				window.location.replace(Shop.basePath + "shop/clear");
			}
		});
	}

});
