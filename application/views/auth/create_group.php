<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container border shadow-sm rounded bg-white mt-2">
  <h1><?php echo lang('create_group_heading');?></h1>
  <p><?php echo lang('create_group_subheading');?></p>

  <div id="infoMessage"><?php echo $message;?></div>

  <?php echo form_open("auth/create_group");?>

        <p>
              <?php echo form_input(
                      $group_name,
                      '',
                      ['placeholder' => lang('create_group_name_label'), 'class' => 'form-control my-2']
              ); ?>
        </p>

        <p>
              <?php echo form_input(
                      $description,
                      '',
                      ['placeholder' => lang('create_group_desc_label'), 'class' => 'form-control my-2']
              ); ?>
        </p>
        <p>
          <?php echo form_submit(
            'submit',
            lang('create_group_submit_btn'),
            ['class' => 'btn btn-info']
          );
            ?>
        </p>

  <?php echo form_close();?>
</div>
