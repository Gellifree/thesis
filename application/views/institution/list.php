<h1><?=$title?></h1>
<?php if($records == null || empty($records)): ?>
    <p> Nincs rögzítve eggyetlen intézmény sem. </p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <!-- <th>Azonosító</th> -->
                <th>Megnevezés</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                <!-- <td> <?=$record->id?> </td> -->
                <td> <?=$record->megnevezes?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>Lekérdezett rekordok: <?=count($records)?> </p>

<?php endif; ?>
