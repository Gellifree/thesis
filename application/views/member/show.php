<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<div class="container border p-3 shadow-smt bg-white">

<div class="card" style="width:380px">
  <img class="card-img-top" src="/thesis/public/images/member_rect.png" alt="Member placeholder image">
  <div class="card-body">
    <h4 class="card-title text-center">
      <?=$record->nev?>
    </h4>
    <p class="card-text text-center"><?=$record->statusz_nev?></p>
    <ul class="list-group">
      <li class="list-group-item"> <?=lang('start_of_membership')?>: <?=$record->tagsag_kezdete == NULL ? 'Nincs rögzítve dátum' : $record->tagsag_kezdete?></li>
      <li class="list-group-item"> E-mail: <?=$record->e_mail?> </li>
      <li class="list-group-item"> <?=lang('member_scholarship')?>: <?=$record->osztondij?> Ft. </li>
      <li class="list-group-item"> <?=lang('member_active')?>: <?= $record->aktiv == 1 ? lang('yes') : lang('no') ?> </li>
    </ul>
  </div>
</div>

<?php echo anchor(base_url('member/list'), 'Vissza a listázó nézetre', ['class' => 'btn btn-info my-3']) ?>
</div>
