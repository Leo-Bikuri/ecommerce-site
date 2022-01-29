import * as cleaveJs from "https://cdn.skypack.dev/cleave.js"

function RemoveFaClass() {
  $('.cardtypei').removeClass('fa-cc-visa')
  $('.cardtypei').removeClass('fa-cc-mastercard')
  $('.cardtypei').removeClass('fa-cc-diners-club')
  $('.cardtypei').removeClass('fa-cc-jcb')
  $('.cardtypei').removeClass('fa-cc-amex')
  $('.cardtypei').removeClass('fa-cc-discover')
  $('.cardtypei').removeClass('other')
}


var cleave = new Cleave('.ccnumber', {
    creditCard: true,
    onCreditCardTypeChanged: function (type) {
      RemoveFaClass()
      if(type === 'visa') {
        $('.cardtypei').addClass('fa-cc-visa')
        return
      } else if(type === 'mastercard') {
        $('.cardtypei').addClass('fa-cc-mastercard')
        return
      } else if(type === 'diners') {
        $('.cardtypei').addClass('fa-cc-diners-club')
        return
      } else if(type === 'jcb') {
        $('.cardtypei').addClass('fa-cc-jcb')
        return
      } else if(type === 'discover') {
        $('.cardtypei').addClass('fa-cc-discover')
        return
      } else if(type === 'amex') {
        $('.cardtypei').addClass('fa-cc-amex')
        return
      } else {
        console.warn(type)
         $('.cardtypei').addClass('other')
      }
    }
})


let inputvals = {
  
}

$('.card-disp select').on('change', (e) => {
  inputvals[e.target.name] = e.target.value
  console.log('ye', e.target.value)
  let MM = $('.card-disp select[name="expireMM"]').val(),
      YY = $('.card-disp select[name="expireYY"]').val()
  
  console.log(`${MM}/${YY}`)
  console.log(MM+'.'+YY)
  
  $('.cd-inf-txt.expiresend').html(`${MM}/${YY}`)
  
})

$('.card-disp input').on('keyup', (e) => {
  inputvals[e.target.name] = e.target.value
  
  if(e.target.name === 'ccnumber') {
    $('.cd-inf-txt.cardnumber').html(e.target.value)
    return
  } else if(e.target.name === 'fullname') {
    $('.cd-inf-txt.cardholder').html(e.target.value)
    return
  }
  console.log(inputvals)
})


$(function() {

  var $form = $(".require-validation");

  $('form.require-validation').bind('submit', function(e) {
      var $form = $(".require-validation"),
          inputSelector = ['input[type=text]'].join(', '),
          $inputs = $form.find('.required').find(inputSelector),
          $errorMessage = $form.find('div.error'),
          valid = true;
      $errorMessage.addClass('hide');

      $('.has-error').removeClass('has-error');
      $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
              $input.parent().addClass('has-error');
              $errorMessage.removeClass('hide');
              e.preventDefault();
          }
      });

      if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('#ccnumber').val(),
            cvc: $('#ccv').val(),
            exp_month: $('#expireMM').val(),
            exp_year: $('#expireYY').val()
          }, stripeResponseHandler);
      }

  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];

          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }

});