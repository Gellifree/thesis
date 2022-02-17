<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<body class="bg-light">

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

echo form_error('cim');
echo form_input(
    ['type' => 'text', 'name' => 'cim'],
    $record->cim,
    ['placeholder' => 'Intézmény címe', 'class' => 'form-control my-2']
);

echo form_error('igazgato_neve');
echo form_input(
    ['type' => 'text', 'name' => 'igazgato_neve'],
    $record->igazgato_neve,
    ['placeholder' => 'Igazgató neve', 'class' => 'form-control my-2']
);

echo form_error('e_mail');
echo form_input(
    ['type' => 'email', 'name' => 'e_mail'],
    $record->e_mail,
    ['placeholder' => 'E-mail', 'class' => 'form-control my-2']
);


echo form_error('telefon');
echo form_input(
    ['type' => 'text', 'name' => 'telefon'],
    $record->telefon,
    ['placeholder' => 'Telefonszám', 'class' => 'form-control my-2']
);

echo form_error('weboldal');
echo form_input(
    ['type' => 'text', 'name' => 'weboldal'],
    $record->weboldal,
    ['placeholder' => 'Weboldal', 'class' => 'form-control my-2']
);

echo form_error('megye');
echo form_dropdown(
    ['name' => 'megye', 'class' => 'btn btn-info m-1'],
    $counties,
    [ $record->megye ]
);

echo form_button(
    ['type' => 'submit'],
    lang('send'),
    ['class' => 'btn btn-warning m-1 float-end']
);


echo form_close();
?>
<div class="d-grid">
<?php echo anchor(base_url('institution/list'), lang('go_back_to_list'), ['class' => 'btn btn-outline-info m-1']); ?>
</div>



</div>
