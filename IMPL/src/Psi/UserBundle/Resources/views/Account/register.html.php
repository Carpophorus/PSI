<?php $view->extend('PsiUserBundle::layout/base.html.php') ?>

<?php $view['slots']->set('title', 'Register') ?>

<?php echo $view['form']->form($form) ?>