<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Buy Your Way to a Better Education!</title>
	<!--<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />-->
</head>

<body>
	<?php
	$check = false;
	if (isset($_POST["name"]) && isset($_POST["section"]) && isset($_POST["creditCard"])  && isset($_POST["cardType"])
		&& $_POST["name"] !="" && $_POST["section"] !="" && $_POST["creditCard"] !="" && $_POST["cardType"] !="" ) {


	$name = $_POST["name"];
	$section = $_POST["section"];
	$creditCard = $_POST["creditCard"];
	$cardType = $_POST["cardType"];

	$myfile = fopen("sucker.txt", "a") or die("Unable to open file!");
	$txt = "\n".$name.";".$section.";".$creditCard.";".$cardType;
	fwrite($myfile, $txt);

	} else {
		$check=true;
	}
	
	?>
	<div <?php if ($check) echo 'style="display: none;"'; ?>>
	<h1>Thanks, sucker!</h1>

	<p>Your information has been recorded.</p>

	<dl>
		<dt>Name</dt>
		<dd><?php echo $name ?></dd>

		<dt>Section</dt>
		<dd><?php echo $section ?></dd>

		<dt>Credit Card</dt>
		<dd><?php echo $creditCard." (".$cardType.")"; ?> </dd>
	</dl>

	<pre><?php
	echo file_get_contents( "sucker.txt" );
	?>
	</pre>

	</div>

	<div <?php if (!$check) echo 'style="display: none;"'; ?>>
		<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a></p>
	</div>
</body>
</html>  