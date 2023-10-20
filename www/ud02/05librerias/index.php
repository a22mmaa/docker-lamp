<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
			<title>Web Portal - Includes and requires</title>
			<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
    <body>

        <?php include("logo.php");?>

        <?php include("menu.php");?>
 
        <?php include("pictures.php"); ?>

        <div id="page">
            <div id="bg1">
                <div id="bg2">
                    <div id="bg3">
                        <?php include("content.php");?>
                        <?php include("sidebar.php");?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include("footer.php");?>
    </body>
</html>