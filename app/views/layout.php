<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?? "TO-DO" ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container mx-auto p-4 space-y-10">
        <?php
            $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
            if ($path !== "/login" && $path !== "/register") {
                include dirname(__DIR__) . "/views/components/header.php";
            }
        ?>

        <?php echo $content; ?>
    </div>
</body>
</html>