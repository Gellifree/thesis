<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Egri Roma Szakkollégium</title>
</head>
<body class="bg-light">

<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="bg-dark container shadow-sm text-white rounded mt-4 p-1">
	<h6 class="my-2 mx-2">Üdvözlöm az Egri Roma Szakkollégium nyilvántartó oldalán!</h6>
</div>

<div class="container border shadow-sm rounded mt-3 bg-white p-2">
	 <?php if($this->ion_auth->logged_in()): ?>
	<p class="text-secondary m-2">
		Ön sikeresen bejelentkezett.
	</p>
	<?php else : ?>
	<p class="text-secondary m-2">
		Amennyiben rendelkezik hozzáféréssel, kérem a bejelentkezés gombra kattintás
			után adja meg a bejelentkezési adatait.
	</p>
	<?php endif; ?>
</div>

</body>
</html>
