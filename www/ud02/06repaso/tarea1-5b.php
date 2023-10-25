<html>
    <head>
        <title>Tarefa 1, exercicio 5</title>
    </head>
    <body>
        <p>Escribir una página web que dados unos segundos (recogidos en un formulario) exprese su equivalente en semanas, días, horas, minutos y segundos.</p>

        <p>Formulario</p>
        <div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <p>Segundos: <input type="number" name="segundos"></p>
                <p><input type="submit" title="enviar" value="Enviar"></p>
            </form>
        </div>
        <div>
            <?php
                $segundos = $_POST['segundos'];
                echo "<p>Resultado: ";

                $semanas = floor($segundos/604800);
                $segundos %= 604800;

                $dias = floor($segundos/86400);
                $segundos %= 86400;

                $horas = floor($segundos/3600);
                $segundos %= 3600;

                $minutos = floor($segundos/60);

                $segundos %= 60;

                if ($semanas <= 0) {
                    if ($dias <= 0) {
                        if ($horas <= 0) {
                            if ($minutos <= 0) {
                                if ($segundos <= 0) {
                                    echo "Erro.";
                                } else {
                                    echo $segundos." segundos";
                                }
                            } else {
                                echo $minutos." minutos e ".$segundos." segundos";
                            }
                        } else {
                            echo $horas." horas, ".$minutos." minutos e ".$segundos." segundos";
                        }
                    } else {
                        echo $dias. " días, ".$horas." horas, ".$minutos." minutos e ".$segundos." segundos";
                    }
                } else {
                    echo $semanas." semanas, ".$dias. " días, ".$horas." horas, ".$minutos." minutos e ".$segundos." segundos";
                }
                echo ".</p>";
            ?>
        </div>
    </body>
</html>