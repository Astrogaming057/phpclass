<?php
$currentPage = 'countdown';

$config = [
    'label' => 'December 18, 2026',
    'end' => '2026-12-18 23:59:59',
    'timezone' => 'UTC-5',
];

$timezone = new DateTimeZone('-05:00');
date_default_timezone_set('Etc/GMT+5');

$now = new DateTime('now', $timezone);
$end = new DateTime($config['end'], $timezone);

$remaining = max(0, $end->getTimestamp() - $now->getTimestamp());
$done = $remaining === 0;

$days = intdiv($remaining, 86400);
$hours = intdiv($remaining % 86400, 3600);
$minutes = intdiv($remaining % 3600, 60);
$seconds = $remaining % 60;

$data = [
    'label' => $config['label'],
    'timezone' => $config['timezone'],
    'server_ts' => $now->getTimestamp(),
    'end_ts' => $end->getTimestamp(),
    'done' => $done,
    'days' => $days,
    'hours' => $hours,
    'minutes' => $minutes,
    'seconds' => $seconds,
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Countdown | Izaiah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/theme.css">
    <link rel="stylesheet" type="text/css" href="/css/countdown/styles.css">
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
        <p class="eyebrow">Fall 2026</p>
        <h1>Semester Countdown</h1>
        <p class="bio">Counting down to the end of the semester: <?php echo htmlspecialchars($data['label']); ?> (<?php echo htmlspecialchars($data['timezone']); ?>).</p>

        <section>
            <h2>Time left</h2>
            <div class="countdown">
                <div class="count-box">
                    <span class="count-value" data-unit="days"><?php echo $days; ?></span>
                    <span class="count-label">Days</span>
                </div>
                <div class="count-box">
                    <span class="count-value" data-unit="hours"><?php echo sprintf('%02d', $hours); ?></span>
                    <span class="count-label">Hours</span>
                </div>
                <div class="count-box">
                    <span class="count-value" data-unit="minutes"><?php echo sprintf('%02d', $minutes); ?></span>
                    <span class="count-label">Minutes</span>
                </div>
                <div class="count-box">
                    <span class="count-value" data-unit="seconds"><?php echo sprintf('%02d', $seconds); ?></span>
                    <span class="count-label">Seconds</span>
                </div>
            </div>
            <p class="countdown-done" data-countdown-done<?php echo $done ? '' : ' hidden'; ?>>Semester's over — you made it!</p>
        </section>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </footer>
</div>
<script id="countdown-data" type="application/json"><?php echo json_encode($data); ?></script>
<script src="/js/countdown/index.js"></script>
</body>
</html>
