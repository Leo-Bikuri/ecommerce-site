    <section id="subcategories-nav" class="my-5 py-2">
        <div class="container my-5 subcategories">
            <div class="header">
                <h2>Subcategories</h2>
            </div>
            <ul>
                <?php foreach($subcategories as $subcategory){?>
                <li><a href = "/shop-subcategory/<?=$subcategory['subcategory_id']?>"><?= $subcategory['subcategory_name'] ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <section id="featured">
        <div class="container">
            <h2 class="font-weight-bold">Clothes Featured</h2>
            <hr>
            <p>All our products with a fair price only on &lt;style&gt;.</p>
        </div>
        <div class="row mx-auto container">
            
            <?php 
            if(!empty($products)){
                foreach($products as $product){?>
                <div onclick="window.location.href='/product/<?= $product['product_id']?>';" class="product col-lg-3 col-md-4 col-12 text-center">
                    <img class="img-fluid img-center image-height" src="/media/<?= $product['product_image']?>" alt="">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?= $product['product_name']?></h5>
                    <h4 class="p-price"><?= $product['unit_price']?></h4>
                    <button class="buy-btn">Buy Now</button>
                </div>
                <?php } ?> 
                <?php
                }else{
            ?>
            <div class="prompt-container">
                <div class="content">
                    <img src="/assets/images/qmpty.svg" alt="">
                    <div class="text">
                        <h3>We came out empty.</h3>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
    <section id="pagination">
        <div>
            <ul class="pagination">
                    <?= $pager->links() ?>
            </ul>
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
</body>

</html>