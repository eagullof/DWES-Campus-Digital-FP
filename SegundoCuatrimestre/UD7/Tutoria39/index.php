<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <!-- jQuery versión 3.5.0 desde CDN -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
        crossorigin="anonymous"></script>
</head>

<body>
    <h1>Registro de usuario en tiempo real sin refresco</h1>
    <h2>Utilizando AJAX gracias a jquery</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET["email"])) {
            echo "<script>alert('Datos introducidos correctamente.');</script>";
            echo "<p>Datos introducidos correctamente.</p>";
        }
    }
    ?>
    <form method="get" name="datos_usuario" onsubmit="return validar_email()">
        <input type="text" id="email" name="email" />
        <input type="submit" value="Validar" />
    </form>

    <script>
        function validar_email() {
            // Aquí iría el código de validación
            let valor = document.getElementById("email").value;
            let pos_arroba = valor.indexOf("@");
            let pos_punto = valor.lastIndexOf(".");
            if (pos_arroba < 1 || pos_punto < pos_arroba + 2 || pos_punto + 2 >= valor.length) {
                alert('Dirección de correo no válida.');
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: "email.php",
                    data: {
                        email: valor
                    }, // Enviar datos como objeto JSON
                    statusCode: {
                        404: function() {
                            alert('Página no encontrada');
                        }
                    },
                    success: function(result) {
                        alert("Resultado: " + result);
                    }
                });
                return false;
            }
        }

        function validar_email2() {
            let valor = document.getElementById("email").value;
            let pos_arroba = valor.indexOf("@");
            let pos_punto = valor.lastIndexOf(".");
            if (pos_arroba < 1 || pos_punto < pos_arroba + 2 || pos_punto + 2 >= valor.length) {
                alert('Dirección de correo no válida.');
                return false;
            }
            return true;
        }
    </script>

</body>

</html>