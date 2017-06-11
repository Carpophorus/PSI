<?php $view->extend('PsiAppBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content') ?>
<?php $teams = $match->getTeams(); ?>
<?php $blueTeam = $teams->get(0); ?>
<?php $redTeam = $teams->get(1); ?>

<script type="text/javascript">
    window.App = {};

    var loadedMasteries = [];
    var loadedRunes = [];

    window.App.getMasteries = function (id, btn) {
        $(".rm-active").removeClass("rm-active");
        $(btn).addClass("rm-active");   
        
        var url = "<?php echo $router->generate('app_participant_mastery_action') ?>?id=" + id;
        var container = "#summoner-masteries-" + id;
        
        $(".summoner-masteries-wrapper").stop().hide(250);
        $(".summoner-runes-wrapper").stop().hide(250);

        if (loadedMasteries[id]) {
            $(container).stop().toggle(250);
            return false;
        }

        $.ajax(url, {
        }).done(function (data) {
            var newContent = data.content;
            $(container).html(newContent);
            $(container).stop(true).toggle(250);
            $('[data-toggle="tooltip"]').tooltip();

            loadedMasteries[id] = true;
        });
        return false;
    }

    window.App.getRunes = function (id, btn) {
        $(".rm-active").removeClass("rm-active");
        $(btn).addClass("rm-active");        
        
        var url = "<?php echo $router->generate('app_participant_rune_action') ?>?id=" + id;
        var container = "#summoner-runes-" + id;
        
        $(".summoner-masteries-wrapper").stop().hide(250);
        $(".summoner-runes-wrapper").stop().hide(250);

        if (loadedRunes[id]) {
            $(container).stop().toggle(250);
            return false;
        }


        $.ajax(url, {
        }).done(function (data) {
            var newContent = data.content;
            $(container).html(newContent);
            $('[data-toggle="tooltip"]').tooltip();
            $(container).stop(true).toggle(250);

            loadedRunes[id] = true;
        });
        return false;
    }
</script>

<div id="s-bckgrnd"></div>
<div class="teams-container">
    <div class="blue-team-container">
        <?php foreach ($match->getParticipants() as $participant): ?>
            <?php if ($participant->getTeam() !== $blueTeam): ?>
                <?php echo $view->render("PsiAppBundle:App:_partial/participant.html.php", ['participant' => $participant, 'renderAdvanced' => $isLoggedIn, 'wrapperClass' => "blue-team-member-container", 'static' => $staticData]); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="red-team-container">
            <?php foreach ($match->getParticipants() as $participant): ?>
                <?php if ($participant->getTeam() !== $redTeam): ?>
                    <?php echo $view->render("PsiAppBundle:App:_partial/participant.html.php", ['participant' => $participant, 'renderAdvanced' => $isLoggedIn, 'wrapperClass' => "red-team-member-container", 'static' => $staticData]); ?>
                <?php endif; ?>
            <?php endforeach; ?>
    </div>
</div>
<?php $view['UI']->stop() ?>
