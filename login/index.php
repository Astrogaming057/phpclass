<?php
session_start();

$currentPage = 'login';
$msg = '';

if (!empty($_POST["txtEmail"])) {
    if (!empty($_POST["txtPassword"])) {

        $Email = $_POST["txtEmail"];
        $passwd = $_POST["txtPassword"];

        try {
            include __DIR__ . '/../includes/db.php';

            $sql = mysqli_prepare($con, "Select memberPassword, memberKey, roleID, memberID from memberLogin where memberEmail = ?");
            mysqli_stmt_bind_param($sql, "s", $Email);
            mysqli_stmt_execute($sql);
            $result = mysqli_stmt_get_result($sql);
            $row = mysqli_fetch_array($result);

            if ($row != null) {
                $DBPass = $row["memberPassword"];
                $MemberKey = $row["memberKey"];
                $passwd = md5($passwd . $MemberKey);

                if ($passwd == $DBPass) {
                    $_SESSION["roleID"] = $row["roleID"];
                    $_SESSION["UID"] = $row["memberID"];

                    if ($row["roleID"] == 1) {
                        header("Location: admin.php");
                        exit;
                    } else {
                        header("Location: member.php");
                        exit;
                    }
                } else {
                    $msg = "Sorry Wrong Username or Password";
                }
            } else {
                $msg = "Sorry Wrong Username or Password";
            }
        } catch (Throwable $e) {
            $msg = $e->getMessage();
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
                    <th><label for="txtEmail">Email</label></th>
                    <td>
                        <input type="text" id="txtEmail" name="txtEmail" required
                               value="<?php echo htmlspecialchars($_POST['txtEmail'] ?? ''); ?>">
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
