<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<body class="bg-light">
<div class="container border mt-4 p-3 pl-4 bg-white shadow-sm rounded">
  <h1 class="text-secondary"><?php echo lang('login_heading');?></h1>
  <p class="text-secondary"><?php echo lang('login_subheading');?></p>

  <div id="infoMessage"><?php echo $message;?></div>

  <?php echo form_open("auth/login");?>

    <p>
      <?php echo form_input(
    $identity,
    '',
    ['placeholder' => lang('login_identity_label'), 'class' => 'form-control my-2']
); ?>
    </p>

    <p>
      <?php echo form_input(
          $password,
          '',
          ['placeholder' => lang('login_password_label'), 'class' => 'form-control my-2']
      ); ?>
    </p>

    <!--
    <p>
      <?php echo lang('login_remember_label', 'remember');?>
      <?php echo form_checkbox('remember', '1', false, 'id="remember"');?>
    </p>
  -->

    <p>
    <?php echo form_submit(
          'submit',
          lang('login_submit_btn'),
          ['class' => 'btn btn-info']
      );
      ?>
    </p>

  <?php echo form_close();?>

  <p><a class="" href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>
