<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container border shadow-sm rounded bg-white mt-4">


<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
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
        );
          ?>
      </p>


<?php echo form_close();?>

</div>
