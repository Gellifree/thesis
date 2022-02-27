<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<title><?=$title?></title>


<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"> <?=$title?> </h6>
</div>
<div class="container border my-3 p-3 bg-white">
<h6 class="m-2"> <?php echo lang('status_edit_title') ?></h6>

<?php

echo form_open();

echo form_error('nev');
echo form_input(
    ['type' => 'text', 'name' => 'nev'],
    '',
    ['placeholder' => 'Megye neve*', 'class' => 'form-control my-2']
);

echo '<div class="d-grid">';
echo form_button(
    ['type' => 'submit'],
    lang('send'),
    ['class' => 'btn btn-info my-2 ']
);
?>
<div class="d-grid">
  <?php echo anchor(base_url('county/list'), lang('go_back_to_list'), ['class' => 'btn btn-outline-info my-2']); ?>
</div>


</div>
