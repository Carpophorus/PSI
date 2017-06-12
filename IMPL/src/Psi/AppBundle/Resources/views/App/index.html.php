<?php $view->extend('PsiAppBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content') ?>

<div class="index-left">
  <a href="search">
    <span></span>
    <div class="index-text">
      SEARCH
    </div>
  </a>
</div>
<div class="index-right">
  <a href="login">
    <span></span>
    <div class="index-text">
      LOGIN
    </div>
  </a>
</div>

<?php $view['UI']->stop() ?>
