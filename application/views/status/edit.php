<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<title><?=lang('status_add_title')?></title>


<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"> <?php echo lang('status_edit_title') ?></h6>
</div>


<div class="container border my-3 p-3 bg-white">
  <h6>A csillaggal jelölt mezők kitöltése kötelező.</h6>
<?php
echo form_open();

echo form_error('status_name');
echo form_input(
    ['type' => 'text', 'name' => 'status_name', 'required' => 'required', 'minlength' => 2],
    set_value('status_name', $record->nev),
    ['placeholder' => lang('status_name') . '*', 'class' => 'form-control']
);

echo '<div class="d-grid">';
echo form_input(
    ['type' => 'submit', 'name' => 'submit_button'],
    lang('modify'),
    ['class' => 'btn btn-info my-3']
);
echo '</div>';

echo form_close();
?>

<div class="d-grid">
<?php echo anchor(base_url('status/list'), lang('go_back_to_list'), ['class' => 'btn btn-outline-info']); ?>
</div>

</div>
