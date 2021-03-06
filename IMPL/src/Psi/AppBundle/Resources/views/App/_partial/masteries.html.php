<div id="masteries-bckgrnd"></div>
<?php
$cunningCounter = 0;
$resolveCounter = 0;
$ferocityCounter = 0;
foreach ($masteries as $_mastery) {
    if(!isset($_mastery['entity'])) {
        continue;
    }
    switch ($_mastery['data']['masteryTree']) {
        case "Ferocity":
            $ferocityCounter += $_mastery['entity']->getRank();
            break;
        case "Cunning":
            $cunningCounter += $_mastery['entity']->getRank();
            break;
        case "Resolve":
            $resolveCounter += $_mastery['entity']->getRank();
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
            <?php $rank = 0; ?>
            <?php $maxRank = $staticData[$masteryId]['ranks']; ?>
            <?php if (isset($masteries[$masteryId])): ?>
                <?php $rank = $masteries[$masteryId]['entity']->getRank(); ?>
            <?php endif; ?>                      
            <?php
            if ($rank > 0) {
                $descriptionRank = isset($staticData[$masteryId]['description'][$rank - 1]) ? $rank - 1 : 0;
                $description = $staticData[$masteryId]['description'][$descriptionRank];
                $tooltip = "data-toggle='tooltip' data-placement='right' title='$description'";
            } else {
                $tooltip = "";
            }

            ?>
            <div class="f<?php echo $class; ?>">
                <img src="<?php echo $fileData[$masteryId]; ?>" <?php echo $tooltip; ?> />
                <span><?php echo "$rank / $maxRank"; ?></span>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="cunning-container">
        <div class="mastery-points">
            <span><?php echo $cunningCounter; ?></span>
        </div>
        <?php foreach ($binding['cunning'] as $class => $masteryId): ?>
            <?php $rank = 0; ?>
            <?php $maxRank = $staticData[$masteryId]['ranks']; ?>
            <?php if (isset($masteries[$masteryId])): ?>
                <?php $rank = $masteries[$masteryId]['entity']->getRank(); ?>
            <?php endif; ?>                
            <?php
            if ($rank > 0) {
                $descriptionRank = isset($staticData[$masteryId]['description'][$rank - 1]) ? $rank - 1 : 0;
                $description = $staticData[$masteryId]['description'][$descriptionRank];
                $tooltip = "data-toggle='tooltip' data-placement='right' title='$description'";
            } else {
                $tooltip = "";
            }

            ?>      
            <div class="c<?php echo $class; ?>">
                <img src="<?php echo $fileData[$masteryId]; ?>" <?php echo $tooltip; ?> />
                <span><?php echo "$rank / $maxRank"; ?></span>        
            </div>        
        <?php endforeach; ?>
    </div>
    <div class="resolve-container">
        <div class="mastery-points">
            <span><?php echo $resolveCounter; ?></span>
        </div>
        <?php foreach ($binding['resolve'] as $class => $masteryId): ?>
            <?php $rank = 0; ?>
            <?php $maxRank = $staticData[$masteryId]['ranks']; ?>
            <?php if (isset($masteries[$masteryId])): ?>
                <?php $rank = $masteries[$masteryId]['entity']->getRank(); ?>
            <?php endif; ?>                     
            <?php
            if ($rank > 0) {
                $descriptionRank = isset($staticData[$masteryId]['description'][$rank - 1]) ? $rank - 1 : 0;
                $description = $staticData[$masteryId]['description'][$descriptionRank];
                $tooltip = "data-toggle='tooltip' data-placement='right' title='$description'";
            } else {
                $tooltip = "";
            }

            ?>
            <div class="r<?php echo $class; ?>">
                <img src="<?php echo $fileData[$masteryId]; ?>" <?php echo $tooltip; ?> />
                <span><?php echo "$rank / $maxRank"; ?></span>           
            </div>        
        <?php endforeach; ?>
    </div>
</div>

