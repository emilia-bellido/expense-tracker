<?php

function is_input_empty($description, $category, $amount, $date, $type){
    if(empty($description) || empty($category) || empty ($amount) || empty($date) || empty($type)){
        return true;
    }
    else{
        return false; 
    }
}

//SUPERGLOBAL => We are checking if the user runs this page on a POST request method
if ($_SERVER["REQUEST_METHOD"] == "POST"){


    
    //htmlspecialchars converts into HTML entities -> prevents code injection
    $description = htmlspecialchars($_POST["desc"]);
    $category = htmlspecialchars($_POST["category"]);
    $amount = (double)$_POST["amount"];
    $date = htmlspecialchars($_POST["date"]);
    $type = htmlspecialchars($_POST["type"]);

    
    if(is_input_empty($description, $category, $amount, $date, $type)){
        header("Location: ../index.php");
        die();
    }

    try{
        //grabbing connection to databse
        require_once "dbh.inc.php";
        $query = "INSERT INTO transactions (`description`, `category`, `amount`, `date`, `type`) 
        VALUES (?, ?, ?, ?, ?);" ;

        $statement = $pdo->prepare($query);
        $statement->execute([$description,$category,$amount, $date, $type ]);

        //close connection
        $pdo = null;
        $statement = null;

        header("Location: ../index.php");
        die();
    }catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }
}
else{
   header("Location: ../index.php");
}






