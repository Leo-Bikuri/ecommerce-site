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
    <title>Style - Checkout</title>
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
            <form action = "" method = "POST">
              <div class="fgroup fullname">
                <label for="fullname">Full name <span>*</span></label>
                <input placeholder="John Smith, etc." type="text" name="fullname" id="fullname" />
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
                 <select name='expireYY' id='expireYY>
                   <option disabled value=''>Year</option>
                   <option value='22'>2022</option>
                   <option value='23'>2023</option>
                   <option value='24'>2024</option>
                   <option value='25'>2025</option>
                   <option value='26'>2026</option>
                 </select> 
              </div>
              <div class="fgroup cnumber">
                <label for="ccnumber">Card number <span>*</span></label>
                <div>
                  <input id="ccnumber" name="ccnumber" class="ccnumber" placeholder="####-####-####-####" />
                </div>
              </div>
              <div class="fgroup ccv">
                <label for="ccv">CCV <span>*</span></label>
                <div>
                  <input id="ccv" name="ccv" placeholder="123" />
                </div>
              </div>
              <div class="card-next-aera">
            <div class="btns">
              <button class="btn btn-1"  onclick="handlePayment(1000);">Continue to payment</button>
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
            'size'=>$cart['options']['size'],
            'image'=>$cart['options']['image'],
            'subtotal' => $cart['subtotal']
          );
        } 
        $data = json_encode($data);
        ?>
  
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
        console.log(cart);
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
                  var baski = '<div class="baski"><div class="baski-txt"><h4>'+item.name+'</h4><div class="exdsp"><span class="baski-price">'+item.subtotal+'</span><h5>Size: '+item.size+'</h5></div></div></div>';
                  basket += baski;
                });
                $('#bask-body').html(basket);
            }
        })
      })

      function handlePayment(amount){
        var handler = StripeCheckout.configure({
          key: 'pk_test_51KL2ppAv3yHCdNvTeRaZr5Ek3glyEeCOGW1lVBFzSjHx0DUMAn44bOulpIJcfR2QDKC3z9DyMe4igfoTrnMHJjMk00frEspLE7',
          locale: 'auto',
          token: function(token){
            console.log('Token Generated' + token);
            $.ajax({
              url: '/payment',
              method: 'post',
              data: {
                tokenId: token.id,
                amount: amount
              },
              dataType: "json",
              success: function(response){
                console.log(response.data);
              }
            })
          }
        });
        handler.open({
          name: 'Clothe',
          description: 'something',
          amount: amount
        });
      }
      </script>
</body>
</html>
