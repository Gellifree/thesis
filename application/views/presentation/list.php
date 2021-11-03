<?php $this->load->view('common/bootstrap'); ?>
<body class="bg-light">

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>


<div class="container border shadow-smt bg-white p-3">
<?php if($records == null || empty($records)): ?>
    <p class="m-3"> Nincs rögzítve eggyetlen előadás sem. </p>
<?php else: ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th>Azonosító</th> -->
                <th> Előadás neve </th>
                <th class="text-right"> <?php echo lang('operations'); ?> </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <!-- <td> <?=$record->id?> </td> -->
                    <td> <?=$record->nev?> </td>
                    <td class="text-right">
                      <?php echo anchor(base_url('presentation/list/'.$record->id), '<h5 class="fas fa-info-circle text-info"></h5>'); ?>
                      <?php echo anchor(base_url('presentation/delete/'.$record->id), '<h5 class="fas fa-trash text-info"></h5>'); ?>
                      <?php echo anchor(base_url('presentation/update/'.$record->id), '<h5 class="fas fa-edit text-info"></h5>'); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="text-right"> <?php echo lang('quantity'); ?> <?=count($records)?>  <?php echo lang('quantity_measure'); ?></p>

<?php endif; ?>
    <?php echo anchor(base_url('presentation/insert'), lang('add'), ['class' => 'btn btn-info']); ?>

</div>
