<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<div class="container p-3 bg-white">

<div class="row">
  <div class="col-lg-4 mb-3">
    <div class="card  shadow-sm">
      <img class="card-img-top" src="/public/images/presentation.png" alt="Card image">
      <div class="card-body">
        <h4 class="card-title text-center"><?=$record->nev?></h4>
        <ul class="list-group">
          <li class="list-group-item"> Megnevezés : <?=$record->nev?></li>
          <li class="list-group-item"> Időpont : <?=$record->idopont?>  </li>
          <li class="list-group-item"> Állapot :
            <?php if($record->allapot == 0) : ?>
              Eggyeztetett
            <?php elseif($record->allapot == 1) : ?>
              Még nem eggyeztetett
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


  </div>
  <!-- TODO hozzáadás implementálása -->
  <div class="col-lg-8  p-3 border bg-white shadow-sm rounded mb-3">
    <h5>Kapcsolodó tagok</h5>
    <ul class="list-group mt-3 mb-4">
    <?php foreach ($has_members as $member): ?>
      <li class="list-group-item p-2"> <?php echo $member->tag_nev ?>
        <?php echo anchor(base_url('presentation/delete_member/'.$member->tag.'/'.$record->id), '<h5 class="fas fa-trash text-info float-end m-1"></h5>'); ?>
      </li>
    <?php endforeach ?>
    </ul>

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
