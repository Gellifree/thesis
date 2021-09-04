<?php $this->load->view('common/bootstrap'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<div class="container border p-3 shadow-smt bg-white">

<h2>ID</h2>
<p><?=$record->id?></p>

<h2>Megnevezés</h2>
<p><?=$record->megnevezes?></p>

<h2>Megye</h2>
<p><?=$record->megye?></p>

<h2>Cím</h2>
<p><?=$record->cím?></p>

<h2>Igazgató neve</h2>
<p><?=$record->igazgató_neve?></p>

<h2>Email</h2>
<p><?=$record->e_mail?></p>

<h2>Telefonszám</h2>
<p><?=$record->telefon?></p>

<h2>Weboldal</h2>
<p><?=($record->weboldal == NULL ? 'Nincs elérhető weboldal az adatbázisban.' : $record->weboldal)?></p>

<h2>Aktív</h2>
<p><?=($record->aktiv == 1 ? 'Aktív intézmény' : 'Inaktív intézmény' )?></p>

<?php echo anchor(base_url('institution/list'), 'Vissza a listázó nézetre') ?>

</div>
