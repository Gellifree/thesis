<?php $this->load->view('common/bootstrap'); ?>
<?php $this->load->view('common/navbar'); ?>

<div class="container border shadow-sm rounded bg-white mt-4">


<h1><?php echo lang('deactivate_heading');?></h1>
<p><?php echo sprintf(lang('deactivate_subheading'), $user->{$identity}); ?></p>

<?php echo form_open("auth/deactivate/".$user->id);?>

  <p>
  	<?php echo lang('deactivate_confirm_y_label', 'confirm');?>
    <input type="radio" name="confirm" value="yes" checked="checked" />
    <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
    <input type="radio" name="confirm" value="no" />
  </p>

  <?php echo form_hidden($csrf); ?>
  <?php echo form_hidden(['id' => $user->id]); ?>

  <p>
    <?php echo form_submit(
      'submit',
      lang('deactivate_submit_btn'),
      ['class' => 'btn btn-info']
    );
      ?>
  </p>

<?php echo form_close();?>

</div>
