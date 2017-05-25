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

<fieldset>
    <legend>Get ranked stats:</legend>
    <form action="<?php echo $router->generate('test_rankedstats_action'); ?>" method="get">
        Summoner Id: <input type="text" name="summoner_id" />
        <!--Summoner Region: <input type="text" name="summoner_id" />-->
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get player stats summary:</legend>
    <form action="<?php echo $router->generate('test_playerstatssummary_action'); ?>" method="get">
        Summoner Id: <input type="text" name="summoner_id" />
        <!--Summoner Region: <input type="text" name="summoner_id" />-->
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get all champions:</legend>
    <form action="<?php echo $router->generate('test_staticdatachampions_action'); ?>" method="get">
        <!--Summoner Id: <input type="text" name="summoner_id" /> -->
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get champion by id:</legend>
    <form action="<?php echo $router->generate('test_staticdatachampionid_action'); ?>" method="get">
        Champion Id: <input type="text" name="champion_id" />
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get all masteries:</legend>
    <form action="<?php echo $router->generate('test_staticdatamasteries_action'); ?>" method="get">
        
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get masteries by id:</legend>
    <form action="<?php echo $router->generate('test_staticdatamasteriesid_action'); ?>" method="get">
        Masteries Id: <input type="text" name="masteries_id" />
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get profile icons:</legend>
    <form action="<?php echo $router->generate('test_staticdataprofileicons_action'); ?>" method="get">
        
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get runes:</legend>
    <form action="<?php echo $router->generate('test_staticdatarunes_action'); ?>" method="get">
        
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get runes by id:</legend>
    <form action="<?php echo $router->generate('test_staticdatarunesid_action'); ?>" method="get">
        Masteries Id: <input type="text" name="runes_id" />
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get all summoner spells:</legend>
    <form action="<?php echo $router->generate('test_staticdatasummonerspells_action'); ?>" method="get">
        
        <input type="submit" />
    </form>
</fieldset>

<fieldset>
    <legend>Get summoner spell by id:</legend>
    <form action="<?php echo $router->generate('test_staticdatasummonerspellid_action'); ?>" method="get">
        Summoner spell Id: <input type="text" name="summonerspell_id" />
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
<fieldset>
    <legend>Get ranked stats:</legend>
    <form action="<?php echo $router->generate('test_rankedstats_action'); ?>" method="get">
        Summoner Id: <input type="text" name="summoner_id" />
        <input type="submit" />
    </form>
</fieldset>
<?php $view['UI']->stop() ?>
