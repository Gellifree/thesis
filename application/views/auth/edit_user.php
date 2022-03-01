<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>
<body class="bg-light">
<div class="container border shadow-sm rounded bg-white mt-4 p-3">


<h1><?php echo lang('edit_user_heading');?></h1>
<p class="text-secondary"><?php echo lang('edit_user_subheading');?></p>

<div class="text-secondary" id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(uri_string());?>

      <p>
            <?php echo form_input(
    $first_name,
    '',
    ['placeholder' => lang('edit_user_fname_label'), 'class' => 'form-control my-2']
); ?>
      </p>

      <p>
            <?php echo form_input(
                $last_name,
                '',
                ['placeholder' => lang('edit_user_lname_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <p>
            <?php echo form_input(
                $company,
                '',
                ['placeholder' => lang('edit_user_company_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <p>
            <?php echo form_input(
                $phone,
                '',
                ['placeholder' => lang('edit_user_phone_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <p>
            <?php echo form_input(
                $password,
                '',
                ['placeholder' => lang('edit_user_password_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <p>
            <?php echo form_input(
                $password_confirm,
                '',
                ['placeholder' => lang('edit_user_password_confirm_label'), 'class' => 'form-control my-2']
            ); ?>
      </p>

      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
              <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>

      <p>
        <?php echo form_submit(
                'submit',
                lang('edit_user_submit_btn'),
                ['class' => 'btn btn-info my-2']
            );
          ?>
      </p>


<?php echo form_close();?>

</div>
