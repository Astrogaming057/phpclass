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
    <style>
        .movie-form {
            max-width: 520px;
            margin: 0 auto;
            border: 1px solid rgba(192, 132, 252, 0.35);
            border-radius: 16px;
            padding: 1.5rem;
        }

        .movie-form h3 {
            text-align: center;
            margin-bottom: 1.25rem;
        }

        .movie-form table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.25rem;
        }

        .movie-form th,
        .movie-form td {
            border: 1px solid rgba(192, 132, 252, 0.35);
            padding: 0.75rem;
            text-align: left;
            vertical-align: middle;
        }

        .movie-form th {
            width: 35%;
            white-space: nowrap;
        }

        .movie-form input[type="text"] {
            width: 100%;
            padding: 0.55rem 0.7rem;
            border: 1px solid #3b2a52;
            border-radius: 8px;
            background: #21182c;
            color: #f3eef8;
            font: inherit;
        }

        .movie-form .actions {
            text-align: center;
        }

        .movie-form button {
            padding: 0.55rem 1.1rem;
            border-radius: 999px;
            border: 1px solid #c084fc;
            background: #2c203b;
            color: #ffffff;
            font: inherit;
            font-weight: 600;
            cursor: pointer;
        }

        .movie-form .status {
            text-align: center;
            margin-bottom: 1rem;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
        }
    </style>
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
