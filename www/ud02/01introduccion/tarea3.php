<?php

/**Busca en la documentación de PHP las funciones de [manejo de variables](http://www.php.net/manual/es/funcref.php)

Comprueba el resultado devuelto por los siguientes fragmentos de código y analiza el resultado:
```php
- NOTA PREVIA: Antes de executar, foi conveniente mudar as aspas. Do contrario, o que devolverían todos sería un erro.
- $a = "true"; // imprime el valor devuelto por is_bool($a)... -> Devolve false, porque é un string.
- $c = "false"; // imprime el valor devuelto por gettype($c); -> Devolve string ao usalo con echo.
- $d = ""; // el valor devuelto por empty($d); -> True, xa que é un string baleiro.
- $e = 0.0; // el valor devuelto por empty($e); -> True, é un double baleiro (0).
- $f = 0; // el valor devuelto por empty($f); -> True, é un integral baleiro.
- $g = false; // el valor devuelto por empty($g); -> True, é un boolean false, e por tanto devolve baleiro.
- $h; // el valor devuelto por empty($h); -> A variábel está sen inicializar, polo que devolve erro.
- $i = "0"; // el valor devuelto por empty($i); -> Segundo a documentación, un string con este valor é considerado baleiro por esta función.
- $j = "0.0"; // el valor devuelto por empty($j); -> Idem.
- $k = true; // el valor devuelto por isset($k); -> Devolve true.
- $l = false; // el valor devuelto por isset($l); -> Existe, e por tanto, true.
- $m = true; // el valor devuelto por is_numeric($m); -> False, non é número nin string numérico.
- $n = ""; // el valor devuelto por is_numeric($n); -> False, non é número nin string numérico.
```
 */

?>