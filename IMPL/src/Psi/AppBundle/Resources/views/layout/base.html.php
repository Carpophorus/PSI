<?php $view->extend('PsiAppBundle:layout:default.html.php') ?>

<?php $view['UI']->start('_styles'); ?>
<link href="<?php echo $view['assets']->getUrl('css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $view['assets']->getUrl('css/app.css') ?>" rel="stylesheet" type="text/css" />
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_scripts'); ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo $view['assets']->getUrl('js/app.js') ?>"></script>
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_header') ?>
<?php echo $view->render('PsiAppBundle:layout:header.html.php', []) ?>
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_footer') ?>
<?php echo $view->render('PsiAppBundle:layout:footer.html.php', []) ?>
<?php $view['UI']->stop() ?>

<?php $view['UI']->start('_footer_scripts') ?>
<?php echo $view->render('PsiUIBundle:component:loader/js.html.php', []) ?>
<script type="text/javascript">
    var cleanMessages = function () {
        $(".messages").fadeOut(250).queue(function (nxt) {
            $(this).remove();
            nxt();
        });
    };

    $(document).ready(function () {
        $(".messages").each(function(index, elem) {
            setTimeout(function () {
                $(elem).fadeOut(250).queue(function (nxt) {
                    $(this).remove();
                    nxt();
                });
            }, 6000);
        });
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).ajaxComplete(function () {
        $(".messages").each(function(index, elem) {
            setTimeout(function () {
                $(elem).fadeOut(250).queue(function (nxt) {
                    $(this).remove();
                    nxt();
                });
            }, 6000);
        });
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<?php $view['UI']->stop() ?>