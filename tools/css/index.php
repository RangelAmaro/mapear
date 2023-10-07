<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/min.css">
    <link rel="shortcut icon" href="../../assets/img/favicon.png" type="image/x-icon">
    <title>Escolher URL</title>
    <meta name="description" content="DESCRIÇÃO">
</head>
<body>
    <?php include '../../blocos-html/header-logado.html'; ?>
    <?php include '../../blocos-html/nav-header-pup-up.html'; ?>
    <form method="GET" action="tools.php">
        <label for="url">Digite a URL do site:</label>
        <input type="text" id="url" name="url" placeholder="https://www.example.com" required>
        <button type="submit">Visualizar</button>
    </form>
    <?php include '../../blocos-html/aviso-home.html'; ?>
    <?php include '../../blocos-html/footer.html'; ?>
</body>
</html>