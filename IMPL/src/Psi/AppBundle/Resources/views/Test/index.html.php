<?php $view->extend('PsiAppBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content'); ?>
Test api call by using the following forms:

<fieldset>
    <legend>Get summoner info:</legend>
    <form action="<?php echo $router->generate('test_summoner_action'); ?>" method="get">
        Summoner: <input type="text" name="summoner_name" />
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get summoner masteries:</legend>
    <form action="<?php echo $router->generate('test_masteries_action'); ?>" method="get">
        Summoner Id: <input type="text" name="summoner_id" />
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get summoner runes:</legend>
    <form action="<?php echo $router->generate('test_runes_action'); ?>" method="get">
        Summoner Id: <input type="text" name="summoner_id" />
        <input type="submit" />
    </form>
</fieldset>

<?php $view['UI']->stop() ?>
