<?php $view->extend('PsiAppBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content'); ?>
<pre><?php print_r($response->getData()); ?></pre>
<?php $view['UI']->stop(); ?>