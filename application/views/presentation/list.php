<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<title><?=$title?></title>


<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>


<div class="container border shadow-smt bg-white p-3">
<?php if ($records == null || empty($records)): ?>
    <p class="text-secondary"> Nincs rögzítve eggyetlen előadás sem. </p>
<?php else: ?>
    <table class="table table-bordered table-responsive table-hover">
        <thead>
            <tr>
                <!-- <th>Azonosító</th> -->
                <th> <?php echo lang('presentation_name') ?> </th>
                <th class="text-center"> Állapot </th>
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
                    <?php if ($presentation_date > $date_now) : ?>
                      <td> <?=$record->nev?> </td>
                    <?php else : ?>
                      <td class="text-secondary"> <?=$record->nev?> <span class="float-end">(Időpont lejárt)</span> </td>
                    <?php endif; ?>


                    <td class="text-center " style="width: 200px">
                      <?php if ($record->allapot == 0) : ?>
                        <span class="text-info">Egyeztetett</span>
                      <?php elseif ($record->allapot == 1) : ?>
                        <span class="text-warning">Még nem egyeztetett</span>
                      <?php elseif ($record->allapot == 2) : ?>
                        <span class="text-success">Sikeresen teljesített</span>
                      <?php else : ?>
                        <span class="text-danger">Sikertelen</span>
                      <?php endif; ?>
                    </td>
                    <td class="text-center" style="width: 85px">
                      <?php echo anchor(base_url('presentation/list/'.$record->id), '<h5 class="fas fa-info-circle text-info"></h5>'); ?>
                      <?php echo anchor(base_url('presentation/delete/'.$record->id), '<h5 class="fas fa-trash text-info"></h5>'); ?>
                      <?php echo anchor(base_url('presentation/update/'.$record->id), '<h5 class="fas fa-edit text-info"></h5>'); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="text-end text-secondary"> <?php echo lang('quantity'); ?> <?=count($records)?>  <?php echo lang('quantity_measure'); ?></p>

<?php endif; ?>
    <?php echo anchor(base_url('presentation/insert'), lang('add'), ['class' => 'btn btn-info']); ?>

</div>
