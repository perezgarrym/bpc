<form id="googlecheckout" method="POST" action="https://sandbox.google.com/checkout/api/checkout/v2/checkout/Merchant/<?php echo Configure::read('Settings.GOOGLE_CHECKOUT_MERCHANT_ID'); ?>" accept-charset="utf-8">
<input type="hidden" name="cart" value="<?php echo $this->Google->cart($shop['OrderItem']); ?>">
<input type="hidden" name="signature" value="<?php echo $this->Google->signature($shop['OrderItem']); ?>">
<input type="image" name="Google Checkout" alt="Fast checkout through Google" src="http://checkout.google.com/buttons/checkout.gif?merchant_id=<?php echo Configure::read('Settings.GOOGLE_CHECKOUT_MERCHANT_ID'); ?>&w=160&h=43&style=white&variant=text&loc=en_US" height="43" width="160"/>
</form>
<script>document.getElementById('googlecheckout').submit();</script>

