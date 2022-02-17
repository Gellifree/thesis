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
    set_value('nev', $record->nev),
    ['placeholder' => lang('member_name'), 'class' => 'form-control m-1']
);


echo form_error('osztondij');
echo form_input(
    ['type' => 'number', 'name' => 'osztondij'],
    set_value('osztondij', $record->osztondij),
    ['placeholder' => lang('member_scholarship'), 'class' => 'form-control m-1']
);


echo form_error('email');
echo form_input(
    ['type' => 'email', 'name' => 'email'],
    set_value('email', $record->e_mail),
    ['placeholder' => 'E-mail', 'class' => 'form-control m-1']
);


echo form_error('tagsag_kezdete');
echo form_input(
    ['type' => 'date', 'name' => 'tagsag_kezdete'],
    set_value('tagsag_kezdete', $record->tagsag_kezdete),
    ['class' => 'form-control m-1']
);


echo form_error('status_id');
echo form_dropdown(
    ['name' => 'status_id', 'class' => 'btn btn-info m-1'],
    $statuses,
    [ $record->statusz ]
);


echo form_error('aktiv');
echo form_dropdown(
    ['name' => 'aktiv', 'class' => 'btn btn-info m-1'],
    $aktiv,
    [ $record->aktiv ]
);

echo form_button(
    ['type' => 'submit'],
    lang('send'),
    ['class' => 'btn btn-warning my-1 float-end']
);

echo form_close(); ?>
<div class="d-grid">
<?php echo anchor(base_url('member/list'), lang('go_back_to_list'), ['class' => 'btn btn-outline-info m-1']); ?>
</div>




</div>
