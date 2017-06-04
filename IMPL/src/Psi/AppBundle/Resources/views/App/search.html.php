<?php $view->extend('PsiAppBundle:layout:default.html.php') ?>

<?php $view['UI']->start('_content') ?>
<div id="lp-bckgrnd"></div>
<?php $view['form']->start($searchForm); ?>
<div id="sn-search" class="search-container">
    <div class="sc-label">Enter Summoner Name:</div>
    <input type="text" class="sc-input" placeholder="Example: Doublelift" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Example: Doublelift'">
    </input>
    <button class="sc-button"></button>
</div>
<?php $view['form']->end($searchForm); ?>
<?php if (isset($renderAdvanced) && $renderAdvanced): ?>
    <?php $view['form']->start($advancedForm); ?>
    <div id="un-search" class="hidden search-container">
        <div class="sc-label">Enter User Name:</div>
        <input type="text" class="sc-input" placeholder="Example: Triplelift" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Example: Triplelift'">
        </input>
        <button class="sc-button"></button>
    </div>
    <?php $view['form']->end($advancedForm); ?>
<?php endif; ?>
<?php $view['UI']->stop(); ?>