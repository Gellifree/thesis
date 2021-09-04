<?php $this->load->view('common/bootstrap'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<body class="bg-light">


<div class="container border p-3 shadow-smt bg-white">
<?php if($records == null || empty($records)): ?>
    <p> Nincs rögzítve eggyetlen intézmény sem. </p>
<?php else: ?>
    <input class="form-control" id="searchInput" type="text" placeholder="Szűrés a táblázatban..">
    <br>
    <table class="table table-bordered">
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
                    <td> <?=$record->megnevezes?> </td>
                    <td> <?=$record->megye?> </td>
                    <td> <?=$record->telefon?> </td>
                    <td>
                        <?php echo anchor(base_url('institution/list/'.$record->id), '<h4 class="fas fa-info-circle"></h4>'); ?>
                        <?php echo anchor(base_url('institution/delete/'.$record->id), '<h4 class="fas fa-trash"></h4>'); ?>
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
