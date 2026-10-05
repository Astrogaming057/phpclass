<?php
$currentPage = 'movielist';
$error = '';
$movieID = null;
$movieTitle = '';
$movieRating = '';

include __DIR__ . '/../includes/db.php';

// Handle update POST first
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movieID = filter_var($_POST['movieID'] ?? null, FILTER_VALIDATE_INT);
    $movieTitle = trim($_POST['movieTitle'] ?? '');
    $movieRating = trim($_POST['movieRating'] ?? '');

    if ($movieID === false || $movieID === null) {
        header('Location: index.php');
        exit;
    }

    if ($movieTitle === '' || $movieRating === '') {
        $error = 'Please enter both a movie title and a rating.';
    } else {
        try {
            $stmt = $pdo->prepare(
                'UPDATE movielist SET movieTitle = :Title, movieRating = :Rating WHERE movieID = :ID'
            );
            $stmt->bindValue(':Title', $movieTitle);
            $stmt->bindValue(':Rating', $movieRating);
            $stmt->bindValue(':ID', $movieID, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: index.php');
            exit;
        } catch (Throwable $e) {
            $error = $e->getMessage();
        }
    }
} else {
    // GET: require a valid integer ID
    if (!isset($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    $movieID = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    if ($movieID === false) {
        header('Location: index.php');
        exit;
    }

    try {
        $stmt = $pdo->prepare('SELECT movieID, movieTitle, movieRating FROM movielist WHERE movieID = :ID');
        $stmt->bindValue(':ID', $movieID, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            header('Location: index.php');
            exit;
        }

        $movieID = (int) $row['movieID'];
        $movieTitle = $row['movieTitle'];
        $movieRating = $row['movieRating'];
    } catch (Throwable $e) {
        $error = $e->getMessage();
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
        <form class="movie-form" method="post" action="movieupdate.php">
            <h3>Update Movie</h3>

            <?php if ($error !== ''): ?>
                <p class="status"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <input type="hidden" name="movieID" value="<?php echo htmlspecialchars((string) $movieID); ?>">

            <table>
                <tr>
                    <th>Movie Title</th>
                    <td>
                        <input type="text" name="movieTitle" value="<?php echo htmlspecialchars($movieTitle); ?>">
                    </td>
                </tr>
                <tr>
                    <th>Movie Rating</th>
                    <td>
                        <input type="text" name="movieRating" value="<?php echo htmlspecialchars($movieRating); ?>">
                    </td>
                </tr>
            </table>

            <div class="actions">
                <button type="submit">Update Movie</button>
                <button type="button"
                        onclick="if (confirm('Are you sure you want to delete this movie?')) { window.location.href='moviedelete.php?id=<?php echo (int) $movieID; ?>'; }">
                    Delete Movie
                </button>
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
