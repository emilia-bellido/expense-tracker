<?php require "./includes/dbh.inc.php" ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="wnameth=device-wnameth, initial-scale=1">
    <title>Expense Tracker App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"> <!-----bootstrap icons--->
  </head>
  <body>
    
  
    <h1 class="text-center"> Expense Tracker App</h1>

    <section class="container p-3 mb-2 bg-light text-dark rounded"> <!--summary box-->
      <div class="align-items-center justify-content-between p-3 mb-2 bg-light text-dark rounded">
        <h3>Total Balance</h3>
        <p>
          <?php echo number_format($total_balance, 2); ?>
        </p>
      </div>

      <div class="d-flex align-items-center justify-content-between p-3 mb-2 bg-light text-dark rounded">
        <div>
          <h3>Total Income</h3>
          <p>
            <?php echo number_format($total_income, 2); ?>
          </p>
        </div>

        <div>
          <h3>Total Expenses</h3>
          <p>
            <?php echo number_format($total_expenses, 2); ?>
          </p>
        </div> <!-- Closes the Total Expenses div -->
      </div> <!-- ADDED MISSING DIV: Closes the d-flex container -->
    </section>

    <!--TRANSACTIONS VIEWER--->
    <section class="container p-3 mb-2 bg-light text-dark rounded">
      <h3> Recent Transactions</h3>
      <!---table--->
      <div>
        list
      </div>
    </section>

     <!--ADD A TRANSACTION--->
    <section class="container p-3 mb-2 bg-light text-dark rounded">
      
      <form action="includes/formhandler.inc.php" method="post">

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" name="desc">
        </div>

        <div class="mb-3">
          <select class="form-select" aria-label="category" name="category">
            <option selected>Category</option>
            <option value="food">Food</option>
            <option value="transport">Transport</option>
            <option value="bills">Bills</option>
            <option value="rent">Rent</option>
            <option value="entertainment">Entertainment</option>
            <option value="income">Other</option>
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
          <select class="form-select" aria-label="type" name="type">
            <option selected>Type of Transaction</option>
            <option value="expense">Expense</option>
            <option value="income">Income</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>




    </section>


    


   









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>