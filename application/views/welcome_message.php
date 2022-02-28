
<?php
defined('BASEPATH') or exit('No direct script access allowed');
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

<?php if ($this->ion_auth->logged_in()): ?>
	<div class="container border shadow-sm rounded mt-3 bg-white p-2">
		<p class="text-secondary m-2">
		 <?php echo $this->ion_auth->user()->row()->last_name?> sikeresen bejelentkezett.
		</p>
	</div>

<?php if ($this->ion_auth->is_admin()): ?>
	<div class="bg-dark container shadow-sm text-white rounded mt-4 p-1">
		<h6 class="my-2 mx-2">Kimutatások</h6>
	</div>
	<div class="container border shadow-sm rounded mt-3 bg-white p-3">
	 <!-- <p class="text-secondary m-2"> Ön Admin-ként van bejelentkezve.</p>-->

	 <h6 class="my-2">Előadások statisztikai adatai</h6>
	 <ul class="list-group">
	 	<li class="list-group-item"> Sikeres előadások száma: <?=count($successfull_presentations)?> db.</li>
		<li class="list-group-item"> Sikertelen előadások száma: <?=count($not_successfull_presentations)?> db.</li>
		<li class="list-group-item"> Egyeztetésre váró előadások száma: <?=count($waiting_presentations)?> db.</li>
		<li class="list-group-item"> Egyeztetett előadások száma: <?=count($not_waiting_presentations)?> db.</li>
	 </ul>

	 <button class="btn btn-info my-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
			Admin panel kinyitása
	 </button>
	</div>

	<!-- Offcanvas Sidebar -->
	<div class="offcanvas offcanvas-end" id="demo">
 		<div class="offcanvas-header bg-dark text-white">
	 		<h1 class="offcanvas-title">Admin panel</h1>
	 		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
 		</div>
 		<div class="offcanvas-body">
			<p>Adatbázisban szereplő tagok száma: <b><?=count($number_of_members)?></b>  </p>
			<p>Adatbázisban szereplő intézmények száma: <b><?=count($number_of_institutions)?></b>  </p>
			<p>Összes kifizetett ösztöndíj havonta:
			<b>
			<?php foreach ($sum_of_scholarship as $sum): ?>
				<?=$sum->osztondij?>
			<?php endforeach; ?>
			</b>
			HUF.
			</p>
 		</div>
	</div>

<?php elseif ($this->ion_auth->in_group(['admin-helper'], false, false)) : ?>
	<div class="container border shadow-sm rounded mt-3 bg-white p-2">
	 <p class="text-secondary m-2">	Ön Admin Segéd-ként van bejelentkezve.</p>
	</div>
<?php else : ?>
	<div class="bg-dark container shadow-sm text-white rounded mt-4 p-1">
		<h6 class="my-2 mx-2">Felhasználó segédlet</h6>
	</div>

	<div class="container border shadow-sm rounded mt-3 bg-white p-3">
	 <h6>Hogyan kezdjek neki?</h6>
	 <ol class="list-group">
	 	<li class="text-secondary list-group-item">
			1. Amikor eldöntötted, hogy előadást fogsz tartani egy intézménynél, ellenőrzid le, hogy az intézmény már benne van-e az adatbázisban!
		</li>
		<li class="list-group-item text-secondary ms-5">
			1.1 Amennyiben nincs, kis kutatómunkát kell végezned, összegyűjteni az intézmény adatait, és hozzáadni az intézmények listánál.
		</li>
		<li class="list-group-item text-secondary ms-5">
			1.2 Ha az általad kiválasztott intézményt már felvitte valaki, akkor hozzáadhatod az előadásodat!
		</li>
		<li class="text-secondary list-group-item border">
			2. Az <a href="/institution/list">előadások</a> pont alatt, add meg az előadás nevét, dátumát, állapotát, és válaszd ki a legördülű listából, hogy melyik intézménybe fogsz menni!
		</li>
		<li class="text-secondary list-group-item ">
			3. Ha felvitted az előadást, még nem vagy kész. Menj az előadás nevénél az <h5 class="fas fa-info-circle text-info"></h5> ikonra, és rendeld hozzá az előadáshoz a tagokat akik részt fognak venni rajta!
			Ezt nem csak az előadásnál, de egy Tag részletes adatainál is megteheted!
		</li>
		<li class="list-group-item text-secondary ms-5">
			3.1 Ha valamilyen oknál fogja nincs a neved a <a href="/member/list">Tag</a> listában, keress fel egy Adminisztrátort, vagy Adminisztrátor segédet!
		</li>
		<li class="text-secondary list-group-item border">
			4. Ha változott az előadásod állapota (Teljesítetted, vagy visszaszóltak hogy nem mehetsz stb.) akkor az előadás <h5 class="fas fa-edit text-info"></h5> (szerkesztés) ikonjára kattintva, módosítsd az előadás állapotát.
		</li>
	 </ol>
	</div>
<?php endif; ?>
<?php else : ?>
	<div class="container border shadow-sm rounded mt-3 bg-white p-2">
		<p class="text-secondary m-2">
			Amennyiben rendelkezik hozzáféréssel, kérem a bejelentkezés gombra kattintás után adja meg a bejelentkezési adatait.
		</p>
	</div>
<?php endif; ?>


</body>
</html>
