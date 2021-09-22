<?php $this->load->view('common/bootstrap'); ?>
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
                <th>Megnevezés</th>
                <th class="text-right">Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <!-- <td> <?=$record->id?> </td> -->
                    <td> <?=$record->nev?> </td>
                    <td class="text-right">
                        <?php echo anchor(base_url('status/delete/'.$record->id), '<h4 class="fas fa-trash"></h4>'); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p class="text-right">Lekérdezett rekordok: <?=count($records)?>  db.</p>
<?php endif; ?>

</div>
