<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?? "TO-DO" ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="md:flex h-screen md:overflow-hidden">
        <?php
            $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
            if ($path !== "/login" && $path !== "/register") {
                include "../app/views/components/sidebar.php";
            }
        ?>
        <div class="flex-1 flex flex-col">
            <!-- <?php
                $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
                if ($path !== "/login" && $path !== "/register") {
                    include "../app/views/components/header.php";
                }
            ?> -->
            <div class="flex-1 overflow-auto p-10 bg-[#f5f7fb]">
                <div class="container mx-auto">
                    <?= $content; ?>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="./js/index.js" defer></script>
</body>
</html>