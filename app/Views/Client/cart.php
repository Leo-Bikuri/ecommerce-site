    <?php 
     $cart = \Config\Services::cart();
    ?>
    <section id="cart" class="container pt-5">
        <h2 class="font-weight-bold pt-5 mt-5">Shopping Cart</h2>
        <hr>
    </section>

    <section id="cart-container" class="container my-5">
        <table width="100%">
            <thead>
                <tr>
                    <td>Remove</td>
                    <td>Image</td>
                    <td>Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
            <?php foreach($orders as $order){?>
                <tr>
                    <td><a href="/cart_delete/<?=$order['rowid']?>"><i class="fas fa-trash-alt"></i></a></td>
                    <td><img src="/media/<?= $order['options']['image']?>" alt=""></td>
                    <td>
                        <h5><?= $order['name']?></h5>
                    </td>
                    <td>
                        <h5><?= "KSH ".$order['price']?></h5>
                    </td>
                    <td><input class="w-25 pl-1" type="number" id="quantity" min="1" onchange="changeQuantity('<?=$order['rowid']?>', value)" value="<?= $order['qty'] ?>"></td>
                    <td>
                        <h5>KSH<?= " ".$order['subtotal']?> </h5>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </section>

    <section id="cart-bottom" class="container">
        <div class="row">
            <div class="coupon col-lg-6 col-md-6 col-12 mb-4">
                <div>
                    <h5>COUPON</h5>
                    <p>Enter your coupon code if you have one. </p>
                    <input type="text" placeholder="Coupon Code">
                    <button>APPLY COUPON</button>
                </div>
            </div>
            <div class="total col-lg-6 col-md-6 col-12">
                <div>
                    <h5>CART TOTAL</h5>
                    <div class="d-flex justify-content-between">
                        <h6>Subtotal</h6>
                        <p><?= "KSH ".$cart->total()?></p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6>Shipping</h6>
                        <p>FREE</p>
                    </div>
                    <hr class="second-hr">
                    <div class="d-flex justify-content-between">
                        <h6>Total</h6>
                        <p><?="KSH "?><?=$cart->total() + 200?> </p>
                    </div>
                    <button class="ml-auto" onclick="handlePayment('<?=$cart->total()?>');">PROCEED TO CHECKOUT</button>
                </div>

            </div>
        </div>
    </section>

    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <img src="img/logo2.png" alt="">
                <p class="pt-3">Fringilla urna porttitor rhoncus dolor purus luctus venenatis lectus magna fringilla diam maecenas ultricies mi eget mauris.</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Featured</h5>
                <ul class="text-uppercase list-unstyled">
                    <li><a href="#">men</a></li>
                    <li><a href="#">women</a></li>
                    <li><a href="#">boys</a></li>
                    <li><a href="#">girls</a></li>
                    <li><a href="#">new arrivals</a></li>
                    <li><a href="#">shoes</a></li>
                    <li><a href="#">cloths</a></li>

                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-12 mb-3">
                <h5 class="pb-2">Contact Us</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>123 STREET NAME, CITY, US</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone</h6>
                    <p>(123) 456-7890</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>MAIL@EXAMPLE.COM</p>
                </div>
            </div>

            <div class="footer-one col-lg-3 col-md-6 col-12">
                <h5 class="pb-2">Instagram</h5>
                <div class="row">
                    <img class="img-fluid w-25 h-100 m-2" src="img/insta/1.jpg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="img/insta/2.jpg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="img/insta/3.jpg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="img/insta/4.jpg" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="img/insta/5.jpg" alt="">
                </div>
            </div>
        </div>

        <div class="copyright mt-5">
            <div class="row container mx-auto">

                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <img src="img/payment.png" alt="">
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-nowrap mb-2">
                    <p>rymo eCommerce © 2021. All Rights Reserved</p>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/jquery-validation-1.19.1/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function changeQuantity(rowid, quantity){
            console.log(quantity);
            $.ajax({
                method: 'post',
                url: '/update_cart/'+rowid,
                data: {quantity: quantity},
                success: function(response){
                    if(response == "success"){
                        location.reload();
                    }else{
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Quantity update failed',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick:false,
                            timerProgressBar: true,
                        })
                    }
                }
            });
        }
        function handlePayment(amount) {
            var handler = StripeCheckout.configure({
            key: 'pk_test_51KL2ppAv3yHCdNvTeRaZr5Ek3glyEeCOGW1lVBFzSjHx0DUMAn44bOulpIJcfR2QDKC3z9DyMe4igfoTrnMHJjMk00frEspLE7',
            locale: 'auto',
            token: function (token) {
            console.log('Token Generated' + token);
            $('#getTokenRes').html(JSON.stringify(token));
            $.ajax({
                url: "<?php echo base_url(); ?>StripeController/stripePayment",
                method: 'post',
                data: {
                tokenId: token.id,
                amount: <?= $cart->total()?>,
                },
                dataType: "json",
                success: function (response) {
                console.log(response.data);
                // $('#getTokenRes').append('<br />' + JSON.stringify(response
                //     .data));
                }
            })
            }
        });
        handler.open({
            name: 'Style',
            description: 'Clothing items',
            amount: <?= $cart->total()?>
        });
        }
    </script>
</body>
</html>