<?php

   

        //SUPERGLOBAL => We are checking if the user runs this page on a POST request method
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        //htmlspecialchars converts into HTML entities -> prevents code injection
        $id = $_POST["id"];
        $description = htmlspecialchars($_POST["desc"]);
        $category = htmlspecialchars($_POST["category"]);
        $amount = (double)$_POST["amount"];
        $date = htmlspecialchars($_POST["date"]);
        $type = htmlspecialchars($_POST["type"]);



        try{
            //grabbing connection to databse
            require_once "dbh.inc.php";

            //update the record with the id of the button 

            $query = "UPDATE `transactions` 
            SET `description`= ?,`category`= ?,`amount`= ?,`date`=?,`type`=?
            WHERE `id` = ?;";

            $statement = $pdo->prepare($query);
            $statement->execute([$description, $category, $amount, $date, $type, $id]);

            //close connection
            $pdo = null;
            $statement = null;

            header("Location: ../index.php");
            //die();
        }catch(PDOException $e){
            die("Query Failed: " . $e->getMessage());
        }
    }else{
        header("Location: ../index.php");

    }




