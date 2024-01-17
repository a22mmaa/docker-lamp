<?php

function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}

function get_mensaxes_html_format($mensaxes)
    {
        echo "a";
        $resultado = "";
    
        if (count($mensaxes) > 0) {
            foreach ($mensaxes as $mensaxe) {
                if ($mensaxe[0] == "erro") {
                    $resultado .= '<div class="alert alert-danger" role="alert">' . $mensaxe[1] . '</div>';
                } elseif ($mensaxe[0] == "success") {
                    $resultado .= '<div class="alert alert-success" role="alert">' . $mensaxe[1] . '</div>';
                }
            }
        }
    
        return $resultado;
    }