<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<body class="bg-light">
<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<div class="container p-3 ">

<div class="row">
  <div class="col-lg-3 mb-3">
    <div class="card  shadow-sm">
      <img class="card-img-top" src="/public/images/presentation.png" alt="Card image">
      <div class="card-body">
        <h4 class="card-title text-center"><?=$record->nev?></h4>
        <ul class="list-group">
          <li class="list-group-item"> Megnevezés : <?=$record->nev?></li>

          <?php
            $date_now = new DateTime();
            $presentation_date = new DateTime($record->idopont);
          ?>

          <?php if (($presentation_date > $date_now) or ($record->allapot == "2")) : ?>
            <li class="list-group-item"> Időpont : <?=$record->idopont?> </li>
          <?php else : ?>
            <li class="list-group-item text-secondary"> Időpont : <?=$record->idopont?> <h5 class="fas fa-exclamation-triangle text-danger float-end mt-1"></h5> </li>
          <?php endif; ?>




          <li class="list-group-item"> Állapot :
            <?php if ($record->allapot == 0) : ?>
              <span class="text-info">Egyeztetett</span>
            <?php elseif ($record->allapot == 1) : ?>
              <span class="text-warning">Még nem egyeztetett</span>
            <?php elseif ($record->allapot == 2) : ?>
              <span class="text-success">Sikeresen teljesített</span>
            <?php else : ?>
              <span class="text-danger">Sikertelen</span>
            <?php endif; ?>
          </li>
          <li class="list-group-item"> Iskola : <?php echo anchor(base_url('institution/list/'.$record->intezmeny_id), $record->intezmeny_nev) ?>   </li>
        </ul>
      </div>
    </div>


  </div>
  <!-- TODO hozzáadás implementálása -->
  <div class="col-lg-9  p-3 border bg-white shadow-sm rounded mb-3">
    <h5>Kapcsolodó tagok</h5>

    <?php if ($has_members == null || empty($has_members)): ?>
        <p class="text-secondary"> Nincs eggyetlen Tag sem hozzárendelve ehhez az előadáshoz. </p>
    <?php else: ?>


    <ul class="list-group mt-3 mb-4">
    <?php foreach ($has_members as $member): ?>
      <li class="list-group-item p-2">
        <?php echo anchor(base_url('member/list/'.$member->tag_id), $member->tag_nev) ?>
        <?php echo anchor(base_url('presentation/delete_member/'.$member->tag.'/'.$record->id), '<h5 class="fas fa-trash text-info float-end m-1"></h5>'); ?>
      </li>
    <?php endforeach ?>
    </ul>
    <?php endif; ?>
    <?php

    echo form_open();
    echo form_dropdown(
        ['name' => 'tagok', 'class' => 'btn btn-info m-1'],
        $members
    );

    echo form_button(
        ['type' => 'submit'],
        lang('send'),
        ['class' => 'btn btn-warning m-1 float-end']
    );

    echo form_close();
    ?>

  </div>

  <?php echo anchor(base_url('presentation/list'), 'Vissza a listázó nézetre', ['class' => 'btn btn-outline-info mt-3 shadow-sm']) ?>
</div>
</div>
