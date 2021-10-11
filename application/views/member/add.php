<?php $this->load->view('common/bootstrap'); ?>

<body class="bg-light">

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"> <?=$title?> </h6>
</div>

<div class="container border my-3 p-3 bg-white">

<?php echo form_open(); ?>

<?php

echo form_error('nev');

echo form_input(
  ['type' => 'text', 'name' => 'nev'],
  set_value('nev', ''),
  ['placeholder' => 'Tag neve', 'class' => 'form-control m-1']
);


echo form_error('osztondij');
echo form_input(
  ['type' => 'number', 'name' => 'osztondij'],
  set_value('osztondij', ''),
  ['placeholder' => 'Ösztöndíj', 'class' => 'form-control m-1']
);


echo form_error('email');
echo form_input(
  ['type' => 'email', 'name' => 'email'],
  set_value('email', ''),
  ['placeholder' => 'E-mail', 'class' => 'form-control m-1']
);


echo form_error('tagsag_kezdete');
echo form_input(
  ['type' => 'date', 'name' => 'tagsag_kezdete'],
  set_value('tagsag_kezdete', ''),
  ['class' => 'form-control m-1']
);

echo form_error('status_id');
echo form_dropdown(
  ['name' => 'status_id', 'class' => 'btn btn-info m-1'],
  $statuses
);


echo form_error('aktiv');
echo form_dropdown(
  ['name' => 'aktiv', 'class' => 'btn btn-info m-1'],
  $aktiv
);
echo '<br>';
echo form_button(
  ['type' => 'submit'],
  'Küldés',
  ['class' => 'btn btn-info m-1']
);

?>

<?php echo form_close(); ?>

</div>
