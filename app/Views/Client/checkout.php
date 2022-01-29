<?php 
     $items = \Config\Services::cart();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Style - Checkout</title>
    <style>
      .hide{
        display: none;
      }
    </style>
</head>
<body>
    <div class="cont">
        <div class="bask-disp">
          <div class="bask-head">
            <h3>Check out</h3>
          </div>
          <div id="bask-body"></div>
          <div id="pagination" style="float:right;"></div>
          <div class="bask-foot">
            <table class="pricing">
              <tbody>
                <tr>
                  <td>Total:</td>
                  <td><?= "KSH ".$items->total()?></td>
                </tr>
                <tr>
                  <td>Delivery:</td>
                  <td>FREE</td>
                </tr>
                <tr>
                  <td>Total to pay:</td>
                  <td><?= "KSH ".$items->total()?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-disp">
          <div class="card-user-show">
            <i class="cardtypei fab"></i>
            <span class="cd-dsp-txt expiresend" id = 'expiry'>Expires end</span>
            <span class="cd-dsp-txt cardholder" id="card_holder">Card holder</span>
            
            <div class="cd-inf-txt cardnumber"></div>
            <div class="cd-inf-txt expiresend"></div>
            <div class="cd-inf-txt cardholder"></div>
          </div>
          <div class="card-input-area">
            <form action = "/payment" method = "POST"  class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="<?= STRIPE_KEY ?>" id="payment-form">
              <div class="fgroup fullname">
                <label for="fullname">Full name <span>*</span></label>
                <input placeholder="John Smith, etc." type="text" name="fullname" id="fullname" />
                <input type="hidden" name="amount" value = "<?= $items->total() ?>">
              </div>
              <div class="fgroup expire">
                <label for="expireMM">Expiry date <span>*</span></label>
                 <select name='expireMM' id='expireMM'>
                   <option disabled value=''>Month</option>
                   <option value='01'>01</option>
                   <option value='02'>02</option>
                   <option value='03'>03</option>
                   <option value='04'>04</option>
                   <option value='05'>05</option>
                   <option value='06'>06</option>
                   <option value='07'>07</option>
                   <option value='08'>08</option>
                   <option value='09'>09</option>
                   <option value='10'>10</option>
                   <option value='11'>11</option>
                   <option value='12'>12</option>
                 </select> 
                 <select name='expireYY' id='expireYY'>
                   <option disabled value=''>Year</option>
                   <option value='22'>2022</option>
                   <option value='23'>2023</option>
                   <option value='24'>2024</option>
                   <option value='25'>2025</option>
                   <option value='26'>2026</option>
                 </select> 
              </div>
              <div class="fgroup cnumber required">
                <label for="ccnumber">Card number <span>*</span></label>
                <div>
                  <input id="ccnumber" name="ccnumber" class="ccnumber" placeholder="####-####-####-####" />
                </div>
              </div>
              <div class="fgroup ccv required">
                <label for="ccv">CCV <span>*</span></label>
                <div>
                  <input id="ccv" name="ccv" placeholder="123" />
                </div>
              </div>
              <div class="card-next-aera error form-group hide">
              <div class='alert-danger alert'>Please correct the errors and try again.</div>
          </div>
              <div class="card-next-aera">
            <div class="btns">
              <button class="btn btn-1" type="submit">Continue to payment</button>
            </div>
          </div>
            </form>
          </div>
        </div>
  </div> 
      <?php $data = []; foreach($cart as $cart){
          $data[] = array(
            'id' => $cart['id'],
            'qty'=> $cart['qty'],
            'name'=>$cart['name'],
            'image'=>$cart['options']['image'],
            'subtotal' => $cart['subtotal']
          );
        } 
        $data = json_encode($data);
        ?>
  
      <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
      <script type="module" src="/js/checkout.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
      <script src="/jquery-validation-1.19.1/dist/jquery.validate.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
      <script>
        var cart = <?php echo $data; ?>;
      $(function(){
        let container = $('#pagination');
        container.pagination({
            dataSource: cart,
            pageSize: 4,
            showPageNumbers: false,
            showNavigator: true,
            callback: function(data, pagination) {
                var basket = "";
                $.each(data, function(index, item){
                  var baski = '<div class="baski"><div class="baski-txt"><h4>'+item.name+'</h4><div class="exdsp"><span class="baski-price">'+item.subtotal+'</span></div></div></div>';
                  basket += baski;
                });
                $('#bask-body').html(basket);
            }
        })
      })
      </script>
</body>
</html>
