<?php $currentPage = 'loops'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loops | Izaiah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/theme.css">
    <link rel="stylesheet" type="text/css" href="/css/loops/styles.css">
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
<?php
$num1 = "<h3>";
$num1 .= 100;
$num1 .= "</h3>";

echo $num1;

$i = 1;

while ($i < 7) {
    echo "<h$i>Hello World</h$i>";
    $i++;
}

$i = 6;

while ($i > 0) {
    echo "<h$i>Hello World</h$i>";
    $i--;
}

for ($i = 1; $i < 7; $i++) {
    echo "<h$i>Hello World</h$i>";
}

echo "<br /><br /><hr /><br />";

// Doug Smith
// 0123456789

$Full_Name = "Doug Smith";
$Position = strpos($Full_Name, ' ');
echo $Position;

echo "<br /><br /><hr /><br />";

$stuff = "This is a string";
echo "<h3>$stuff</h3>";

echo "<br /><br /><hr /><br />";

echo strtoupper($Full_Name) . "<br />";
echo strtolower($Full_Name) . "<br />";
echo $Full_Name . "<br />";

echo "<br /><br /><hr /><br />";

$nameParts = explode(' ', $Full_Name);
echo $nameParts[0] . "<br />";
echo $nameParts[1] . "<br />";
echo "<br /><br /><hr /><br />";


?>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </footer>
</div>
</body>
</html>
