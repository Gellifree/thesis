<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<div class="container border p-3 shadow-smt bg-white">

<h2>ID</h2>
<p><?=$record->id?></p>

<h2>Megnevezés</h2>
<p><?=$record->nev?></p>

<h2>Időpont</h2>
<p><?=$record->idopont?></p>

<h2>Eggyeztetett</h2>
<p><?=($record->egyeztetett == 1 ? 'Eggyeztetett' : 'Még nem eggyeztetett' )?></p>

<h2>Iskola</h2>
<p><?=$record->intezmeny_nev?></p>



<?php echo anchor(base_url('presentation/list'), 'Vissza a listázó nézetre') ?>

</div>
