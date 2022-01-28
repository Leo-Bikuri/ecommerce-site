<form action="/basket" method="post" id="item">
    <section class="container sproduct my-5 pt-5">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100 pb-1" src="/media/<?= $product[0]['product_image']?>" id="MainImg" alt="">

                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="" width="100%" class="small-img" alt="">
                    </div>
                </div>
            </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <h6>Shop /<?=$product[0]['product_name']?></h6>
                    <h3 class="py-4"><?=$product[0]['product_name']?></h3>
                    <h2><?=$product[0]['unit_price']." KSH" ?></h2>
                    <select class="my-3" name="size">
                    <option>Select Size</option>
                    <option>XXL</option>
                    <option>XL</option>
                    <option>M</option>
                    <option>L</option>
                    <option>S</option>
                    <option>XS</option>
                    <option>XXS</option>
                    </select>
                    <input type="number" min="1" name="quantity" value="1">
                    <input type="hidden" name = "item-id" value="<?= $product[0]['product_id'] ?>" >
                    <input type="hidden" name = "price" value="<?= $product[0]['unit_price'] ?>" >
                    <input type="hidden" name = "item" value="<?= $product[0]['product_name'] ?>" >
                    <input type="hidden" name = "image" value="<?= $product[0]['product_image'] ?>" >
                    <button class="buy-btn"type="submit" name="item-id" value="<?= $product[0]['product_id'] ?>">Add To Cart</button>
                    <h4 class="mt-5 mb-4">Product Details</h4>
                    <span><?= $product[0]['product_description']?></span>
                </div>
        </div>
    </section>
</form>

    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Related Products</h3>
            <hr class="mx-auto">
        </div>
        <div class="row mx-auto container-fluid">
            <?php $x = 0; foreach($related_products as $related_product){
                if($related_product['product_id'] != $product[0]['product_id'] && $x < 4){
                    $x++
                ?>

            <div class="product text-center col-lg-3 col-md-4 col-12" onclick="window.location.href='/product/<?= $related_product['product_id']?>';">
                <img class="img-fluid mb-3" src="/media/<?= $related_product['product_image']?>" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?= $related_product['product_name']?></h5>
                <h4 class="p-price"><?= $related_product['unit_price']." KSH"?></h4>
                <button class="buy-btn">Buy Now</button>
            </div>
            <?php } }?>
        </div>
    </section>


    <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
            <div class="footer-one col-lg-3 col-md-6 col-12">
                <img src="" alt="">
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
                    <img class="img-fluid w-25 h-100 m-2" src="" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="" alt="">
                    <img class="img-fluid w-25 h-100 m-2" src="" alt="">
                </div>
            </div>
        </div>

        <div class="copyright mt-5">
            <div class="row container mx-auto">

                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <img src="" alt="">
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function() {
        $('#item').submit(function(event){
            event.preventDefault();
            var $form = $(this);

            var $inputs = $form.find("input, select, button");

            var data = $form.serialize();

            $inputs.prop("disabled", true);
          

            $.ajax({
                url: '/basket',
                type: 'post',
                data: data,
                success: function(response){
                    if(response == "success"){
                        $inputs.prop("disabled", false);
                        location.reload();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Item added to cart',
                            timer: 2000,
                            showConfirmButton: false,
                            allowOutsideClick:false,
                            timerProgressBar: true,
                        })
                        }else{
                            $inputs.prop("disabled", false);
                           Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Internal Server Error',
                            timer: 2000,
                            showConfirmButton: false,
                            allowOutsideClick:false,
                            timerProgressBar: true,
                           })
                        }
                }
            });
        });
    });
        var MainImg = document.getElementById('MainImg');
        var smallimg = document.getElementsByClassName('small-img');

        smallimg[0].onclick = function() {
            MainImg.src = smallimg[0].src;
        }
        smallimg[1].onclick = function() {
            MainImg.src = smallimg[1].src;
        }
        smallimg[2].onclick = function() {
            MainImg.src = smallimg[2].src;
        }
        smallimg[3].onclick = function() {
            MainImg.src = smallimg[3].src;
        }
    </script>
</body>

</html>