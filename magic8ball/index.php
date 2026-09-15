<?php
session_start();

$currentPage = 'magic8ball';

$responses = [
    'It is certain.',
    'Without a doubt.',
    'Yes, definitely.',
    'You may rely on it.',
    'As I see it, yes.',
    'Most likely.',
    'Outlook good.',
    'Signs point to yes.',
    'Reply hazy, try again.',
    'Ask again later.',
    'Better not tell you now.',
    'Cannot predict now.',
    'Don\'t count on it.',
    'My reply is no.',
    'Outlook not so good.',
    'Very doubtful.',
    'Without a doubt.',
];

$answer = 'Ask me a Question';

if (isset($_POST['question'])) {
    $question = trim($_POST['question']);
    $lastChar = substr($question, -1);

    if ($lastChar !== '?') {
        $answer = 'invalid question';
    } elseif (isset($_SESSION['last_question']) && $_SESSION['last_question'] === $question) {
        $answer = 'Please ask a new question';
    } else {
        $index = mt_rand(0, count($responses) - 1);
        $answer = $responses[$index];
        $_SESSION['last_question'] = $question;
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
    <title>Magic 8-Ball | Izaiah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/theme.css">
    <link rel="stylesheet" type="text/css" href="/css/magic8ball/styles.css">
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
        <h1>Magic 8-Ball</h1>
        <p class="bio">Ask a yes/no question that ends with a question mark.</p>

        <section>
            <marquee class="answer-marquee"><?php echo htmlspecialchars($answer); ?></marquee>

            <form class="ask-form" method="POST" action="">
                <label for="question">Your question</label>
                <input
                    type="text"
                    id="question"
                    name="question"
                    placeholder="Will I pass this class?"
                    value="<?php echo isset($_POST['question']) ? htmlspecialchars($_POST['question']) : ''; ?>"
                >
                <button type="submit">Ask</button>
            </form>
        </section>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </footer>
</div>
</body>
</html>
