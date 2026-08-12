<?php 
  require "./includes/dbh.inc.php";
  require "./includes/transactionselect.inc.php"; 
  require "./includes/formulas.inc.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Expense Tracker App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"> <!-----bootstrap icons--->
      <!---JQUERY--->
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
  </head>
  <body>
    
  
    <h1 class="text-center"> Expense Tracker App</h1>

    <section class="container p-3 mb-2 bg-light text-dark rounded"> <!--summary box-->
      <div class="align-items-center justify-content-between p-3 mb-2 bg-light text-dark rounded">
        <h3>Total Balance</h3>
        <p>
           <?php 
           echo number_format($total_balance, 2);
       
            ?>
        </p>
      </div>

      <div class="d-flex align-items-center justify-content-between p-3 mb-2 bg-light text-dark rounded">
        <div>
          <h3>Total Income</h3>
          <p>
             <?php echo $total_income?>
          </p>
        </div>

        <div>
          <h3>Total Expenses</h3>
          <p>
            <?php echo $total_expenses?>
            
          </p>
        </div> 
      </div> 

    </section>

    <!--TRANSACTIONS VIEWER--->
    <section class="container p-3 mb-2 bg-light text-dark rounded">

        <h3> Recent Transactions</h3>
        <button class="btn btn-primary" id="view-transaction">View Transactions</button>
        <div id="transactions-holder" style="display:none">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Amount</th>
                <th scope="col">Type</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <!--Loop through my trasanctions array and input all the content into the table--->
              <?php foreach($transactions as $input): ?>
                <tr>
                  <td> <?php echo htmlspecialchars($input['date']); ?></td>
                  <td> <?php echo htmlspecialchars($input['description']); ?></td>
                  <td> <?php echo htmlspecialchars($input['category']); ?></td>
                  <td> $ <?php echo htmlspecialchars($input['amount']); ?></td>
                  <td> <?php echo htmlspecialchars($input['type']); ?></td>
                  <td> 
                    <a href="includes/transactiondelete.inc.php?id=<?php echo htmlspecialchars($input['id']); ?>" class="btn btn-outline-danger">Delete</a>
                    <a href="includes/transactionupdate.inc.php?id=<?php echo htmlspecialchars($input['id']); ?>" class="btn btn-outline-warning">Update</a>                    </a>
                  </td>
                </tr> 
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

    </section>
    <!--TRANSACTIONS VIEWER--->




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


    


   








    <script src="scripts/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>