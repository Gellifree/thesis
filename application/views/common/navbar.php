<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-2">
 <div class="container-fluid">
   <a class="navbar-brand" href="/">Roma Szakkollégium</a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="mynavbar">

     <ul class="navbar-nav me-auto">
       <?php if ($this->ion_auth->logged_in()): ?>
       <li class="nav-item">
         <a class="nav-link" href="/presentation/list">Előadás</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="/member/list">Tagok</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="/institution/list">Intézmény</a>
       </li>
       <?php if ($this->ion_auth->in_group(['admin', 'admin-helper'], false, false)) : ?>
         <li class="nav-item">
           <a class="nav-link" href="/status/list">Státuszok</a>
         </li>
       <?php endif; ?>
       <?php if ($this->ion_auth->in_group(['admin'], false, false)) : ?>
         <li class="nav-item">
           <a class="nav-link" href="/county/list">Megye</a>
         </li>
       <?php endif; ?>
      <?php endif; ?>
     </ul>

     <form class="d-flex" style="margin-bottom: 0">
       <?php if ($this->ion_auth->is_admin()) : ?>
         <?php echo '<a href="/auth" class="btn btn-sm btn-danger  my-2 mx-1">'. 'ADMIN' .'</a>'; ?>
       <?php endif; ?>
       <?php if ($this->ion_auth->logged_in()) : ?>
         <?php echo '<a href="/auth/logout" class="btn btn-sm btn-info my-2 mx-1">'. 'Kijelentkezés' .'</a>'; ?>
       <?php else : ?>
         <?php echo '<a href="/auth/login" class="btn btn-sm btn-info my-2 mx-1">'. 'Bejelentkezés' .'</a>'; ?>
       <?php endif; ?>
     </form>
   </div>
 </div>
</nav>
