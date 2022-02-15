<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container border shadow-sm rounded bg-white mt-2">

<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>

      <p>
            <?php echo form_input(
                    $first_name,
                    '',
                    ['placeholder' => lang('create_user_fname_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <p>
            <?php echo form_input(
                    $last_name,
                    '',
                    ['placeholder' => lang('create_user_lname_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>

      <p>
            <?php echo form_input(
                    $company,
                    '',
                    ['placeholder' => lang('create_user_company_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <p>
            <?php echo form_input(
                    $email,
                    '',
                    ['placeholder' => lang('create_user_email_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <p>
            <?php echo form_input(
                    $phone,
                    '',
                    ['placeholder' => lang('create_user_phone_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <p>
            <?php echo form_input(
                    $password,
                    '',
                    ['placeholder' => lang('create_user_password_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <p>
            <?php echo form_input(
                    $password_confirm,
                    '',
                    ['placeholder' => lang('create_user_password_confirm_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>


      <p><?php echo form_submit('submit', lang('create_user_submit_btn'));?></p>


      <p>
        <?php echo form_submit(
          'submit',
          lang('create_user_submit_btn'),
          ['class' => 'btn btn-info']
        );
          ?>
      </p>


<?php echo form_close();?>

</div>
