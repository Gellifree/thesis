<nav class="navbar navbar-expand-md bg-dark navbar-dark shadow py-1 sticky-top">
 <!-- Brand -->
 <a class="navbar-brand" href="/thesis">Roma Szakkollégium</a>

 <?php if($this->ion_auth->logged_in()): ?>

 <!-- Toggler/collapsibe Button -->
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
   <span class="navbar-toggler-icon"></span>
 </button>

 <!-- Navbar links -->
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" href="/thesis/presentation/list">Előadás</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="/thesis/member/list"> Tagok </a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="/thesis/institution/list">Intézmény</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="/thesis/county/list">Megye</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="/thesis/status/list">Státuszok</a>
     </li>
   </ul>

   <form class="form-inline ml-auto my-2" >
      <?php echo '<a href="/thesis/auth/logout" class="btn btn-info form-control">'. 'Kijelentkezés' .'</a>'; ?>
   </form>
 <?php else : ?>
   <form class="form-inline ml-auto my-2" >
     <?php echo '<a href="/thesis/auth/login" class="btn btn-info form-control">'. 'Bejelentkezés' .'</a>'; ?>
   </form>
    <?php endif; ?>
 </div>

</nav>
