<?php
    $id = $_GET['id'];
    try{
        //grabbing connection to databse
        require_once "dbh.inc.php";

        //finding id of the button which is the id of the actual record

        $query = "DELETE FROM `transactions` WHERE id = ?;" ;
        $statement = $pdo->prepare($query);
        $statement->execute([$id]);
       
        //close connection
        $pdo = null;
        $statement = null;

        header("Location: ../index.php");
        die();
    }catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    }





