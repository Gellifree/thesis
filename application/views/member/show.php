<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<title><?=$title?></title>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<div class="container p-3">

<div class="row">
  <div class="col-lg-3 mb-3">
    <div class="card">
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
  <div class="col-lg-9  p-3 border bg-white shadow-sm rounded mb-3">
    <h5>Kapcsolodó előadások</h5>
    <?php echo form_error('eloadasok'); ?>





    <?php if ($has_presentations == null || empty($has_presentations)): ?>
        <p class="text-secondary"> Nincs eggyetlen Előadás sem hozzárendelve ehhez az Taghoz. </p>
    <?php else: ?>

    <ul class="list-group mt-3 mb-4">
    <?php foreach ($has_presentations as $presentation): ?>
      <li class="list-group-item p-2">
        <?php echo anchor(base_url('presentation/list/'. $presentation->eloadas_id), $presentation->eloadas_nev)  ?>
        <?php echo anchor(base_url('member/delete_presentation/'.$presentation->eloadas.'/'.$record->id), '<h5 class="fas fa-trash text-info float-end m-1"></h5>'); ?>
      </li>

    <?php endforeach ?>
    </ul>
    <?php endif; ?>


    <?php

    echo form_open();
    echo form_dropdown(
      ['name' => 'eloadasok', 'class' => 'form-select'],
      $presentations
    );

    echo '<div class="d-grid">';
    echo form_button(
      ['type' => 'submit'],
      'Előadás hozzárendelése',
      ['class' => 'btn btn-info my-3']
    );
    echo '</div>';

    echo form_close();

    ?>
    <div class="d-grid">
      <?php echo anchor(base_url('member/list'), 'Vissza a listázó nézetre', ['class' => 'btn btn-outline-info shadow-sm']) ?>
    </div>

  </div>

</div>
</div>
