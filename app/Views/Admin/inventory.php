<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="/assets/css/admin_table.css" rel="stylesheet">
    <link href="/assets/css/inventory.css" rel="stylesheet">
    <title>Apparel</title>
</head>
<body>
    <div class="background">
        <div class="container header">
            <header class="d-flex justify-content-center py-3">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="#" class="nav-link"><span><i class='bx bx-plus'></i></span>Categories</a></li>
                    <li class="nav-item"><a class="nav-link" onclick="popup()"><span><i class='bx bx-plus'></i></span>Add Item</a></li>
                </ul>
            </header>
        </div>
        <div class="container">
            <h2>Product Inventory</h2>
            <div class="search">
                <form action="" method="post">
                    <input type="text" placeholder="Search">
                    <button type="submit"><i class='bx bx-search' ></i></button>
                </form>
            </div>
                <ul class="responsive-table">
                    <table>
                        <thead>
                            <li class="table-header">
                                <div class="col col-1">#</div>
                                <div class="col col-2">Product Name</div>
                                <div class="col col-3">Quantity</div>
                                <div class="col col-4">Price</div>
                                <div class="col col-5">Action</div>
                            </li>
                        </thead>
                        <tbody>
                            <?php
                            foreach($products as $product){
                            echo "<li class='table-row'>";
                            echo "<div class='col col-1' data-label='#'>".$product['product_id']."</div>";
                            echo "<div class='col col-2' data-label='Product Name'>".$product['product_name']."</div>";
                            echo "<div class='col col-3' data-label='Quantity'>".$product['available_quantity']."</div>";
                            echo "<div class='col col-4' data-label='Price'>".$product['unit_price']."</div>";
                            echo "<div class='col col-5' data-label='Action'><button type='submit' class='actionbtn' title='Edit item' value='".$product['product_id']."'><i class='fas fa-pen'></i></button><button type='submit' title='Delete item' class='actionbtn' value='".$product['product_id']."'><i class='fas fa-trash-alt'></i></button></div>";
                            echo "</li>";
                            }
                            ?>
                        </tbody>
                    </table>
                </ul>
                <?php echo $pager->links() ?>
        </div>
    </div>
    <?php include("additem.php");?>
</body>
</html>