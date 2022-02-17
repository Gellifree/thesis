<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<body class="bg-light">
  <div class="container border shadow-smt bg-white p-3">
    <?php if ($records == null || empty($records)): ?>
      <p class="m-3"> Nincs rögzítve eggyetlen megye sem. </p>
    <?php else: ?>
  <table class="table table-bordered">
    <thead>
        <tr>
            <th> Megye </th>
            <th class="text-right"> <?php echo lang('operations'); ?> </th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($records as $record): ?>
            <tr>
                <td> <?=$record->nev?> </td>
                <td class="text-center" style="width: 85px">
                  <?php echo anchor(base_url('county/delete/'.$record->id), '<h5 class="fas fa-trash text-info"></h5>'); ?>
              </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>


    <p class="text-end text-secondary"> <?php echo lang('quantity') ?> <?=count($records)?>  <?php echo lang('quantity_measure') ?></p>
<?php endif; ?>

<?php echo anchor(base_url('county/insert'), lang('add'), ['class' => 'btn btn-info']); ?>


</div>
