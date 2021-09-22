<?php $this->load->view('common/bootstrap'); ?>

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"><?=$title?></h6>
</div>

<body class="bg-light">


<div class="container border shadow-smt bg-white">
<?php if($records == null || empty($records)): ?>
    <p class="m-3"> Nincs rögzítve eggyetlen megye sem. </p>
<?php else: ?>
    <ul class="list-group" id="db_result">
        <?php foreach ($records as $record): ?>
            <li class="list-group-item">
                <?=$record->nev?>
                <?php echo anchor(base_url('county/delete/'.$record->id), '<h5 class="fas fa-trash"></h5>'); ?>
            </li>
            <?php endforeach; ?>
    </ul>

    <p class="text-right">Lekérdezett rekordok: <?=count($records)?>  db.</p>
<?php endif; ?>

</div>
