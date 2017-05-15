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
    <legend>Get a champion mastery by SummonerID and ChampionID :</legend>
    <form action="<?php echo $router->generate('test_championmastery_action'); ?>" method="get">
        Summoner Id: <input type="text" name="summoner_id" />
        Champion Id: <input type="text" name="champion_id" />
        <input type="submit" />
    </form>
</fieldset>
<fieldset>
    <legend>Get a player's total champion mastery score :</legend>
    <form action="<?php echo $router->generate('test_championmasteryscore_action'); ?>" method="get">
        Summoner Id: <input type="text" name="summoner_id" />
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get match:</legend>
    <form action="<?php echo $router->generate('test_match_action'); ?>" method="get">
        Match Id: <input type="text" name="match_id" />
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get matchlist:</legend>
    <form action="<?php echo $router->generate('test_matchlist_action'); ?>" method="get">
        Account Id: <input type="text" name="account_id" />
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get recent matchlist:</legend>
    <form action="<?php echo $router->generate('test_recentmatchlist_action'); ?>" method="get">
        Account Id: <input type="text" name="account_id" />
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get match timeline:</legend>
    <form action="<?php echo $router->generate('test_matchtimelines_action'); ?>" method="get">
        Match Id: <input type="text" name="match_id" />
        <input type="submit" />
    </form>
</fieldset>
<fieldset>
    <legend>Get leagues in all queues:</legend>
    <form action="<?php echo $router->generate('test_leagues_action'); ?>" method="get">
        Summoner Id: <input type="text" name="summoner_id" />
        <input type="submit" />
    </form>
</fieldset>
<fieldset>
    <legend>Get league positions in all queues:</legend>
    <form action="<?php echo $router->generate('test_leaguepositions_action'); ?>" method="get">
        Summoner Id: <input type="text" name="summoner_id" />
        <input type="submit" />
    </form>
</fieldset>
<fieldset>
    <legend>Get current game information:</legend>
    <form action="<?php echo $router->generate('test_activegamespec_action'); ?>" method="get">
        Summoner Id: <input type="text" name="summoner_id" />
        <input type="submit" />
    </form>
</fieldset>
<fieldset>
    <legend>Get featured game information:</legend>
    <form action="<?php echo $router->generate('test_featuredgames_action'); ?>" method="get">
        Featured Game Information: <input type="submit" value="GO!"/>
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
