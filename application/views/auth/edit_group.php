<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<body class="bg-light">
<div class="container border shadow-sm rounded bg-white mt-4 p-3">


<h1><?php echo lang('edit_group_heading');?></h1>
<p class="text-secondary"><?php echo lang('edit_group_subheading');?></p>

<div class="text-secondary" id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>

      <p>
            <?php echo form_input(
    $group_name,
    '',
    ['placeholder' => lang('edit_group_name_label'), 'class' => 'form-control my-2']
); ?>

      </p>

      <p>
            <?php echo form_input(
                $group_description,
                '',
                ['placeholder' => lang('edit_group_desc_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <?php echo form_submit(
                'submit',
                lang('edit_group_submit_btn'),
                ['class' => 'btn btn-info']
            );
        ?>

<?php echo form_close();?>

</div>
