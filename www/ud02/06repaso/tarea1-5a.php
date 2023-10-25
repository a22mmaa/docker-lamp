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
                switch ($segundos) {
                    case ($segundos >= 0 && $segundos <= 60):
                        echo $segundos." segundos";
                        break;
                    case ($segundos > 60 && $segundos < 3600):
                        $minutos = floor($segundos/60);
                        $segundos %= 60;
                        echo $minutos." minutos e ".$segundos." segundos";
                        break;
                    case ($segundos >= 3600 && $segundos < 86400):
                        $horas = floor($segundos/3600);
                        $minutos = floor(($segundos%3600)/60);
                        $segundos %= 60;
                        echo $horas." horas, ".$minutos." minutos e ".$segundos." segundos";
                        break;
                    case ($segundos >= 86400 && $segundos < 604800):
                        $dias = floor($segundos/86400);
                        $horas = floor(($segundos%86400)/3600);
                        $minutos = floor(($segundos%3660)/60);
                        $segundos %= 60;
                        echo $dias. " días, ".$horas." horas, ".$minutos." minutos e ".$segundos." segundos";
                        break;
                    case ($segundos >= 604800):
                        $semanas = floor($segundos/604800);
                        $dias = floor(($segundos%604800)/86400);
                        $horas = floor(($segundos%86400)/3600);
                        $minutos = floor(($segundos%3600)/60);
                        $segundos %= 60;
                        echo $semanas." semanas, ".$dias. " días, ".$horas." horas, ".$minutos." minutos e ".$segundos." segundos";
                        break;
                }
                echo ".</p>";
            ?>
        </div>
    </body>
</html>