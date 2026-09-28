<?php
$currentPage = 'movielist';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movieTitle = trim($_POST['movieTitle'] ?? '');
    $movieRating = trim($_POST['movieRating'] ?? '');

    if ($movieTitle === '' || $movieRating === '') {
        $error = 'Please enter both a movie title and a rating.';
    } else {
        try {
            include __DIR__ . '/../includes/db.php';

            $stmt = mysqli_prepare(
                $con,
                'INSERT INTO movielist (movieTitle, movieRating) VALUES (?, ?)'
            );
            mysqli_stmt_bind_param($stmt, 'ss', $movieTitle, $movieRating);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            header('Location: index.php');
            exit;
        } catch (Throwable $e) {
            $error = $e->getMessage();
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
    <link rel="stylesheet" type="text/css" href="/css/movielist/styles.css">
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
        <form class="movie-form" method="post" action="movieadd.php">
            <h3>Add New Movie</h3>

            <?php if ($error !== ''): ?>
                <p class="status"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <table>
                <tr>
                    <th>Movie Title</th>
                    <td>
                        <input type="text" name="movieTitle" value="<?php echo htmlspecialchars($_POST['movieTitle'] ?? ''); ?>">
                    </td>
                </tr>
                <tr>
                    <th>Movie Rating</th>
                    <td>
                        <input type="text" name="movieRating" value="<?php echo htmlspecialchars($_POST['movieRating'] ?? ''); ?>">
                    </td>
                </tr>
            </table>

            <div class="actions">
                <button type="submit">Add New Movie</button>
            </div>
        </form>

        <a class="back-link" href="index.php">Back to Movie List</a>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </footer>
</div>
</body>
</html>
