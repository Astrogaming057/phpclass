<?php
$currentPage = 'customers';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Izaiah's Website</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/theme.css">
    <link rel="stylesheet" type="text/css" href="/css/customers/styles.css">
</head>
<body>
<div class="site">
    <header class="panel site-header">
        <?php include __DIR__ . '/../includes/header.php'; ?>
        <nav class="navbar">
            <?php include __DIR__ . '/../includes/nav.php'; ?>
        </nav>
    </header>

    <main class="panel site-main">
        <h3>Customer Database</h3>
        <table class="customer-table">
            <tr>
                <th>id</th>
                <th>first</th>
                <th>last</th>
                <th>address</th>
                <th>city</th>
                <th>state</th>
                <th>zip</th>
                <th>phone</th>
                <th>email</th>
                <th>password</th>
            </tr>

            <?php
            try {
                include __DIR__ . '/../includes/db.php';

                $rs = mysqli_query($con, 'SELECT * FROM customers');
                while ($row = mysqli_fetch_assoc($rs)) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['first']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['last']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['address']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['city']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['state']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['zip']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['phone']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['password']) . '</td>';
                    echo '</tr>';
                }
            } catch (Throwable $e) {
                echo '<tr><td colspan="10">' . htmlspecialchars($e->getMessage()) . '</td></tr>';
            }
            ?>
        </table>

        <a class="add-link" href="customeradd.php">Add Customer</a>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </footer>
</div>
</body>
</html>
