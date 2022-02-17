<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<div class="container border p-3 shadow-smt bg-white">

<div class="row">
  <div class="col- ">
    <div class="card" style="width:300px">
      <img class="card-img-top" src="/public/images/member_rect.png" alt="Member placeholder image">
      <div class="card-body">
        <h4 class="card-title text-center">
          <?=$record->nev?>
        </h4>
        <p class="card-text text-center"><?=$record->statusz_nev?></p>
        <ul class="list-group">
          <li class="list-group-item"> <?=lang('start_of_membership')?>: <?=$record->tagsag_kezdete == NULL ? 'Nincs rögzítve dátum' : $record->tagsag_kezdete?></li>
          <li class="list-group-item"> E-mail: <?=$record->e_mail?> </li>

          <?php if($this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) : ?>
            <li class="list-group-item"> <?=lang('member_scholarship')?>: <?=$record->osztondij?> Ft. </li>
          <?php endif; ?>

          <li class="list-group-item"> <?=lang('member_active')?>: <?= $record->aktiv == 1 ? lang('yes') : lang('no') ?> </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col  p-3">
    <h5>Kapcsolodó előadások</h5>
    <ul class="list-group mt-3 mb-4">
    <?php foreach ($has_presentations as $presentation): ?>
      <li class="list-group-item"> <?php echo $presentation->eloadas_nev ?>
        <?php echo anchor(base_url('member/delete_presentation/'.$presentation->eloadas.'/'.$record->id), '<h5 class="fas fa-trash text-info float-right"></h5>'); ?>
      </li>

    <?php endforeach ?>
    </ul>
    <?php

    echo form_open();
    echo form_dropdown(
      ['name' => 'eloadasok', 'class' => 'btn btn-info m-1'],
      $presentations
    );

    echo form_button(
      ['type' => 'submit'],
      lang('send'),
      ['class' => 'btn btn-warning m-1 float-right']
    );

    echo form_close();

    ?>


  </div>
</div>



<?php echo anchor(base_url('member/list'), 'Vissza a listázó nézetre', ['class' => 'btn btn-info my-3']) ?>
</div>
