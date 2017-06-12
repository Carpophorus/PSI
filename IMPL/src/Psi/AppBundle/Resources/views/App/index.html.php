<?php $view->extend('PsiAppBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content') ?>

<div class="index-left">
  <a href="<?php echo $view['router']->path('app_search_action'); ?>">
    <span></span>
    <div class="index-text">
      SEARCH
    </div>
  </a>
</div>
<div class="index-right">
  <a href="<?php echo $view['router']->path('user_login_action'); ?>">
    <span></span>
    <div class="index-text">
      LOGIN
    </div>
  </a>
</div>

<?php $view['UI']->stop() ?>
