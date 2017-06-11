<?php
// Nemanja Djokic - 496/2013
// Stefan Erakovic - 3086/2016
?>
<?php $view->extend('PsiAppBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content'); ?>
<pre><?php //print_r($request); ?></pre>
<pre><?php print_r($response->getHeader()); ?></pre>
<pre><?php print_r($response->getData()); ?></pre>
<?php $view['UI']->stop(); ?>