# Expense Tracker App

A simple personal expense tracker built with PHP, MySQL, Bootstrap, and JavaScript. Built as a solo project to demonstrate PHP/MySQL fundamentals ,full CRUD functionality (Create, Read, Update, Delete) against a MySQL database.

## Features

- Add new transactions (income or expense) with description, category, amount, and date
- View all transactions in a table, with a toggle to show/hide the list
- Edit existing transactions via a pre-filled form
- Delete transactions
- Live summary of total income, total expenses, and total balance
- Balance display is color-coded: green for a positive balance, red with `−` for a negative one
- Front-end and back-end validation to prevent blank form submissions

## Tech Stack

- **Backend:** PHP - PDO (PDO for database access)
- **Database:** MySQL
- **Frontend:** HTML, CSS, Bootstrap 5, Bootstrap Icons
- **Scripting:** jQuery (show/hide toggle, form validation, balance styling)
- **Local environment:** MAMP (Apache + PHP + MySQL)

## File Structure

```
expense-tracker/
├── index.php                          # Main page: summary, transaction list, add form
├── edit.php                           # Edit page: Update pre-filled form for a single record
├── includes/                          # Server-side PHP logic
│   ├── dbh.inc.php                    # Database connection (PDO)
│   ├── formhandler.inc.php            # Handles new transaction submissions (INSERT)
│   ├── transactionselect.inc.php      # Retrieves all transactions (SELECT)
│   ├── transactionupdate.inc.php      # Handles edits (UPDATE)
│   ├── transactiondelete.inc.php      # Handles deletion (DELETE)
│   └── formulas.inc.php               # Calculates total income, expenses, and balance
├── scripts/
│   └── index.js                       # Client-side interactivity (jQuery) 
|   └── style.css                      # Custom styling
└── README.md
```

PHP files that handle database logic are grouped in `includes/`, while client-side JavaScript and CSS is kept separately in `scripts/`. This was intended to separate server-side data operations from client-side interactivity.

## Database Schema

Single table: `transactions`

| Column | Type | Description |
|---|---|---|
| `id` | INT, AUTO_INCREMENT, PRIMARY KEY | Unique record ID |
| `description` | VARCHAR(100) | Short description of the transaction |
| `category` | ENUM | One of: 'Food','Transport','Bills','Rent','Entertainment','Income','Other' |
| `amount` | Double | Transaction amount |
| `date` | DATE | Transaction date |
| `type` | ENUM | expense or income |

```sql
CREATE TABLE `transactions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(100) NOT NULL,
  `category` ENUM('Food','Transport','Bills','Rent','Entertainment','Income','Other') NOT NULL,
  `amount` DOUBLE NOT NULL,
  `date` DATE NOT NULL,
  `type` ENUM('Expense','Income') NOT NULL,
  PRIMARY KEY (`id`)
);
```

## Setup / How to Run Locally

1. Install [MAMP](https://www.mamp.info/) (or any local Apache + PHP + MySQL environment).
2. Clone or copy this project into your MAMP `htdocs` folder.
3. Open phpMyAdmin and create a database named `expenses`.
4. Run the `CREATE TABLE` statement above (or import the included `.sql` export) to create the `transactions` table.
5. Update the database credentials in `includes/dbh.inc.php` if needed:
   ```php
   $dsn = "mysql:host=localhost;dbname=expenses";
   $dbusername = "root";
   $dbpassword = "root";
   ```
6. Start MAMP's servers and visit `http://localhost:8888/expense-tracker/` (or your configured port) in a browser.

## Security Notes

- All user input is passed through `htmlspecialchars()` before being displayed or stored, to prevent injected HTML/script content.
- All database queries use PDO prepared statements with parameterized placeholders (`?`), preventing SQL injection.
- Submitted amounts are explicitly cast to a numeric type (`(float)`) before being stored.
- This project currently has no user authentication: it's a local single-user demonstration project, not intended for multi-user or production use as-is.

## Known Limitations / Possible Future Improvements

- No user authentication
- No search or filter functionality
- No validation against negative amounts
