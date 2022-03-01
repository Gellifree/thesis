<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<title><?=$title?></title>
<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>


  <div class="container border shadow-smt bg-white p-3">
    <?php if ($records == null || empty($records)): ?>
      <p class="text-secondary"> Nincs rögzítve eggyetlen megye sem. </p>
    <?php else: ?>
  <table class="table table-bordered table-hover" id="county_table">
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
                  <?php echo '<h5 data-bs-toggle="modal" data-bs-target="#rec' . $record->id . '" class="fas fa-trash text-info"></h5>'; ?>
              </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>

  <script type="text/javascript">
  $('#county_table').DataTable( {
      paging: false,
      ordering: true,
      searching: false,
      info: false,
      columnDefs: [
          { orderable: false, targets: 1 }
      ],
  } );
  </script>


  <?php foreach ($records as $record): ?>
    <div class="modal fade" id="<?='rec' . $record->id?>">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Megye törlése</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <p class="text-secondary">Biztos hogy törölni akarja a rekordot <em>(<?=$record->nev?>)</em>?</p>
            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Mégsem</button>
            <?php echo anchor(base_url('county/delete/'.$record->id), '<button class="btn btn-danger float-end">Törlés</button>'); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>


    <p class="text-end text-secondary"> <?php echo lang('quantity') ?> <?=count($records)?>  <?php echo lang('quantity_measure') ?></p>
<?php endif; ?>


<div class="d-grid">
<?php echo anchor(base_url('county/insert'), lang('add'), ['class' => 'btn btn-info']); ?>
</div>

</div>
