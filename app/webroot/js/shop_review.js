$(document).ready(function(){

	cardtype($('#OrderCreditcardNumber').val());

	$('#OrderCreditcardNumber').keyup(function() {
		cardtype($('#OrderCreditcardNumber').val());
	});

	function cardtype(num) {

		if(num.length == 1) {

			if(num == 4){
				$('#ccbox').css('background-position', '0 -23px');
			}
			else if(num == 5){
				$('#ccbox').css('background-position', '0 -46px');
			}
			else if(num == 3){
				$('#ccbox').css('background-position', '0 -69px');
			}
			else if(num == 6){
				$('#ccbox').css('background-position', '0 -92px');
			}

		} else if(num.length < 1){
			$('#ccbox').css('background-position', '0 0');
		}

		return true;

	}

});
