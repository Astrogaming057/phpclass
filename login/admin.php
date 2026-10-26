<?php
session_start();

$currentPage = 'login';

$err = "";
$Username = "";
$Password = "";
$Password2 = "";
$Role = "";
$Email = "";

if (!isset($_SESSION["UID"]) || !isset($_SESSION["roleID"]) || $_SESSION["roleID"] != 1) {
    header("Location: index.php");
    exit;
}

$roles = [];
$dbError = "";

try {
    include __DIR__ . '/../includes/db.php';

    $rs = mysqli_query($con, "select roleID, roleName from role order by roleID");
    while ($row = mysqli_fetch_assoc($rs)) {
        $roles[] = $row;
    }
} catch (Throwable $e) {
    $dbError = $e->getMessage();
}

if (isset($_POST["btnSubmit"])) {
    if (!empty($_POST["txtUsername"])) {
        $Username = $_POST["txtUsername"];
        if (strlen($Username) < 4) {
            $err = "Username must be at least 4 characters!";
        }
    } else {
        $err = "Username is Required!";
    }
    if (!empty($_POST["txtPassword"])) {
        $Password = $_POST["txtPassword"];
        if (strlen($Password) < 4) {
            $err = "Password must be at least 4 characters!";
        }
    } else {
        $err = "Password is Required!";
    }
    if (!empty($_POST["txtPassword2"])) {
        $Password2 = $_POST["txtPassword2"];
    } else {
        $Password2 = "";
    }
    if ($Password != $Password2) {
        $err = "Password do not Match!";
    }
    if (!empty($_POST["txtRole"])) {
        $Role = $_POST["txtRole"];
    } else {
        $err = "Role is Required!";
    }
    if (!empty($_POST["txtEmail"])) {
        $Email = $_POST["txtEmail"];
        $atPos = strpos($Email, "@");
        if ($atPos === false || strpos($Email, ".", $atPos) === false) {
            $err = "Email must contain an @ and a period after the @!";
        }
    } else {
        $err = "Email is Required!";
    }

    if ($err == "" && $dbError == "") {

        $MemberKey = sprintf(
            '%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(16384, 20479),
            mt_rand(32768, 49151),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535)
        );
        $MemberKey = md5($MemberKey);
        $hashedPassword = md5($Password . $MemberKey);

        try {
            $sql = mysqli_prepare($con, "insert into memberLogin (memberEmail,memberName,memberPassword,roleID,memberKey) values (?,?,?,?,?)");
            mysqli_stmt_bind_param($sql, "sssis", $Email, $Username, $hashedPassword, $Role, $MemberKey);
            mysqli_stmt_execute($sql);

            $Username = "";
            $Password = "";
            $Password2 = "";
            $Email = "";
            $err = "Member Added To Database";
        } catch (Throwable $e) {
            if (str_contains($e->getMessage(), "Duplicate")) {
                $err = "Email already exists!";
            } else {
                $err = $e->getMessage();
            }
        }
    }
}

if ($err == "" && $dbError != "") {
    $err = $dbError;
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
        <h3 class="page-title">Admin Page</h3>

        <form class="login-form admin-form" method="post" action="admin.php">
            <h3>Add New Member</h3>

            <?php if ($err != ""): ?>
                <p class="status"><?php echo htmlspecialchars($err); ?></p>
            <?php endif; ?>

            <table>
                <tr>
                    <th><label for="txtUsername">Username</label></th>
                    <td>
                        <input type="text" id="txtUsername" name="txtUsername" required minlength="4"
                               value="<?php echo htmlspecialchars($Username); ?>">
                    </td>
                </tr>
                <tr>
                    <th><label for="txtPassword">Password</label></th>
                    <td>
                        <input type="password" id="txtPassword" name="txtPassword" required minlength="4">
                    </td>
                </tr>
                <tr>
                    <th><label for="txtPassword2">Retype Password</label></th>
                    <td>
                        <input type="password" id="txtPassword2" name="txtPassword2" required minlength="4">
                    </td>
                </tr>
                <tr>
                    <th><label for="txtRole">Role</label></th>
                    <td>
                        <select id="txtRole" name="txtRole">
                            <?php foreach ($roles as $row): ?>
                                <option value="<?php echo (int) $row["roleID"]; ?>"<?php echo $Role == $row["roleID"] ? " selected" : ""; ?>>
                                    <?php echo htmlspecialchars($row["roleName"]); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="txtEmail">Email</label></th>
                    <td>
                        <input type="text" id="txtEmail" name="txtEmail" required
                               pattern=".*@.*\..*" title="Must contain an @ and a period after the @"
                               value="<?php echo htmlspecialchars($Email); ?>">
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
