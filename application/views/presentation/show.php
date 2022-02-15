<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<div class="container border p-3 shadow-smt bg-white">

  <div class="card" style="width:300px">
    <img class="card-img-top" src="/public/images/presentation.png" alt="Card image">
    <div class="card-body">
      <h4 class="card-title text-center"><?=$record->nev?></h4>
      <ul class="list-group">
        <li class="list-group-item"> Megnevezés : <?=$record->nev?></li>
        <li class="list-group-item"> Időpont : <?=$record->idopont?>  </li>
        <li class="list-group-item"> Állapot :
          <?php if($record->allapot == 0) : ?>
            Még nem eggyeztetett
          <?php elseif($record->allapot == 1) : ?>
            Eggyeztetett
          <?php elseif($record->allapot == 2) : ?>
            Sikeresen teljesített
          <?php else : ?>
            Sikertelen
          <?php endif; ?>


        </li>
        <li class="list-group-item"> Iskola : <?=$record->intezmeny_nev?> </li>
      </ul>
    </div>
  </div>

<?php echo anchor(base_url('presentation/list'), 'Vissza a listázó nézetre') ?>

</div>
