<?php $view->extend('PsiAdminBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content') ?>

<div id="ad-bckgrnd"></div>
<h2>Welcome <?php echo $user->getEmail(); ?></h2>
<div id="ad-menu">
  <div id="ad-sysconfig">
    <a href="#" onclick="AdminUI.loadContent('/impl/web/admin/configuration/')">
      <span></span>
    </a>
    system <br>configuration
  </div>
  <div id="ad-displayusers">
    <a href="#" onclick="AdminUI.loadContent('/impl/web/admin/user/list')">
      <span></span>
    </a>
    display <br>users
  </div>
  <div id="ad-newuser">
    <a href="#" onclick="AdminUI.loadContent('/impl/web/admin/user/new')">
      <span></span>
    </a>
    new <br>user
  </div>
</div>

<?php $view['UI']->stop(); ?>
