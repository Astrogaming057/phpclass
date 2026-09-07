<?php $currentPage = 'home'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Izaiah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Source+Sans+3:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/theme.css">
    <link rel="stylesheet" type="text/css" href="/css/home/styles.css">
</head>
<body data-random-banner="1">
<div class="site">
    <header class="panel site-header">
        <?php include __DIR__ . '/includes/header.php'; ?>
        <nav class="navbar">
            <?php include __DIR__ . '/includes/nav.php'; ?>
        </nav>
    </header>

    <main class="panel site-main">
        <div class="intro">
            <img class="photo" src="/images/20251104_103611.jpg" alt="Izaiah">
            <p class="eyebrow">Hello, I'm</p>
            <h1>Izaiah</h1>
            <p class="handle">aka @Astrogaming057</p>
        </div>

        <section>
            <h2>About me</h2>
            <p class="bio">
                I'm a student learning Computer Science / Software Engineering, and I go by Astro online.
                I make and host websites, Discord bots, and game servers.
            </p>
        </section>

        <div class="split">
            <section>
                <h2>Favorite movies</h2>
                <ul class="chips">
                    <li>Jurassic Park / World</li>
                    <li>How to Train Your Dragon</li>
                </ul>
            </section>
            <section>
                <h2>Favorite book series</h2>
                <ul class="chips">
                    <li>Wings of Fire</li>
                </ul>
            </section>
        </div>

        <section>
            <h2>Sites I've made</h2>
            <ul class="site-grid">
                <li><a href="https://astroslounge.com" target="_blank" rel="noopener noreferrer">astroslounge.com</a></li>
                <li><a href="https://ugc.astroslounge.com/" target="_blank" rel="noopener noreferrer">ugc.astroslounge.com</a></li>
                <li><a href="https://abuse.astroslounge.com/" target="_blank" rel="noopener noreferrer">abuse.astroslounge.com</a></li>
                <li><a href="https://access.astroslounge.com/" target="_blank" rel="noopener noreferrer">access.astroslounge.com</a></li>
                <li class="more">…and a lot more</li>
            </ul>
        </section>
    </main>

    <footer class="panel site-footer">
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </footer>
</div>
<script src="/js/home/index.js"></script>
</body>
</html>
