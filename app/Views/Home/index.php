<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tourney:wght@300&display=swap" rel="stylesheet">
    <title>APE</title>
</head>
<body>
    <?php
        $session = \Config\Services::session();
    ?>
    <div class="homepage">
            <div class="a_fold">
                <div class="material">
                    <div class="navbar">
                        <div class="logo"><p><a href="homepage.html">A</a></p></div>
                        <div class="navbar_links">
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact us</a></li>
                                <li><a href="<?php
                                    if(session()->has('firstname')){
                                        echo "#";
                                    }
                                    else{
                                        echo base_url('Login/index');
                                    }
                                ?>"><?php
                                    if(session()->has('firstname')){
                                        echo "Welcome, ".session()->get('firstname')." ".session()->get('lastname');
                                    }else{
                                        echo "Login/Signup";
                                    }
                                ?></a></li>
                                <?php if(session()->has('user_id')){?>
                                <li><a href="<?php echo base_url('Login/logout')?>">Logout</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div id="content">
                        
                            <h1>APE</h1>
                            <h3>The No. 1 online clothing store</h3>
                            <button>SHOP NOW</button>
                    </div>
                </div>
        </div>

        <div class="arrivals">
            <div class="row">
                    <div class="arrival-col one">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime esse suscipit veritatis labore temporibus unde obcaecati inventore ducimus tenetur non laborum sint, quae provident veniam perspiciatis odio, adipisci modi v!oluptatem</p>
                        <h2><span>[ </span>FORMAL<span> ]</span></h2>
                    </div>
                
                    <div class="arrival-col two">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime esse suscipit veritatis labore temporibus unde obcaecati inventore ducimus tenetur non laborum sint, quae provident veniam perspiciatis odio, adipisci modi voluptatem!</p>
                        <h2><span>[ </span>CASUAL<span> ]</span></h2>
                    </div>
            </div>
            <div class="row">
                    <div class="arrival-col three">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime esse suscipit veritatis labore temporibus unde obcaecati inventore ducimus tenetur non laborum sint, quae provident veniam perspiciatis odio, adipisci modi voluptatem!</p>
                        <h2><span>[ </span>CHILDRENS<span> ]</span></h2>
                    </div>
                    <div class="arrival-col four">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime esse suscipit veritatis labore temporibus unde obcaecati inventore ducimus tenetur non laborum sint, quae provident veniam perspiciatis odio, adipisci modi voluptatem!</p>
                        <h2><span>[ </span>PETS<span> ]</span></h2>
                    </div>
            </div>
        </div>

            <div class="hero">
                <h1>Reviews</h1>
              
                <div class="container">
                    <div class="indicator">
                        <span class="btn" onclick="btn1()"></span>
                        <span class="btn" onclick="btn2()"></span>
                        <span class="btn" onclick="btn3()"></span>
                        <span class="btn" onclick="btn4()"></span>
                    </div>
                    <div class="testimonial">
                        <div class="slide-row" id = "slider">
                        <div class="slide-col">
                            <div class="user-text">
                                <p>Not finding what you are looking for is close to impossible on <span style="font-family: 'Tourney', cursive;">APE.</span></p>
                                <h3>Candice</h3>
                                <p>Company</p>
                            </div>
                            <div class="user-img">
                                <img src="media/carousel_1.jpg">
                            </div>
                        </div>
                        <div class="slide-col">
                            <div class="user-text">
                                <p>They do not claim that they are the number 1 online clothing store for nothing. I always find everything I need on their site</p>
                                <h3>Sarah</h3>
                                <p>Company</p>
                            </div>
                            <div class="user-img">
                                <img src="media/carousel_2.jpg">
                            </div>
                        </div>
                        <div class="slide-col">
                            <div class="user-text">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure debitis quaerat odit itaque aliquam facilis sapiente numquam similique dolore necessitatibus aperiam optio aspernatur nostrum, molestias sint velit perferendis laborum. Repellendus.</p>
                                <h3>Sarah</h3>
                                <p>Company</p>
                            </div>
                            <div class="user-img">
                                <img src="media/carousel_3.jpg">
                            </div>
                        </div>
                        <div class="slide-col">
                            <div class="user-text">
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure debitis quaerat odit itaque aliquam facilis sapiente numquam similique dolore necessitatibus aperiam optio aspernatur nostrum, molestias sint velit perferendis laborum. Repellendus.</p>
                                <h3>Sarah</h3>
                                <p>Company</p>
                            </div>
                            <div class="user-img">
                                <img src="media/carousel_5.jpg">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <footer class="footer">
        <div class="footer_container">
          <div class="footer_row">
            <div class="footer-col">
              <h4>Company</h4>
              <ul>
                <li><a href="#">about us</a></li>
                <li><a href="#">our services</a></li>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">affiliate program</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>get help</h4>
              <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">delivery</a></li>
                <li><a href="#">refund</a></li>
                <li><a href="#">order status</a></li>
                <li><a href="#">payment options</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>online shop</h4>
              <ul>
                <li><a href="#">Mens</a></li>
                <li><a href="#">Womens</a></li>
                <li><a href="#">Childrens</a></li>
                <li><a href="#">Pets</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>follow us</h4>
              <div class="socials">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            </div>
          </div>
        </div>
    </footer>

    <script>
        var slider = document.getElementById("slider");

        
        function btn1(){
            slider.style.transform = "translateX(0px)";
        }
        function btn2(){
            slider.style.transform = "translateX(-800px)";
        }
        function btn3(){
            slider.style.transform = "translateX(-1600px)";
        }
        function btn4(){
            slider.style.transform = "translateX(-2400px)";
        }
    </script>
</body>
</html>