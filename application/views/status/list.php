<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<body class="bg-light">

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>


<div class="container border shadow-smt bg-white p-3">
<?php if($records == null || empty($records)): ?>
    <p class="m-3"> Nincs rögzítve eggyetlen státusz sem. </p>
<?php else: ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th>Azonosító</th> -->
                <th><?php echo lang('status_name'); ?></th>
                <?php if($this->ion_auth->in_group(['admin'], false, false)) : ?>
                  <th class="text-center"> <?php echo lang('operations'); ?> </th>
                <?php endif; ?>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <!-- <td> <?=$record->id?> </td> -->
                    <td> <?=$record->nev?> </td>

                    <?php if($this->ion_auth->in_group(['admin'], false, false)) : ?>
                      <td class="text-center" style="width: 85px">
                          <?php echo anchor(base_url('status/delete/'.$record->id), '<h5 class="fas fa-trash text-info"></h5>'); ?>
                          <?php echo anchor(base_url('status/update/'.$record->id), '<h5 class="fas fa-edit text-info"></h5>'); ?>
                      </td>
                    <?php endif; ?>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="text-end text-secondary"> <?php echo lang('quantity'); ?> <?=count($records)?>  <?php echo lang('quantity_measure'); ?></p>

<?php endif; ?>

<?php if($this->ion_auth->in_group(['admin'], false, false)) : ?>
  <?php echo anchor(base_url('status/insert'), lang('add'), ['class' => 'btn btn-info']); ?>
<?php endif; ?>


</div>
