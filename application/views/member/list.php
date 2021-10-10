<?php $this->load->view('common/bootstrap'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<body class="bg-light">


<div class="container border p-3 shadow-smt bg-white">
<?php if($records == null || empty($records)): ?>
    <p> Nincs rögzítve eggyetlen tag sem. </p>
<?php else: ?>
    <input class="form-control" id="searchInput" type="text" placeholder="Szűrés a táblázatban..">
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th>Azonosító</th> -->
                <th>Név</th>
                <th>Státusz</th>
                <th>Ösztöndíj</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody id="db_result">
            <?php foreach ($records as $record): ?>
                <tr>
                    <!-- <td> <?=$record->id?> </td> -->
                    <td> <?=$record->nev?> </td>
                    <td> <?=$record->statusz_nev?> </td>
                    <td> <?=$record->osztondij?> </td>
                    <td>
                        <?php echo anchor(base_url('member/list/'.$record->id), '<h5 class="fas fa-info-circle text-info"></h5>'); ?>
                        <?php echo anchor(base_url('member/delete/'.$record->id), '<h5 class="fas fa-trash text-info"></h5>'); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="text-right">Lekérdezett rekordok: <?=count($records)?>  db.</p>

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


<?php endif; ?>

</div>
