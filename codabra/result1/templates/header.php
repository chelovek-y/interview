<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Сайт для участников</title>
    
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script src="<?= Controller::link('') ?>js/main.js"></script>

</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">
		<!-- Logo + Top Nav -->
		<div id="top">
			<h1><a href="<?= Controller::link('') ?>">Сайт для участников</a></h1>
<? if ($login) { ?>
	        <div id="top-navigation">
				Welcome <strong><?= $login ?></strong>
			   
				<span>|</span>
				<a href="<?= Controller::task('logout') ?>">Log out</a>
			</div>
<? ;} ?>
		   
		</div>
		<!-- End Logo + Top Nav -->
		
		<!-- Main Nav -->
		<div id="navigation">
			<ul>
			    <li><a href="<?= Controller::link('') ?>" class="<?= ($view=='main') ?  ("active") :  ("") ?>" ><span>Главная</span></a></li>
			    <li><a href="<?= Controller::link('page1') ?>" class="<?= ($view=='page1') ?  ("active") :  ("") ?>" ><span>Страница 1</span></a></li>
			    <li><a href="<?= Controller::link('page2') ?>" class="<?= ($view=='page2') ?  ("active") :  ("") ?>" ><span>Страница 2</span></a></li>
			</ul>
		</div>
		<!-- End Main Nav -->
	</div>
</div>
<!-- End Header -->