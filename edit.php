<?php
//first we need to find the record that we are looking to update.
    require "./includes/dbh.inc.php";

    $id = $_GET["id"];

    $query = "SELECT * FROM transactions WHERE `id` = ?";
    $statement = $pdo->prepare($query);
    $statement->execute([$id]);

    $record = $statement->fetch(PDO::FETCH_ASSOC);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Transaction</title>
   
    <!--BOOSTRAP---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"> <!-----bootstrap icons--->
      <!---JQUERY--->
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
    <!---FONTS--->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cantata+One&family=Elms+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!---style css--->
    <link rel="stylesheet" href="scripts/style.css">

  </head>
  <body>
     <!--Update a transaction--->
    <section class="align-items-center container p-3 mt-5 mb-2 text-light glass-boxes">
      <h3 class="text-center mt-5 mb-3 text-light title"> Udpate Your Transaction </h3>
      <form class ="p-5" action="includes/transactionupdate.inc.php" method="post">
        <!--we need the ID to be able to run transactionupdate.inc.php--->
        <input type="hidden" name="id" value="<?= htmlspecialchars($id)?>">

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
           <input type="text" class="form-control" name="desc" value="<?= htmlspecialchars($record['description']) ?>">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="category" name="category">

                <?php
                //For each: goes through my array of categories and when the category from the record matches it, the selected word is whats selected in the option. 
                    $categories = ["Food", "Transport", "Bills", "Rent" , "Entertainment", "Income", "Other"];

                    //for each does it for every single category, and writes it as an option
                    foreach($categories as $option):
                        if ($record["category"] == $option){
                            $selected = "selected";
                        }else{
                            $selected = ""; //if it doesnt match, then selected remains an empty string 
                        }
                ?>
            <option value ="<?= $option ?>" <?= $selected ?>> 
                <?= $option ?> 
             </option>

            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="text" class="form-control" name="amount" value="<?= htmlspecialchars($record['amount']) ?>">
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" value="<?= htmlspecialchars($record['date']) ?>">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type of Transaction</label>
            <select class="form-select" aria-label="type" name="type">
                <?php //for each does it for every single category, and writes it as an option
                    $type = ["Expense", "Income"];

                    foreach($type as $transaction):
                        if ($record["type"] == $transaction){
                            $selected = "selected";
                        }else{
                            $selected = ""; 
                        };
                ?>
                <option value ="<?= $transaction ?>" <?= $selected ?>> 
                    <?= $transaction?> 
                </option>

                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>

    </section>
    <script src="scripts/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>