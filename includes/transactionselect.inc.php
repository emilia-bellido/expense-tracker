<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    try{
        //grabbing connection to databse
        require_once "dbh.inc.php";

        //QUERY to select all transactions from database;
        $query = "SELECT * FROM `transactions` ORDER BY date " ;

        //submitting query to database
        $statement = $pdo->prepare($query);

        //running the query
        $statement->execute();

        //checking to see if there is any data or not
        while($row = $statement->fetch()){
            echo $row['description'] . "<br>";
        }
            
    }catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
    } 



}else{

}
    







