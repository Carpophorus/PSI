<?php $teams = $match->getTeams(); ?>
<?php $blueTeam = $teams->get(0); ?>
<?php $redTeam = $teams->get(1); ?>
<div id="s-bckgrnd"></div>
<a href="<?php echo $router->generate('app_match_action', ['match' => $match->getId()]); ?>">
    <div class="teams-container">
        <div class="blue-team-container">
            <?php foreach ($match->getParticipants() as $participant): ?>
                <?php if ($participant->getTeam() !== $blueTeam): ?>
                    <div class="blue-team-member">
                        <div class="grayscale-champion-icon">
                            <img src="<?php echo $static['file']['champion'][$participant->getChampionId()]; ?>" />
                        </div>
                        <div class="champion-icon-tint">
                        </div>
                        <div class="champion-mastery-icon"></div>
                        <div class="champion-name"><?php echo $static['champion'][$participant->getChampionId()]['name']; ?></div>
                        <div class="summoner-name"><?php echo $participant->getSummoner()->getName(); ?></div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="red-team-container">
            <div class="red-team-member-container">
                <?php foreach ($match->getParticipants() as $participant): ?>
                    <?php if ($participant->getTeam() !== $redTeam): ?>
                        <div class="red-team-member">
                            <div class="grayscale-champion-icon">
                                <img src="<?php echo $static['file']['champion'][$participant->getChampionId()]; ?>" />
                            </div>
                            <div class="champion-icon-tint">
                            </div>
                            <div class="champion-name"><?php echo $static['champion'][$participant->getChampionId()]['name']; ?></div>
                            <div class="summoner-name"><?php echo $participant->getSummoner()->getName(); ?></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</a>
