<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ASSET_CSS . 'bootstrap.css' ?>">
    <link rel="shortcut icon" href="<?= FAVICON ?>" type="image/x-icon">
    <title><?= $titulo ?? 'Administración' ?></title>

    <style>
        .background-image {
            position: fixed;
            inset: 0;
            z-index: -1;
            opacity: 0.9;
            filter: blur(5px);
            background-color: #f8f9fa;
            background-image: url('<?= ASSET_IMG . 'fondo_admin2.jpg' ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body>
    <div class="background-image"></div>
    <?php include_once __DIR__ . '/../includes/AdminHeader.php'; ?>

    <main class="container-fluid my-4">
        <div class="card shadow-sm" style="background-color: rgba(255, 255, 255, 0.75);">
            <div class="card-body">
                <?php include_once $viewPath; ?>
            </div>
        </div>
    </main>

    <script src="<?= ASSET_JS . 'bootstrap.js' ?>"></script>
</body>

</html>