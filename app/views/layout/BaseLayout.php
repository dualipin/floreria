<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title><?= $titulo ?? 'Florería Macus' ?></title>
    <?= $assets ?? '' ?>
</head>

<body>
    <div class="position-absolute opacity-50 object-fit-cover h-100 w-100" style="inset: 0; z-index: -100; background-image: url('<?=INITIAL_ROUTE?>/assets/img/fondo_admin2.jpg'); background-repeat: no-repeat; background-size: cover;"></div>
    <?php require_once $viewPath ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>