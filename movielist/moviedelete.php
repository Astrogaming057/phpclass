<?php
include __DIR__ . '/../includes/db.php';

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
    $stmt = $pdo->prepare('DELETE FROM movielist WHERE movieID = :ID');
    $stmt->bindValue(':ID', $movieID, PDO::PARAM_INT);
    $stmt->execute();
} catch (Throwable $e) {
    // Still send the user back to the list; no frontend on this page.
}

header('Location: index.php');
exit;
