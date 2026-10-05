<?php
$currentPage = 'movielist';
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
        <h3>My Movie List</h3>
        <table>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>rating</th>
                <th>actions</th>
            </tr>

            <?php
            try {
                include __DIR__ . '/../includes/db.php';

                $rs = mysqli_query($con, "SELECT * FROM movielist");
                while ($row = mysqli_fetch_assoc($rs)) {
                    $id = (int) $row['movieID'];
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['movieID']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['movieTitle']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['movieRating']) . "</td>";
                    echo '<td class="actions-cell">';
                    echo '<a href="movieupdate.php?id=' . $id . '">Update</a>';
                    echo ' | ';
                    echo '<a href="moviedelete.php?id=' . $id . '" onclick="return confirm(\'Are you sure you want to delete this movie?\');">Delete</a>';
                    echo '</td>';
                    echo "</tr>";
                }
            } catch (Throwable $e) {
                echo '<tr><td colspan="4">' . htmlspecialchars($e->getMessage()) . '</td></tr>';
            }
            ?>

        </table>
        <a href="movieadd.php">Add Movie</a>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </footer>
</div>
</body>
</html>
