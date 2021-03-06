<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<title><?=$title?></title>


<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>


<div class="container border shadow-smt bg-white p-3">
<?php if ($records == null || empty($records)): ?>
    <p class="text-secondary"> <?php echo lang('no_presentations'); ?> </p>
<?php else: ?>
    <table class="table table-bordered table-responsive table-hover" id="presentation_table">
        <thead>
            <tr>
                <!-- <th>Azonosító</th> -->
                <th> <?php echo lang('presentation_name') ?> </th>
                <th class="text-center"> <?php echo lang('presentation_state') ?> </th>
                <th class="text-center"> <?php echo lang('operations'); ?> </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <!-- <td> <?=$record->id?> </td> -->

                    <?php
                      $date_now = new DateTime();
                      $presentation_date = new DateTime($record->idopont);
                    ?>

                    <?php if ($presentation_date < $date_now) : ?>
                      <?php if($record->allapot == "2") : ?>
                        <td class=" text-secondary"> <?=$record->nev?>  <h5 class="fas fa-check-square text-success float-end mt-1"></h5> </td>

                      <?php else :?>
                        <?php if($record->allapot == "3") : ?>
                          <td class=" text-secondary"> <?=$record->nev?> </td>
                        <?php else: ?>
                        <td class=" text-secondary"> <?=$record->nev?> <h5 title="<?php echo lang('presentation_date_expired'); ?>" data-bs-toggle="tooltip"  class="fas fa-exclamation-triangle text-danger float-end mt-1"></h5> </td>

                        <script>
                          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                          var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                            return new bootstrap.Tooltip(tooltipTriggerEl)
                          })
                        </script>
                        <?php endif ?>
                      <?php endif ?>
                    <?php else : ?>
                      <?php if(($presentation_date > $date_now) and ($record->allapot == "2")) : ?>
                        <td class="text-dark"> <?=$record->nev?> <h5 title="<?php echo lang('marked_too_soon'); ?>" data-bs-toggle="tooltip" class="fas fa-question-circle float-end text-warning"></h5></td>
                        <script>
                          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                          var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                            return new bootstrap.Tooltip(tooltipTriggerEl)
                          })
                        </script>
                      <?php else: ?>
                        <td class=""> <?=$record->nev?> </td>
                      <?php endif?>
                    <?php endif ?>



                    <td class="text-center " style="width: 200px">
                      <?php if ($record->allapot == 0) : ?>
                        <span class="text-info"><?php echo lang('presentation_agreed'); ?></span>
                      <?php elseif ($record->allapot == 1) : ?>
                        <span class="text-warning"><?php echo lang('presentation_not_yet_aggreed'); ?></span>
                      <?php elseif ($record->allapot == 2) : ?>
                        <span class="text-success"><?php echo lang('presentation_successful'); ?></span>
                      <?php else : ?>
                        <span class="text-danger"><?php echo lang('presentation_unsuccessful'); ?></span>
                      <?php endif; ?>
                    </td>
                    <td class="text-center" style="width: 85px">
                      <?php echo anchor(base_url('presentation/list/'.$record->id), '<h5 class="fas fa-info-circle text-info"></h5>'); ?>
                      <?php echo anchor(base_url('presentation/update/'.$record->id), '<h5 class="fas fa-edit text-info"></h5>'); ?>
                      <?php echo '<h5 data-bs-toggle="modal" data-bs-target="#rec' . $record->id . '" class="fas fa-trash text-info"></h5>'; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script type="text/javascript">
    $('#presentation_table').DataTable( {
        paging: false,
        ordering: true,
        searching: false,
        info: false,
        columnDefs: [
            { orderable: false, targets: 2 }
        ],
    } );
    </script>


    <?php foreach ($records as $record): ?>
      <div class="modal fade" id="<?='rec' . $record->id?>">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title"> <?php echo lang('delete_presentation_title'); ?> </h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <p class="text-secondary"> <?php echo lang('delete_confirm_message'); ?> <em>(<?=$record->nev?>)</em>?</p>
              <button type="button" class="btn btn-info" data-bs-dismiss="modal"> <?php echo lang('no'); ?> </button>
              <?php echo anchor(base_url('presentation/delete/'.$record->id), '<button class="btn btn-danger float-end">'. lang('yes') .'</button>'); ?>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>


    <p class="text-end text-secondary"> <?php echo lang('quantity'); ?> <?=count($records)?>  <?php echo lang('quantity_measure'); ?></p>

<?php endif; ?>


<div class="d-grid">
  <?php echo anchor(base_url('presentation/insert'), lang('add_presentation'), ['class' => 'btn btn-info']); ?>
</div>

</div>
