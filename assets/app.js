/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

const $ = require('jquery');
// this "modifies" the jquery module: adding behavior to it
// the bootstrap module doesn't export/return anything
require('bootstrap');

// or you can include specific pieces
// require('bootstrap/js/dist/tooltip');
// require('bootstrap/js/dist/popover');

$(document).ready(function () {
  $('#order_tax').on('blur', function () {
    validate('#order_tax');
  });

  $('#order_coupon').on('blur', function () {
    validate('#order_coupon');
  });

  function validate(inputSelector, errorSelector) {
    const product = $('#order_product').val();
    const taxNumber = $('#order_tax').val();
    const couponCode = $('#order_coupon').val();

    $(inputSelector).removeClass('border border-success');

    if ($(inputSelector).val().length) {
      $.ajax({
        url:
          '/api/tax-number-validation?' +
          $.param({ product, taxNumber, couponCode }),
        type: 'GET',

        success: function (response) {
          $('#tax-number-error').html('');
          // Handle success response
          console.log('API response:', response);

          if (inputSelector === '#order_tax') {
            $(inputSelector).addClass('border border-success');
            $('#submit-button').prop('disabled', false);
          }

          $('#final-price').html(response.price);
        },
        error: function (error) {
          // Retrieve the error message from the response
          const errorMessage = error.responseText;
          $('#tax-number-error').html(errorMessage);
          if (inputSelector === '#order_tax') {
            $('#submit-button').prop('disabled', true);
          }
        },
      });
    } else {
      $(errorSelector).html('Should Not Be Empty');
      if (inputSelector === '#order_tax') {
        $('#submit-button').prop('disabled', true);
      }
    }
  }
});
