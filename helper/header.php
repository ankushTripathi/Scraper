<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Devza Assignments Portal</title>
</head>
<body> 
<div class="outer">
    <header>
	<figure>
	    <img src="https://www.devza.com/images/devza_logo.png" alt="MyCompany Logo" width="450" height="115">
	    <h1>Devza Assignments Portal</h1>
	    <figcaption>
	    </figcaption>
	</figure>
    </header>
    <nav>
	<ul>
	<?php 

	$assignments = scandir('../public',2);
	$ignore = array('.', '..','css');

	foreach($assignments as $assignment){

		if(!in_array($assignment, $ignore)){

		$displayName = ucwords(pathinfo($assignment,PATHINFO_FILENAME));
		echo '<li><a href="' . $assignment . '">' . $displayName . '</a></li>';
		}
	}


	?>
	</ul>
    </nav>
