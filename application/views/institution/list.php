<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<title><?=$title?></title>
<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>




<div class="container border shadow-smt bg-white p-3">
<?php if ($records == null || empty($records)): ?>
    <p class="text-secondary"> Nincs rögzítve eggyetlen intézmény sem. </p>
<?php else: ?>
    <!-- <input class="form-control" id="searchInput" type="text" placeholder="Szűrés a táblázatban.."> -->
    <div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <!-- <th>Azonosító</th> -->
                <th>Megnevezés</th>
                <th>Megye</th>
                <th>Telefonszám</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody id="db_result">
            <?php foreach ($records as $record): ?>
                <tr>
                    <!-- <td> <?=$record->id?> </td> -->
                    <td> <?=$record->nev?> </td>
                    <td> <?=$record->megye_nev?> </td>
                    <td>  <?=($record->telefon == null ? '<span class="text-secondary"> Nincs rögzítve. </span>' : $record->telefon)?> </td>
                    <td class="text-center" style="width: 85px">
                        <?php echo anchor(base_url('institution/list/'.$record->id), '<h5 class="fas fa-info-circle text-info "></h5>'); ?>
                        <?php echo anchor(base_url('institution/update/'.$record->id), '<h5 class="fas fa-edit text-info"></h5>'); ?>

                        <?php if ($this->ion_auth->in_group(['admin'], false, false)) : ?>
                          <?php echo anchor(base_url('institution/delete/'.$record->id), '<h5 class="fas fa-trash text-info "></h5>'); ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <p class="text-end text-secondary">Lekérdezett rekordok: <?=count($records)?>  db.</p>

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
  -->


<?php endif; ?>
<div class="d-grid">
  <?php echo anchor(base_url('institution/insert'), lang('add'), ['class' => 'btn btn-info']); ?>
</div>

</div>
