<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<title><?=$title?></title>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<div class="container p-3 ">

<div class="row">
  <div class="col-lg-3 mb-3 p-0">
    <div class="card shadow-sm ">
      <img class="card-img-top" src="/public/images/presentation.png" alt="Card image">
      <div class="card-body">
        <h4 class="card-title text-center"><?=$record->nev?></h4>
        <ul class="list-group">

          <?php
            $date_now = new DateTime();
            $presentation_date = new DateTime($record->idopont);
          ?>

          <?php if ($presentation_date < $date_now) : ?>
            <?php if($record->allapot == "2") : ?>
              <li class="list-group-item text-secondary"> Időpont : <?=$record->idopont?> <h5 class="fas fa-check-square text-success float-end mt-1"></h5> </li>

            <?php else :?>
              <li class="list-group-item text-secondary"> Időpont : <?=$record->idopont?> <h5 title="Az előadás időpontja már lejárt!" data-bs-toggle="tooltip"  class="fas fa-exclamation-triangle text-danger float-end mt-1"></h5> </li>

              <script>
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                  return new bootstrap.Tooltip(tooltipTriggerEl)
                })
              </script>
            <?php endif ?>
          <?php else : ?>
            <li class="list-group-item"> Időpont : <?=$record->idopont?>  </li>
          <?php endif ?>




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
        <div class="d-grid">
          <?php echo anchor(base_url('presentation/update/'.$record->id), 'Előadás szerkesztése', ['class' => 'btn btn-info my-3']) ?>
        </div>
      </div>
    </div>


  </div>
  <!-- TODO hozzáadás implementálása -->
  <div class="col-lg-9  p-3 border bg-white shadow-sm rounded mb-3">
    <h5>Kapcsolodó tagok</h5>
    <?php echo form_error('tagok'); ?>

    <?php if ($has_members == null || empty($has_members)): ?>
        <p class="text-secondary"> Nincs eggyetlen Tag sem hozzárendelve ehhez az előadáshoz. </p>
    <?php else: ?>


    <ul class="list-group mt-3 mb-4">
    <?php foreach ($has_members as $member): ?>
      <li class="list-group-item p-2">
        <?php echo anchor(base_url('member/list/'.$member->tag_id), $member->tag_nev) ?>
        <?php if($record->allapot == 0 or $record->allapot == 1) : ?>
          <?php echo '<h5 data-bs-toggle="modal" data-bs-target="#rec' . $member->tag . '" class="fas fa-trash text-info float-end m-1"></h5>'; ?>
        <?php endif ?>
      </li>
    <?php endforeach ?>
    </ul>
    <?php endif; ?>

    <?php foreach ($has_members as $member): ?>
      <div class="modal fade" id="<?='rec' . $member->tag?>">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tag hozzárendelésének eltávolítása</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <p class="text-secondary">Biztos hogy törölni akarja <em><?=$member->tag_nev?></em> hozzárendelését? (<?=$record->nev?>)</p>
              <button type="button" class="btn btn-info" data-bs-dismiss="modal">Mégsem</button>
              <?php echo anchor(base_url('presentation/delete_member/'.$member->tag.'/'.$record->id), '<button class="btn btn-danger float-end">Törlés</button>'); ?>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>



    <?php if($record->allapot == 0 or $record->allapot == 1) : ?>


    <div class="alert alert-info">
      <strong>Figyelem!</strong> Amint az előadás állapota, Sikeresre, vagy Sikertelenre lett állítva nincs lehetőség a taglista változtatásán!
    </div>

    <?php

    echo form_open();
    echo form_dropdown(
        ['name' => 'tagok', 'class' => 'form-select'],
        $members
    );


    echo '<div class="d-grid">';
    echo form_button(
        ['type' => 'submit'],
        'Tag hozzárendelése',
        ['class' => 'btn btn-info my-3']
    );
    echo '</div>';

    echo form_close();
    ?>
  <?php endif ?>

    <div class="d-grid">
      <?php echo anchor(base_url('presentation/list'), 'Vissza a listázó nézetre', ['class' => 'btn btn-outline-info float-end shadow-sm']) ?>
    </div>

  </div>

</div>
</div>
