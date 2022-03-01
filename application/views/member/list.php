<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>





<title><?=$title?></title>
<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>




<div class="container border p-3 shadow-smt bg-white">
<?php if ($records == null || empty($records)): ?>
    <p class="text-secondary"> Nincs rögzítve eggyetlen tag sem. </p>
<?php else: ?>

    <?php /*
    echo form_input(
      ['type' => 'text', 'name' => 'nev', 'id' => "searchInput"],
      '',
      ['placeholder' => lang('filter_in_table'), 'class' => 'form-control']
    ); */
    ?>

    <table class="table table-bordered table-hover" id='member_table'>
        <thead>
            <tr>
                <!-- <th>Azonosító</th> -->
                <th> <?php echo lang('member_name') ?> </th>
                <th> <?php echo lang('member_status') ?> </th>
                <?php if ($this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) : ?>
                  <th> <?php echo lang('member_scholarship') ?> </th>
                <?php endif; ?>
                <th> <?php echo lang('operations') ?> </th>
            </tr>
        </thead>
        <tbody id="db_result">
            <?php foreach ($records as $record): ?>
                <tr>
                    <!-- <td> <?=$record->id?> </td> -->
                    <td> <?=$record->nev?> </td>
                    <td> <?=$record->statusz_nev?> </td>

                    <?php if ($this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) : ?>
                      <td> <?=$record->osztondij?> </td>
                    <?php endif; ?>

                    <td class="text-center" style="width: 85px">
                        <?php echo anchor(base_url('member/list/'.$record->id), '<h5 class="fas fa-info-circle text-info"></h5>'); ?>
                        <?php if ($this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) : ?>
                          <?php echo anchor(base_url('member/update/'.$record->id), '<h5 class="fas fa-edit text-info"></h5>'); ?>
                          <?php echo '<h5 data-bs-toggle="modal" data-bs-target="#rec' . $record->id . '" class="fas fa-trash text-info"></h5>'; ?>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
    $('#member_table').DataTable( {
        paging: false,
        ordering: true,
        searching: false,
        info: false,
        columnDefs: [
            { orderable: false, targets: 3 }
        ],
    } );
    </script>

    <?php foreach ($records as $record): ?>
      <div class="modal fade" id="<?='rec' . $record->id?>">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tag törlése</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <p class="text-secondary">Biztos hogy törölni akarja a következő tagot: <em> <?=$record->nev?> </em> ?</p>
              <button type="button" class="btn btn-info" data-bs-dismiss="modal">Mégsem</button>
              <?php echo anchor(base_url('member/delete/'.$record->id), '<button class="btn btn-danger float-end">Törlés</button>'); ?>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>





    <p class="text-end text-secondary"> <?php echo lang('quantity') ?> <?=count($records)?>  <?php echo lang('quantity_measure') ?></p>

<?php endif; ?>
<?php if ($this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) : ?>
  <div class="d-grid">
    <?php echo anchor(base_url('member/insert'), lang('add'), ['class' => 'btn btn-info']); ?>
  </div>
<?php endif; ?>


</div>
