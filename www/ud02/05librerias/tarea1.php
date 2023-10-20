<?php 
	include("utilidades.php");

/**Realiza los seguintes pasos:

1. Crea un fichero PHP a modo de librería con todas las funciones creadas, llámale utilidades.php.
2. Escribe la diferencia entre `include`, `include_once`, `require` y `require_once` dentro del código de la librería de funciones como un comentario del código fuente.

	- ìnclude() inclúe e interepreta o contido do ficheiro, mesmo se este xa foi incluído anteriormente
	- `include_onde()` é semellante á anterior, mais neste caso se o arquivo xa foi incluído antes, non o volve facer.
	- `require()` tamén se parece a `include()` no que respecto á inclusión e interpretación, pero este produce un erro fatal en caso de que algo falle.
	- `require_once()`, como se pode intuir, reúne as funcións de `require()`, e igual que `include_once()`, só inclúe unha vez.

3. Divide el `index.php` de tal forma que tengas distintos recursos repartidos en ficheros:

Fichero         | Contiene el `div` con `id`
:-              |:-
`logo.php` |`id="logo"`
`menu.php` |`id="menu"`
`pictures.php` |`id="pictures"`
`content.php` |`id="content"`
`sidebar.php` |`id="sidebar"`
`footer.php` |`id="footer"`

Modifica el `index.php` para que cargue los recursos indicados en el paso anterior
*/
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
			<title>Web Portal - Includes and requires</title>
			<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
		</head>
		<body>

			<div id="header" class="container">

				<div id="logo">
					<h1>
						<a href="#">PHP</a>
					</h1>
					<p>template design by <a href="http://www.freecsstemplates.org">FCT</a>
					</p>
				</div>';

				<div id="menu">
					<ul>
						<li class="current_page_item">
							<a href="#">Homepage</a>
						</li>
						<li>
							<a href="#">Blog</a>
						</li>
						<li>
							<a href="#">Photos</a>
						</li>
						<li>
							<a href="#">About</a>
						</li>
						<li>
							<a href="#">Contact</a>
						</li>
					</ul>
				</div>


			</div>

			<div id="pictures">

				<ul id="gallery">
					<li>
						<a href="images/img01_big.jpg">
							<img src="images/img01.jpg" title="Phasellus nec erat sit amet nibh pellentesque congue." alt="" />
						</a>
					</li>
					<li>
						<a href="images/img02_big.jpg">
							<img src="images/img02.jpg" title="Phasellus nec erat sit amet nibh pellentesque congue." alt="" />
						</a>
					</li>
					<li>
						<a href="images/img03_big.jpg">
							<img src="images/img03.jpg" title="Phasellus nec erat sit amet nibh pellentesque congue." alt="" />
						</a>
					</li>
					<li>
						<a href="images/img04_big.jpg">
							<img src="images/img04.jpg" title="Phasellus nec erat sit amet nibh pellentesque congue." alt="" />
						</a>
					</li>
					<li>
						<a href="images/img02_big.jpg">
							<img src="images/img02.jpg" title="Phasellus nec erat sit amet nibh pellentesque congue." alt="" />
						</a>
					</li>
					<li>
						<a href="images/img01_big.jpg">
							<img src="images/img01.jpg" title="Phasellus nec erat sit amet nibh pellentesque congue." alt="" />
						</a>
					</li>
					<li>
						<a href="images/img04_big.jpg">
							<img src="images/img04.jpg" title="Phasellus nec erat sit amet nibh pellentesque congue." alt="" />
						</a>
					</li>
					<li>
						<a href="images/img03_big.jpg">
							<img src="images/img03.jpg" title="Phasellus nec erat sit amet nibh pellentesque congue." alt="" />
						</a>
					</li>
				</ul>
				<br class="clear" />

			</div>

			<div id="page">
				<div id="bg1">
					<div id="bg2">
						<div id="bg3">
							<div id="content">
								<h2>Welcome to our website</h2>
								<p> This is the DIV with ID content</p>
							</div>
							<div id="sidebar">
								<h2>Paesent scelerisque</h2>
								<ul>
									<li>
										<a href="#">DIV with ID sidebar</a>
									</li>
									<li>
										<a href="#">Etiam rhoncus volutpat erat</a>
									</li>
									<li>
										<a href="#">Donec dictum metus in sapien</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div id="footer">
				<p>Copyright (c) 2012 meusitio.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org">FCT</a>.
				</p>
			</div>
		</body>
	</html>