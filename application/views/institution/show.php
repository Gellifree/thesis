<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<body class="bg-light">


<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>




<div class="container p-3">

  <div class="row">
    <div class="col-lg-3 mb-3 ">
      <div class="card rounded shadow-sm border">
        <img class="card-img-top" src="/public/images/institution.png" alt="Card image">
        <div class="card-body">
          <h4 class="card-title text-center"><?=$record->nev?></h4>
          <ul class="list-group">
            <li class="list-group-item"> Megye : <?=$record->megye_nev?></li>
            <li class="list-group-item"> Cím : <?=$record->cim?>  </li>
            <li class="list-group-item"> Igazgató neve : <?=$record->igazgato_neve?> </li>
            <li class="list-group-item"> Email : <?=($record->e_mail == NULL ? 'Nincs elérhető email az adatbázisban.' : $record->e_mail)?>  </li>
            <li class="list-group-item"> Telefonszám : <?=($record->telefon == NULL ? 'Nincs elérhető telefonszám az adatbázisban.' : $record->telefon)?></li>
            <li class="list-group-item"> Weboldal : <?=($record->weboldal == NULL ? 'Nincs elérhető weboldal az adatbázisban.' : $record->weboldal)?></li>
            <li class="list-group-item"> Aktív : <?=($record->aktiv == 1 ? 'Aktív intézmény' : 'Inaktív intézmény' )?></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-lg-9 mb-3 bg-white rounded shadow-sm border">
      <!-- TODO: előadások listája  -->
    </div>
    <?php echo anchor(base_url('institution/list'), 'Vissza a listázó nézetre', ['class' => 'btn btn-outline-info mt-3 shadow-sm']) ?>
  </div>

</div>
