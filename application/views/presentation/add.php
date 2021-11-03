<?php $this->load->view('common/bootstrap'); ?>

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
        '',
        ['placeholder' => 'Megnevezés', 'class' => 'form-control my-2']
);

echo form_error('idopont');
echo form_input(
        ['type' => 'date', 'name' => 'idopont'],
        '',
        ['class' => 'form-control my-2']
);

echo form_error('egyeztetett');
echo form_dropdown(
  ['name' => 'egyeztetett', 'class' => 'btn btn-info m-1'],
  $reconciled
);


echo form_error('iskola');
echo form_dropdown(
  ['name' => 'iskola', 'class' => 'btn btn-info m-1'],
  $institutions
);

echo form_button(
  ['type' => 'submit'],
  lang('send'),
  ['class' => 'btn btn-warning m-1 float-right']
);


echo form_close();
?>

<?php echo anchor(base_url('presentation/list'), lang('go_back_to_list'), ['class' => 'btn btn-outline-info m-1']); ?>


</div>
