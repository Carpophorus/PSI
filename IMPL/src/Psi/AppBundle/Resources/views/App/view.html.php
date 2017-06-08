<?php $view->extend('PsiAppBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content') ?>
<?php $teams = $match->getTeams(); ?>
<?php $blueTeam = $teams->get(0); ?>
<?php $redTeam = $teams->get(1); ?>

<script type="text/javascript">
    window.App = {};

    window.App.getMasteries = function (id) {
        var url = "<?php echo $router->generate('app_participant_mastery_action') ?>?id=" + id;
        var container = "#summoner-masteries-" + id;
        $.ajax(url, {
        }).done(function (data) {
            var newContent = data.content
            $(container).html(newContent);
        });
        return false;
    }

    window.App.getRunes = function (id) {
        var url = "<?php echo $router->generate('app_participant_rune_action') ?>?id=" + id;
        var container = "#summoner-runes-" + id;
        $.ajax(url, {
        }).done(function (data) {
            var newContent = data.content
            $(container).html(newContent);
        });
        return false;        
    }
</script>

<div id="s-bckgrnd"></div>
<div class="teams-container">
    <div class="blue-team-container">
        <?php foreach ($match->getParticipants() as $participant): ?>
            <?php if ($participant->getTeam() !== $blueTeam): ?>
                <?php echo $view->render("PsiAppBundle:App:_partial/participant.html.php", ['participant' => $participant, 'wrapperClass' => "blue-team-member-container", 'static' => $staticData]); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="red-team-container">
        <div class="red-team-member-container">
            <?php foreach ($match->getParticipants() as $participant): ?>
                <?php if ($participant->getTeam() !== $redTeam): ?>
                    <?php echo $view->render("PsiAppBundle:App:_partial/participant.html.php", ['participant' => $participant, 'wrapperClass' => "red-team-member-container", 'static' => $staticData]); ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php $view['UI']->stop() ?>