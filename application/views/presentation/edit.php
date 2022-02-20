<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<title><?=$title?></title>


<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"> <?=$title?> </h6>
</div>
<div class="container border my-3 p-3 bg-white">
<?php

echo form_open();

echo form_error('nev');
echo form_input(
    ['type' => 'text', 'name' => 'nev'],
    $record->nev,
    ['placeholder' => 'Megnevezés', 'class' => 'form-control my-2']
);

echo form_error('idopont');
echo form_input(
    ['type' => 'date', 'name' => 'idopont'],
    $record->idopont,
    ['class' => 'form-control my-2']
);

echo form_error('allapot');
echo form_dropdown(
    ['name' => 'allapot', 'class' => 'form-select my-2'],
    $reconciled,
    [ $record->allapot ]
);


echo form_error('iskola');
echo form_dropdown(
    ['name' => 'iskola', 'class' => 'form-select'],
    $institutions,
    [ $record->iskola ]
);

echo '<div class="d-grid">';
echo form_button(
    ['type' => 'submit'],
    lang('send'),
    ['class' => 'btn btn-info my-3']
);
echo '</div>';


echo form_close();
?>
<div class="d-grid">
<?php echo anchor(base_url('presentation/list'), lang('go_back_to_list'), ['class' => 'btn btn-outline-info ']); ?>
</div>




</div>
