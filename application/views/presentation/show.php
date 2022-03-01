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
              <li class="list-group-item text-secondary"> <?php echo lang('date_of_the_presentation'); ?> : <?=$record->idopont?> <h5 class="fas fa-check-square text-success float-end mt-1"></h5> </li>

            <?php else :?>
              <li class="list-group-item text-secondary"> <?php echo lang('date_of_the_presentation'); ?> : <?=$record->idopont?> <h5 title="Az előadás időpontja már lejárt!" data-bs-toggle="tooltip"  class="fas fa-exclamation-triangle text-danger float-end mt-1"></h5> </li>

              <script>
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                  return new bootstrap.Tooltip(tooltipTriggerEl)
                })
              </script>
            <?php endif ?>
          <?php else : ?>
            <li class="list-group-item"><?php echo lang('date_of_the_presentation'); ?> : <?=$record->idopont?>  </li>
          <?php endif ?>




          <li class="list-group-item"> <?php echo lang('presentation_state'); ?> :
            <?php if ($record->allapot == 0) : ?>
              <span class="text-info"> <?php echo lang('presentation_agreed'); ?></span>
            <?php elseif ($record->allapot == 1) : ?>
              <span class="text-warning"> <?php echo lang('presentation_not_yet_aggreed'); ?></span>
            <?php elseif ($record->allapot == 2) : ?>
              <span class="text-success"> <?php echo lang('presentation_successful'); ?></span>
            <?php else : ?>
              <span class="text-danger"> <?php echo lang('presentation_unsuccessful'); ?></span>
            <?php endif; ?>
          </li>
          <li class="list-group-item"> <?php echo lang('presentation_institute'); ?> : <?php echo anchor(base_url('institution/list/'.$record->intezmeny_id), $record->intezmeny_nev) ?>   </li>
        </ul>
        <div class="d-grid">
          <?php echo anchor(base_url('presentation/update/'.$record->id), lang('edit_presentation'), ['class' => 'btn btn-info my-3']) ?>
        </div>
      </div>
    </div>


  </div>
  <!-- TODO hozzáadás implementálása -->
  <div class="col-lg-9  p-3 border bg-white shadow-sm rounded mb-3">
    <h5> <?php echo lang('related_members'); ?> </h5>
    <?php echo form_error('tagok'); ?>

    <?php if ($has_members == null || empty($has_members)): ?>
        <p class="text-secondary"> <?php echo lang('no_members_assigned'); ?> </p>
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
              <h4 class="modal-title"> <?php echo lang('unassign_member'); ?> </h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <p class="text-secondary"> <?php echo lang('delete_member_from_pres'); ?> <em><?=$member->tag_nev?></em> (<?=$record->nev?>)</p>
              <button type="button" class="btn btn-info" data-bs-dismiss="modal"><?php echo lang('no'); ?></button>
              <?php echo anchor(base_url('presentation/delete_member/'.$member->tag.'/'.$record->id), '<button class="btn btn-danger float-end">'. lang('yes') .'</button>'); ?>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>



    <?php if($record->allapot == 0 or $record->allapot == 1) : ?>


    <div class="alert alert-info">
      <?php echo lang('attention_state_change'); ?>
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
        lang('assign_member'),
        ['class' => 'btn btn-info my-3']
    );
    echo '</div>';

    echo form_close();
    ?>
  <?php endif ?>

    <div class="d-grid">
      <?php echo anchor(base_url('presentation/list'), lang('go_back_to_list'), ['class' => 'btn btn-outline-info float-end shadow-sm']) ?>
    </div>

  </div>

</div>
</div>
