<?php
$currentPage = 'login';
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
    <link rel="stylesheet" type="text/css" href="/css/login/styles.css">
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
        <h3 class="page-title">Admin Page</h3>

        <form class="login-form admin-form" action="admin.php">
            <h3>Add New Member</h3>

            <table>
                <tr>
                    <th><label for="txtUsername">Username</label></th>
                    <td>
                        <input type="text" id="txtUsername" name="txtUsername" required>
                    </td>
                </tr>
                <tr>
                    <th><label for="txtPassword">Password</label></th>
                    <td>
                        <input type="password" id="txtPassword" name="txtPassword" required>
                    </td>
                </tr>
                <tr>
                    <th><label for="txtPassword2">Retype Password</label></th>
                    <td>
                        <input type="password" id="txtPassword2" name="txtPassword2" required>
                    </td>
                </tr>
                <tr>
                    <th><label for="txtRole">Role</label></th>
                    <td>
                        <select id="txtRole" name="txtRole">
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                            <option value="3">Member</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="txtEmail">Email</label></th>
                    <td>
                        <input type="email" id="txtEmail" name="txtEmail" required>
                    </td>
                </tr>
            </table>

            <div class="actions">
                <input type="submit" name="btnSubmit" value="Create New User">
            </div>
        </form>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </footer>
</div>
</body>
</html>
