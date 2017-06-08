<?php $view->extend('PsiAdminBundle:layout:base.html.php') ?>

<?php $view['UI']->set('title', 'Edit User') ?>

<?php //renderTable($heading, $data, $cssId, $cssClass, $actions) ?>

<?php $view['UI']->start('_content') ?>
<?php

$heading = ["Id",'Email', 'SummonerName', 'Firstname', 'Lastname', 'Status'];

echo $view['datatable']->renderTable(
    $heading, $userData, 'userListTable', 'data-table', [ 
        'edit' => [
            'name' => "edit",
            'jsMethod' => "AdminUi.editUser",
            'label' => "Edit",
            'data' => "id"
        ]
    ]
);

?>
<?php $view['UI']->stop(); ?>