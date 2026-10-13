<?php
$currentPage = 'login';
$msg = '';

if (!empty($_POST["txtUsername"])) {
    if (!empty($_POST["txtPassword"])) {

        $username = $_POST["txtUsername"];
        $passwd = $_POST["txtPassword"];

        if ($username == "admin" && $passwd == "p@ss") {
            header("Location: admin.php");
            exit;
        } else {
            if ($username == "member" && $passwd == "p@ss") {
                header("Location: member.php");
                exit;
            }

            $msg = "Sorry Wrong Username or Password";
        }

    }
}
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
        <form class="login-form" method="post" action="index.php">
            <h3>Login</h3>

            <?php if ($msg !== ''): ?>
                <p class="status"><?php echo htmlspecialchars($msg); ?></p>
            <?php endif; ?>

            <table>
                <tr>
                    <th><label for="txtUsername">Username</label></th>
                    <td>
                        <input type="text" id="txtUsername" name="txtUsername" required
                               value="<?php echo htmlspecialchars($_POST['txtUsername'] ?? ''); ?>">
                    </td>
                </tr>
                <tr>
                    <th><label for="txtPassword">Password</label></th>
                    <td>
                        <input type="password" id="txtPassword" name="txtPassword" required>
                    </td>
                </tr>
            </table>

            <div class="actions">
                <button type="submit">Login</button>
            </div>
        </form>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </footer>
</div>
</body>
</html>
