<?php require "php/functions.php"?>
<?php
    if(isset($_GET['category'])){
        $cat = urldecode($_GET['category']);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name ="description" content=" we have a side collection of electronics , phones, books and games">
    <meta name ="keywords" content="phones , books , games , electronics">
    <link rel="stylesheet" href="css/styles.css">


    <title>our store</title>
</head>
<body>


    <?php include"includes/nav.php "?>
    <?php include"includes/header.php" ?>
    


       <main>
        <  class="left">
            <div class="section-title">product categories</div>
            <?php $categories = getCategories() ?>
            <?php
                foreach($categories as $category){
                    ?>
                    <a href="category.php?category=<?php echo urlencode($category['category'])?>"><?php echo ucfirst($category['category']) ?>

                    </a>
                    <?php
                }
             ?>   

        </div>
        <div class="right">
            <div class="section-title"> Products in the <?php  echo ucfirst($cat) ?> category</div>

            <?php  $products = getProductsByCategory($cat) ?>
            <div class="product">    
                <?php
                    foreach($products as $product){
                        ?>

            <div class="product-left">
                <img src="<?php echo"products/{$product['image']}" ?>"alt="">
            </div>
            <div class="product-right">
                <p class="title">
                    <a href="product.php?title=<?php echo urldecode($product['title'])?>">
                        <?php echo $product['title']?>
                    </a>
                </p>
                <p class="description">
                    <?php echo $product['description']?>
                </p>
                <p class="price">
                    <?php echo $product['price']?>
                </p>
            
            </div>
            <?php


} 
?>

            </div>


        </div>

       </main>


    <?php include"includes/footer.php" ?>


<script src="javascript/script.js"></script>
    
</body>
</html>