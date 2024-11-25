<?php
    require "config.php";

    function dbconnect(){
        $mysqli = new mysqli('localhost', 'root', '', 'our_store');
        if ($mysqli->connect_errno !=0) {
            return FALSE;

    }else{
        return $mysqli;
    }

}


    function getCategories(){
        echo 'jhbdshjvd';exit;
        $mysqli = dbconnect();
        $result = $mysqli->query("SELECT DISTINCT category");
        while($row = $result->fetch_assoc()){
            $categories[]= $row;
        }
        return $categories;
    }

    function getHomePageProducts($int){
        $mysqli = dbconnect();
        $result = $mysqli->query("SELECT * FROM products ORDER BY rand()LIMIT $int");
        while($row = $result->fetch_assoc()){
            $data[]=$row;
        }
        return $data;

    }


    function getProductsByCategory($category){
        $mysqli = dbconnect();

        $smtp = $mysqli->prepare("select * from products where category = ?");
        $smtp->bind_param("s", $category);
        $smtp->execute();
        $result =  $smtp->get_result();
        $data =$result->fetch_all(MYSQLI_ASSOC);
        return $data;

        
    }

    function getProductByTitle($title){
        $mysqli = dbconnect();

        $smtp = $mysqli->prepare("select * from products where category = ?");
        $smtp->bind_param("s", $category);
        $smtp->execute();
        $result =  $smtp->get_result();
        $data =$result->fetch_all(MYSQLI_ASSOC);
        return $data;

    }



