<!DOCTYPE html>
<html>
<head>
<title><?php echo $viewModel->get('pageTitle'); ?></title>
</head>
<body>
<section>
	<?php 
		$data = $viewModel->get('articleTitle'); 
		for ($i=0; $i < sizeof($data); $i++) {
			echo '<h1>'.$data[$i]->title . '</h1>';
		}
	?>
</section>

<?php require($this->viewFile); ?>
</body>
</html>