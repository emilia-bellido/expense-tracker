<?php 
  require "./includes/transactionselect.inc.php"; 
  require "./includes/formulas.inc.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expense Tracker App</title>
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
  <body class= "p-5">
    <h1 class="text-center my-5 text-light title"> Expense Tracker App</h1>

     <!--SUMMARY BOX--->
    <section class="container mb-4 p-5 glass-card text-dark shadow">

      <div class=" d-flex flex-wrap align-items-center justify-content-around p-3 mb-2 glass-boxes">
        <h3 class="text-center title-boxes">Total Balance</h3>
        <p class="text-center summary-nums" id="total_num" data-value="<?= $total_balance ?>">
           <?php echo $total_balance_formatted; ?>
        </p>
      </div>

      <div class="d-flex flex-wrap align-items-center justify-content-around p-3 m-2">
        
        <div class=" p-3 mb-2 text-dark glass-boxes">
          <h3 class="text-center title-boxes">Total Income</h3>
          <p class="text-center summary-nums">
             <?php echo $total_income_formatted?>
          </p>
        </div>

        <div class=" p-3 mb-2 text-dark glass-boxes">
          <h3 class="text-center title-boxes">Total Expenses</h3>
          <p class="text-center summary-nums">
            <?php echo $total_expenses_formatted?>
          </p>
        </div> 

      </div> 

    </section>
    <!--SUMMARY BOX--->

     <!--ADD A TRANSACTION--->
    <section class="container p-3 mb-2 text-light glass-boxes">
      <h3 class="text-center my-5 text-light title"> Add Transaction </h3>

      <form  id="form-add" action="includes/formhandler.inc.php" method="post" class="m-5"> 

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" name="desc">
        </div>

        <div class="mb-3">
          <label for="category" class="form-label">Category</label>
          <select class="form-select" aria-label="category" name="category">
            <option selected></option>
            <option value="food">Food</option>
            <option value="transport">Transport</option>
            <option value="bills">Bills</option>
            <option value="rent">Rent</option>
            <option value="entertainment">Entertainment</option>
            <option value="income">Income</option>
            <option value="other">Other</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="amount" class="form-label">Amount</label>
          <input type="number" class="form-control" name="amount">
        </div>

        <div class="mb-3">
          <label for="date" class="form-label">Date</label>
          <input type="date" class="form-control" name="date">
        </div>

        <div class="mb-3">
          <label for="type" class="form-label">Type of Transaction</label>
          <select class="form-select" aria-label="type" name="type">
            <option selected></option>
            <option value="expense">Expense</option>
            <option value="income">Income</option>
          </select>
        </div>
        <button type="submit" class="btn">Add Transaction</button>
      </form>
    </section>
    <!--ADD A TRANSACTION--->

    <!--TRANSACTIONS VIEWER--->
    <section class="container p-3 my-2 text-dark glass-boxes">

        <div class="d-flex justify-content-between flex-wrap mb-3">
          <h3 class="title text-light"> Recent Transactions</h3>
          <button class="btn text-light" id="view-transaction">
            <i id="arrow" class="bi bi-arrow-down"></i>
            <span id="button-text"> View Recent Transactions</span> </button>
        </div>

        <div id="transactions-holder" class="table-responsive" style="display:none">
          <table class="table table-borderless text-light" style="--bs-table-bg: none;" id="table-transactions">
            <thead>
              <tr>
                <th class="text-light" scope="col">Date</th>
                <th class="text-light" scope="col">Description</th>
                <th class="text-light" scope="col">Category</th>
                <th class="text-light" scope="col">Amount</th>
                <th class="text-light" scope="col">Type</th>
                <th class="text-light text-center" scope="col">Action</th>
              </tr>
            </thead>

            <tbody class="text-light">
              <!--Opening up IF statement so I can whether table is emtpy or it actually has records---->
              <?php if(empty($transactions)): ?>
              <tr>
                <td class="text-center title text-light"colspan="6"> No Transactions Yet. Add your first one! </td>
              </tr>  
              <?php else: ?>
              <!--Loop through my transactions array and input all the content into the table--->
                <?php foreach($transactions as $input): ?>
                  <tr class="text-light">
                    <td class="text-light"> <?php echo htmlspecialchars($input['date']); ?></td>
                    <td class="text-light"> <?php echo htmlspecialchars($input['description']); ?></td>
                    <td class="text-light"> <?php echo htmlspecialchars($input['category']); ?></td>
                    <td class="text-light"> $ <?php echo htmlspecialchars($input['amount']); ?></td>
                    <td class="text-light"> <?php echo htmlspecialchars($input['type']); ?></td>
                    <td class="d-flex align-items-center justify-content-around"> 
                      <!---the "?" includes the id of the record in the GET URL so when passed on to php file it knows what record to delete
                      Also attaching the id to when button is clicked so we can identify which record it is--->
                      <a href="includes/transactiondelete.inc.php?id=<?php echo htmlspecialchars($input['id']); ?>" class="btn btn-outline-danger">Delete</a>
                      <a href="edit.php?id=<?php echo htmlspecialchars($input['id']); ?>" class="btn btn-outline-warning">Update</a>
                    </td>
                  </tr> 
                <?php endforeach; ?>
              <?php endif; ?>  
            </tbody>
          </table>
        </div>

    </section>
    <!--TRANSACTIONS VIEWER--->

   <!-- TOAST CONTAINER-->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      
      <!-- THE ERROR TOAST -->
      <div id="error-toast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            <strong>Cannot submit form!</strong> Please fill out all required fields.
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>

    </div>
    
    <script src="scripts/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>