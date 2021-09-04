<h1><?=$title?></h1>

<?php if($records == null || empty($reciords)): ?>
    <p> Nincs rögzítve eggyetlen intézmény sem. </p>
<?php else: ?>
    <?php foreach ($records as $record): ?>

    <?php endforeach; ?>
<?php endif; ?>
