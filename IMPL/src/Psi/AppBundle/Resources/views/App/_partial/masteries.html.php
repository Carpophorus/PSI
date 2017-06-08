<div id="masteries-bckgrnd"></div>
<?php
$cunningCounter = 0;
$resolveCounter = 0;
$ferocityCounter = 0;
foreach ($masteries as $_mastery) {
    switch ($_mastery['data']['masteryTree']) {
        case "Ferocity":
            $ferocityCounter++;
            break;
        case "Cunning":
            $cunningCounter++;
            break;
        case "Resolve":
            $resolveCounter;
            break;
        default:
            break;
    }
}

?>
<div class="masteries-container">
    <div class="ferocity-container">
        <div class="mastery-points">
            <span><?php echo $ferocityCounter; ?></span>
        </div>
        <?php foreach ($binding['ferocity'] as $class => $masteryId): ?>
            <div class="f<?php echo $class; ?>">
                <img src="<?php echo $fileData[$masteryId]; ?>" />
                <?php $rank = 0; ?>
                <?php $maxRank = $staticData[$masteryId]['ranks']; ?>
                <?php if (isset($masteries[$masteryId])): ?>
                    <?php $rank = $masteries[$masteryId]['entity']->getRank(); ?>
                <?php endif; ?>
                <span><?php echo "$rank / $maxRank"; ?></span>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="cunning-container">
        <div class="mastery-points">
            <span><?php echo $cunningCounter; ?></span>
        </div>
        <?php foreach ($binding['cunning'] as $class => $masteryId): ?>
            <div class="c<?php echo $class; ?>">
                <img src="<?php echo $fileData[$masteryId]; ?>" />
                <?php $rank = 0; ?>
                <?php $maxRank = $staticData[$masteryId]['ranks']; ?>
                <?php if (isset($masteries[$masteryId])): ?>
                    <?php $rank = $masteries[$masteryId]['entity']->getRank(); ?>
                <?php endif; ?>
                <span><?php echo "$rank / $maxRank"; ?></span>
            </div>        
        <?php endforeach; ?>
    </div>
    <div class="resolve-container">
        <div class="mastery-points">
            <span><?php echo $resolveCounter; ?></span>
        </div>
        <?php foreach ($binding['resolve'] as $class => $masteryId): ?>
            <div class="r<?php echo $class; ?>">
                <img src="<?php echo $fileData[$masteryId]; ?>" />
                <?php $rank = 0; ?>
                <?php $maxRank = $staticData[$masteryId]['ranks']; ?>
                <?php if (isset($masteries[$masteryId])): ?>
                    <?php $rank = $masteries[$masteryId]['entity']->getRank(); ?>
                <?php endif; ?>
                <span><?php echo "$rank / $maxRank"; ?></span>
            </div>        
        <?php endforeach; ?>
    </div>
</div>

