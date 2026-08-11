<?php
$dsn = "mysql:host=localhost;dbname=expenses";
$dbusername = "root";
$dbpassword = "root";

//PDO connection: php data objects, more flexible
try {
    //connects to data base
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} 

/*function getCategories(){
    $pdo = databaseConnection();

    if(!$pdo){
        return false;
    }

    $response = $pdo->query("SELECT * FROM category");
    while($row = $response->fetch_assoc()){
        $data[] = $row;
    }

    return $data
})*/