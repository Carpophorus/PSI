<?php $view->extend('PsiAdminBundle:layout:base.html.php') ?>

<?php $view['UI']->set('title', 'N2M - Add new user') ?>

<?php $view['UI']->start('_content') ?>
<div id="anu-bckgrnd"></div>
<?php $view['form']->start($form); ?>
<div class="anu-container">
    <div class="anu-name-label">Enter Name:</div>
    <input type="text" id="anu-name"></input>
    <div class="anu-summoner-name-label">Enter Summoner Name:</div>
    <input type="text" id="anu-summoner-name"></input>
    <div class="anu-email-label">Enter E-mail Address:</div>
    <input type="text" id="anu-email"></input>
    <div class="anu-pass-label">Enter Password:</div>
    <input type="text" id="anu-pass"></input>
    <div class="anu-status-label">Status:</div>
    <input list="status-list"></input>
    <datalist id="status-list">
        <option value="active"><div value="1" id="val"></div></option>
        <option value="idle"><div value="2" id="val"></div></option>
        <option value="passive"><div value="3" id="val"></div></option>
    </datalist>
    <button id="anu-button">Add User</button>
</div>
<?php $view['form']->end($form); ?>
<?php $view['UI']->stop(); ?>