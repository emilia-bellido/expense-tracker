<?php

    $transactions = [];

    try{
        //grabbing connection to databse
        require_once "dbh.inc.php";

        //QUERY to select all transactions from database;
        $query = "SELECT * FROM `transactions` ORDER BY date " ;

        //submitting query to database
        $statement = $pdo->prepare($query);

        //running the query
        $statement->execute();

        //fetching all the transactions so they are in an array and can access it through index.php
  
        $transactions = $statement->fetchALL(PDO::FETCH_ASSOC);
            
    }catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    } 


?>
    







