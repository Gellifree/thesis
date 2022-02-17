<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<body class="bg-light">


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

    <br>
    <table class="table table-bordered">
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
                      <td> <?=$record->osztondij?> HUF </td>
                    <?php endif; ?>

                    <td class="text-center" style="width: 85px">
                        <?php echo anchor(base_url('member/list/'.$record->id), '<h5 class="fas fa-info-circle text-info"></h5>'); ?>
                        <?php if ($this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) : ?>
                          <?php echo anchor(base_url('member/update/'.$record->id), '<h5 class="fas fa-edit text-info"></h5>'); ?>
                          <?php echo anchor(base_url('member/delete/'.$record->id), '<h5 class="fas fa-trash text-info"></h5>'); ?>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="text-end text-secondary"> <?php echo lang('quantity') ?> <?=count($records)?>  <?php echo lang('quantity_measure') ?></p>

    <!--
    <script>
    $(document).ready(function(){
      $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#db_result tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
    // TODO: Fix filtering
    -->


<?php endif; ?>
<?php if ($this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) : ?>
  <?php echo anchor(base_url('member/insert'), lang('add'), ['class' => 'btn btn-info']); ?>
<?php endif; ?>


</div>
