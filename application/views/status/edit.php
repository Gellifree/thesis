<?php $this->load->view('common/bootstrap'); ?>

<body class="bg-light">

<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2">Státusz hozzáadása</h6>
</div>


<div class="container border my-3 p-3 bg-white">

<?php
echo form_open();

echo form_error('status_name');
echo form_input(
        ['type' => 'text', 'name' => 'status_name', 'required' => 'required', 'minlength' => 2],
        set_value('status_name', $record->nev),
        ['placeholder' => 'Státusz Neve', 'class' => 'form-control']
);

echo form_input(
        ['type' => 'submit', 'name' => 'submit_button'],
        'Módosítás',
        ['class' => 'btn btn-info my-3']
);

echo form_close();
?>

<?php echo anchor(base_url('status/list'), 'Visszalépés a listázó nézetbe', ['class' => 'btn btn-info']); ?>


</div>
