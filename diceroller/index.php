<?php
$currentPage = 'diceroller';

$playerDice = [];
$computerDice = [];
$playerScore = 0;
$computerScore = 0;
$result = '';
$rolled = false;

if (isset($_POST['roll'])) {
    $rolled = true;

    for ($i = 0; $i < 2; $i++) {
        $playerDice[] = mt_rand(1, 6);
    }

    for ($i = 0; $i < 3; $i++) {
        $computerDice[] = mt_rand(1, 6);
    }

    $playerScore = array_sum($playerDice);
    $computerScore = array_sum($computerDice);

    if ($playerScore > $computerScore) {
        $result = 'You win!';
    } elseif ($computerScore > $playerScore) {
        $result = 'Computer wins!';
    } else {
        $result = 'Tie / Draw';
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
    <title>Dice Roller | Izaiah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/theme.css">
    <link rel="stylesheet" type="text/css" href="/css/diceroller/styles.css">
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
        <h1>Dice Roller</h1>
        <p class="bio">You roll 2 dice. The computer rolls 3. Highest total wins.</p>

        <form class="roll-form" method="POST" action="">
            <button type="submit" name="roll" value="1">Roll Dice</button>
        </form>

        <?php if ($rolled): ?>
            <section class="roll-side">
                <h2>Player <span class="score">(<?php echo $playerScore; ?>)</span></h2>
                <div class="dice-row">
                    <?php foreach ($playerDice as $die): ?>
                        <img
                            class="die"
                            src="/images/dice/dice_<?php echo $die; ?>.png"
                            alt="Player die showing <?php echo $die; ?>"
                            width="96"
                            height="96"
                        >
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="roll-side">
                <h2>Computer <span class="score">(<?php echo $computerScore; ?>)</span></h2>
                <div class="dice-row">
                    <?php foreach ($computerDice as $die): ?>
                        <img
                            class="die"
                            src="/images/dice/dice_<?php echo $die; ?>.png"
                            alt="Computer die showing <?php echo $die; ?>"
                            width="96"
                            height="96"
                        >
                    <?php endforeach; ?>
                </div>
            </section>

            <p class="outcome"><?php echo htmlspecialchars($result); ?></p>
        <?php endif; ?>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </footer>
</div>
</body>
</html>
