<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario contacto</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>
    <div class="warp">
        <div class="titulo">
            <h1>Escribeme un mensaje!</h1>
        </div>
        <div class="formulario">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php if(!$enviado && isset($nombre)) echo $nombre?>">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(!$enviado && isset($correo)) echo $correo?>">
                <textarea name="mensaje" class="form-control" placeholder="Mensaje"><?php if(!$enviado && isset($mensaje)) echo $mensaje?></textarea>

                <?php 
                    if (!empty($errores)): ?>
                <div class="alert error">
                    <?php echo $errores ?>
                </div>
                <?php elseif(!empty($enviado)): ?>
                    <div class="alert success">
                    <p>Enviado correctamente</p>
                </div>
                <?php endif ?>

                <input type="submit" value="Enviar correo" name="submit" class="btn">
            </form>
        </div>
    </div>
</body>

</html>