<?php

/*Haz una página que ejecute la función phpinfo() y que muestre las principales variables de servidor mencionadas en teoría.
*/

/* Entendo que para mostrar soamente "as principais variábeis de servidor" deberíamos
  evitar usar "a secas" `phpinfo()`. A información que procuramos estaría contida dentro
  da variábel predefinida `$_SERVER`. Para facelo máis eficiente, e xa que se pide
  explicitamente usar `phpinfo()`, en lugar de ir executando `echo $_SERVER ["SERVER_ADDR"]`
  e continuar mostrando os diferentes contidos deste array, optamos por unha solución
  moito máis sinxela que podemos encontrar na documentación: `phpinfo(32)` ou, como
  executamos:
*/

    phpinfo(INFO_VARIABLES)


?>