<?php $view->extend('PsiUserBundle:layout:base.html.php') ?>

<?php $view['UI']->set('title', 'Login') ?>

<?php $view['UI']->start('_scripts'); ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.12.1.min.js"></script>
<?php $view['UI']->stop(); ?>

<?php $view['UI']->start('_content') ?>
<div id="lsp-bckgrnd"></div>
<div class="lsp-container">
    <div class="btn-group" data-toggle="buttons">
        <label class="btn btn-primary active">
            <input type="radio" name="options" id="option1" checked>Log In</input>
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="options" id="option2">Sign Up</input>
        </label>
        <label class="btn btn-primary">
            <input type="radio" name="options" id="option3">Password Change</input>
        </label>
    </div>
    <?php echo $view->render("PsiUserBundle:Account:_partial/register.html.php", ['form' => $registerForm]); ?>
    <?php echo $view->render("PsiUserBundle:Account:_partial/login.html.php", ['form' => $registerForm]); ?>
    <?php echo $view->render("PsiUserBundle:Account:_partial/forgot_password.html.php", ['form' => $resetPasswordForm]); ?>
    <?php $view['UI']->stop(); ?>
</div>