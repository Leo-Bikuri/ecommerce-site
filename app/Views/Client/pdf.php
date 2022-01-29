<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> -->

    <link rel="stylesheet" href="/assets/css/client-style.css">

    <!-- <style>
        .small-img-group {
            display: flex;
            justify-content: space-between;
        }
        
        .small-img-col {
            flex-basis: 24%;
            cursor: pointer;
        }
        
        .sproduct select {
            display: block;
            padding: 5px 10px;
        }
        
        .sproduct input {
            width: 50px;
            height: 40px;
            padding-left: 10px;
            font-size: 16px;
            margin-right: 10px;
        }
        
        .sproduct input:focus {
            outline: none;
        }
        
        .buy-btn {
            background: #fb774b;
            opacity: 1;
            transition: 0.3s all;
        }
        .product img {
            width: 100%;
            height: 375px;
            box-sizing: border-box;
            object-fit: cover;
        }
        
        #featured>div.row.mx-auto.container>nav>ul>li.page-item.active>a {
            background-color: black;
        }
        
        #featured>div.row.mx-auto.container>nav>ul>li:nth-child(n):hover>a {
            background-color: coral;
            color: #fff;
        }
        
        .pagination a {
            color: #000;
        }
        .image-height{
            height: 380px;
        }
        .cartcount{
            background: #fb774b;
            color: white;
            border-radius: 100%;
            height: 22px;
            width: 25px;
            text-align: center;
            transform: translate(-50%, -50%);
        }
        
    </style> -->

</head>

<body>
<?php 
     $cart = \Config\Services::cart();
    ?>
    <section id="cart" class="container">
        <h2 class="font-weight-bold">Receipt</h2>
        <hr>
    </section>

    <section id="cart-container" class="container my-5">
        <table width="100%">
            <thead>
                <tr>
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
                    <h5>Thank You</h5>
                    <p>Thank you for your purchase<br/> Click <a href="/receipt" >here</a> to download receipt </br><a href="/home">Home</a></p>
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
                        <p><?="KSH "?><?=$cart->total()?> </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
       


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="/jquery-validation-1.19.1/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

    </script>
</body>
</html>