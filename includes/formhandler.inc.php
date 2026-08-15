<?php

//Cheks any emtpy input when a user tries to create a new record. 
function is_input_empty($description, $category, $amount, $date, $type){
    if(empty($description) || empty($category) || empty ($amount) || empty($date) || empty($type)){
        return true;
    }
    else{
        return false; 
    }
}

//SUPERGLOBAL => We are checking if the user runs the page on a POST request method
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Sotring raw data from form
    $description = $_POST["desc"];
    $category = $_POST["category"];
    $amount = (double)$_POST["amount"];
    $date = $_POST["date"];
    $type = $_POST["type"];

    //Use the function above to check if any of the inputs are empty: if they are nothing will happen and the user will 
    //be redirected to the main page.
    if(is_input_empty($description, $category, $amount, $date, $type)){
        header("Location: ../index.php");
        die();
    }
    //once we have all the required input, we connect to databse, and insert those values
    try{
        //grabbing connection to database
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






