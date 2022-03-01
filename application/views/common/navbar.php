<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-2 fixed-top shadow">
 <div class="container-fluid">
   <a class="navbar-brand" href="/">
   <img style="width: 70px;" class="navbar-brand" src="/public/images/ekke_rszk_main.png" alt="Roma Szakkollégium">
   </a>
   <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="mynavbar">

     <ul class="navbar-nav me-auto">
       <?php if ($this->ion_auth->logged_in()): ?>





       <li class="nav-item">
         <a class="nav-link" href="/presentation/list"><?php echo lang('presentation_menu'); ?></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="/member/list"><?php echo lang('member_menu'); ?></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="/institution/list"><?php echo lang('institution_menu'); ?></a>
       </li>
       <?php if ($this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) : ?>
         <li class="nav-item">
           <a class="nav-link" href="/status/list"><?php echo lang('status_menu'); ?></a>
         </li>
       <?php endif; ?>
       <?php if ($this->ion_auth->in_group(['admin'], false, false)) : ?>
         <li class="nav-item">
           <a class="nav-link" href="/county/list"><?php echo lang('county_menu'); ?></a>
         </li>
       <?php endif; ?>
      <?php endif; ?>
     </ul>
     <li class="me-5">
      <span class="text-white me-2"> <?php echo lang('change_lang_to'); ?> </span>
      <?php if($this->session->userdata('site_lang') == "hungarian") :  ?>
       <?php echo anchor(base_url() . 'LangSwitch/switchLanguage/english', 'Angol', ['class' => 'btn btn-info btn-sm'])?>
     <?php else: ?>
       <?php echo anchor(base_url() . 'LangSwitch/switchLanguage/hungarian', 'Hungarian', ['class' => 'btn btn-info btn-sm'])?>
     <?php endif?>
     </li>


     <form class="d-flex" >
       <?php if ($this->ion_auth->is_admin()) : ?>
         <?php echo '<a href="/auth" class="btn btn-sm btn-danger  my-2 mx-1 form-control"">'. 'ADMIN' .'</a>'; ?>
       <?php endif; ?>
       <?php if ($this->ion_auth->logged_in()) : ?>
         <?php echo '<a href="/auth/logout" class="btn btn-sm btn-info my-2 mx-1 form-control">'. lang('logout') .'</a>'; ?>
       <?php else : ?>
         <?php echo '<a href="/auth/login" class="btn btn-sm btn-info my-2 mx-1">'. lang('login') .'</a>'; ?>
       <?php endif; ?>
     </form>
   </div>
 </div>
</nav>
