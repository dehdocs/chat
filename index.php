<?php include('controllers/init.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php $layout->theTitle(); ?></title>
<?php $layout->theCss(); ?>
<?php $layout->theJs(); ?>
</head>
<body>
<div id="geral">

	<div class="loading"><img src="assets/img/load.gif"  class="imgload"/></div>
	<?php
	if(!isset($_SESSION['senha'])){
		include('paginas/form.php');
	}else{
		include('paginas/fila.php');
	}
	?>
</body>
</html>
