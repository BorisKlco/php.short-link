<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= "https://" . $_SERVER["HTTP_HOST"] . "/static/style.css"  ?>>
    <link rel="stylesheet" href=<?= "https://" . $_SERVER["HTTP_HOST"] . "/static/stats.css"  ?>>
    <link rel="shortcut icon" href=<?= "https://" . $_SERVER["HTTP_HOST"] . "/static/logo.svg" ?> type="image/x-icon">
    <script src="https://unpkg.com/htmx.org@2.0.2"></script>
    <script src="https://unpkg.com/htmx-ext-response-targets@2.0.0/response-targets.js"></script>
    <title><?= $data['title'] ?></title>
</head>

<body>
    <div class="header">
        <nav>
            <img class="logo" src=<?= "https://" . $_SERVER["HTTP_HOST"] . "/static/logo.svg" ?> alt="">
            <div class="nav-selection">
                <a href="/">Home</a>
                <a href="/stats">Analytics</a>
            </div>
        </nav>
        <button class="login"><span>Sign in</span></button>
    </div>

    <?php include_once VIEW_PATH . $view . '.php'; ?>

</body>

</html>