<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<title><?=$title?></title>


<div class="container my-2 border shadow-sm text-white bg-dark rounded">
<h6 class="m-2"> <?=$title?> </h6>
</div>
<div class="container border my-3 p-3 bg-white">
<h6><?php echo lang('marked_required'); ?></h6>
<?php

echo form_open();

echo form_error('nev');
echo form_input(
        ['type' => 'text', 'name' => 'nev', 'required' => 'required', 'minlength' => 3],
        '',
        ['placeholder' => lang('presentation_name') . '*', 'class' => 'form-control my-2']
);

echo form_error('idopont');
echo '<label class="form-text mx-2"> '.lang('presentation_planned_date').'* </label>';
echo form_input(
        ['type' => 'date', 'name' => 'idopont', 'required' => 'required'],
        '',
        ['class' => 'form-control my-2']
);

echo form_error('allapot');
echo '<label class="form-text mx-2"> '. lang('presentation_state') .'* </label>';
echo form_dropdown(
  ['name' => 'allapot', 'class' => 'my-2 form-select', 'required' => 'required'],
  $reconciled
);


echo form_error('iskola');
echo '<label class="form-text mx-2"> '.lang('presentation_institute').'* </label>';
echo form_dropdown(
  ['name' => 'iskola', 'class' => 'form-select', 'required' => 'required'],
  $institutions
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
<?php echo anchor(base_url('presentation/list'), lang('go_back_to_list'), ['class' => 'btn btn-outline-info']); ?>
</div>



</div>
