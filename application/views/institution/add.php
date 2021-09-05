<?php $this->load->view('common/bootstrap'); ?>

<div class="container border my-3 p-3">

<?php

echo form_open();

echo form_input(
        ['type' => 'text', 'name' => 'institution_name'],
        '',
        ['placeholder' => 'Megnevezés', 'class' => 'form-control']
        // későb folytatjuk az implementálást, újra kell gondolni az adatbázist
);

echo form_close();
?>

</div>
