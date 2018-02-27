var stripe = Stripe('pk_test_6pRNASCoBOKtIshFeQd4XMUh');

var $form = $('#checkout-form');

$fomr.submit(function(event){
	$('charge-error').addClass('hidden');
	$fomr.find('button').prop.('disabled', true);
	Stripe.card.createToken({
		number: $('.card-number').val(),
		cvc: $('.card-cvc').val(),
		exp_month: $('.card-expiry-month').val(),
		exp_year: $('.card-expiry-year').val(),
		name: $('#card-name').val()
	}, stripeRespinseHandler);
	return false;	
});

function stripResponseHandler(status, response) {
	if (response.error){
		$('charge-error').removeClass('hidden');
		$('charge-error').text(response.error.message);
		$for.find('button').prop('disabled', false);
	}else {
		var token = response.id;
		$fomr.append($('<input type="hidden" name="stripeToken" />').val(token));

		// Submit the form:
		$form.get(0).submit();
	}
}
