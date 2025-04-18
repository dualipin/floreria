<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Florería Macus' ?></title>
    <link rel="shortcut icon" href="<?= FAVICON ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= ASSET_CSS . 'bootstrap.css' ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?= INITIAL_ROUTE . '/assets/css/landing.css' ?>">
</head>

<body class="min-vh-100 d-flex flex-column">
    <?php include_once __DIR__ . '/../includes/LandingHeader.php'; ?>

    <?php if ($view): ?>
        <?php include_once __DIR__ . "/../$view.php"; ?>
    <?php else: ?>
        <div class="container mt-5">
            <h1 class="text-center">Bienvenido a la Florería Macus</h1>
            <p class="text-center">Aquí encontrarás las flores más hermosas y frescas para cualquier ocasión.</p>
        </div>
    <?php endif; ?>

    <?php include_once __DIR__ . '/../includes/LandingFooter.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>