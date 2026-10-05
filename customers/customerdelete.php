<?php
include __DIR__ . '/../includes/db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$customerID = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if ($customerID === false) {
    header('Location: index.php');
    exit;
}

try {
    $stmt = mysqli_prepare($con, 'DELETE FROM customers WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'i', $customerID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
} catch (Throwable $e) {
}

header('Location: index.php');
exit;
