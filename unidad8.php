<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

<div class="container">
    <header>
        <h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
        
        <nav>
            <?php include("botonera.php"); ?>
        </nav>
    </header>
    
    <section class="contenido-unidad8">
        <!-- Formularios -->
        <div class="formularios-grid">
            
            <!-- Registrar un usuario -->
            <div class="card-form">
                <h2> Usuario Nuevo </h2>

                <form action="parte 8/cargarusuario.php" method="POST">
                    <div class="campo">
                        <label for="reg_email"> Email: </label>
                        <input type="email" id="reg_email" name="email" required>
                    </div>

                    <div class="campo">
                        <label for="reg_password"> Contraseña: </label>
                        <input type="password" id="reg_password" name="contrasena" required>
                    </div>

                    <button type="submit" class="btn-verde"> Registrar </button>
                </form>
            </div>

            <!-- Login -->
            <div class="card-form">
                <h2> Login </h2>

                <form action="parte 8/verificarusuario.php" method="POST">
                    <div class="campo">
                        <label for="login_email"> Email: </label>
                        <input type="email" id="login_email" name="email" required>
                    </div>

                    <div class="campo">
                        <label for="login_password"> Contraseña: </label>
                        <input type="password" id="login_password" name="contrasena" required>
                    </div>

                    <button type="submit" class="btn-azul"> Ingresar </button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
    </footer>
</div>

</body>
</html>