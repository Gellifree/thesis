<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<body class="bg-light">
<div class="container border shadow-sm rounded bg-white mt-4 p-3">


<h1><?php echo lang('forgot_password_heading');?></h1>
<p class="text-secondary"><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div class="text-secondary" id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
        <?php echo form_input(
          $identity,
          '',
          ['placeholder' => 'Email', 'class' => 'form-control my-2']
        ); ?>
      </p>

      <p>
        <?php echo form_submit(
          'submit',
          lang('forgot_password_submit_btn'),
          ['class' => 'btn btn-info']
        ); ?>
      </p>


<?php echo form_close();?>

</div>
