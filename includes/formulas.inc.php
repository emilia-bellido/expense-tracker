<?php 

try{
    require_once "dbh.inc.php";

    //Query to get income:
    $query = "SELECT SUM(amount) AS total_income FROM transactions WHERE type = 'Income'; " ;

    $statement = $pdo->prepare($query);
    $statement->execute();

    //grabbing the result of the query from the db
    $result = $statement->fetch(PDO::FETCH_ASSOC);
              
    $total_income = $result["total_income"];
    if ($total_income > 0) {
        $total_income = number_format($total_income, 2);
    } else {
        $total_income = 0;
    }
       
    //Query to get expenses:

    $query = "SELECT SUM(amount) AS total_expenses FROM transactions WHERE type = 'Expense'; " ;

    $statement = $pdo->prepare($query);
    $statement->execute();

    //grabbing the result of the query from the db
    $result = $statement->fetch(PDO::FETCH_ASSOC);
              
    $total_expenses = $result["total_expenses"];
    if ($total_expenses > 0) {
       $total_expenses = number_format($total_expenses, 2);
    } else {
        $total_expenses = 0;
    }


    //query to calculate balance
    $total_balance = $total_income - $total_expenses;
    








}catch(PDOException $e){
        die("Query Failed: " . $e->getMessage());
} 

   