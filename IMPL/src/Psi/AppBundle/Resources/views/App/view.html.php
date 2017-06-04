<?php $view->extend('PsiAppBundle:layout:default.html.php') ?>

<?php $view['UI']->start('_content') ?>
<?php $teams = $match->getTeams(); ?>
<?php $blueTeam = $teams->get(0); ?>
<?php $redTeam = $teams->get(1); ?>
<div id="s-bckgrnd"></div>
<div class="teams-container">
    <div class="blue-team-container">
        <?php foreach ($match->getParticipants() as $participant): ?>
            <?php if ($participant->getTeam() !== $blueTeam): ?>
                <?php $view->render("PsiAppBundle:App:_partial:participant.html.php", ['participant' => $participant, 'wrapperClass' => "blue-team-member-container"]); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="red-team-container">
        <div class="red-team-member-container">
            <?php foreach ($match->getParticipants() as $participant): ?>
                <?php if ($participant->getTeam() !== $redTeam): ?>
                    <?php $view->render("PsiAppBundle:App:_partial:participant.html.php", ['participant' => $participant, 'wrapperClass' => "red-team-member-container"]); ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php $view['UI']->stop() ?>