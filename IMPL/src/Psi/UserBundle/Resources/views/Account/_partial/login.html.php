<div class="login-container">
    <?php $view['form']->start($form); ?>
    <div class="lsp-label">Enter E-mail Address:</div>
    <input type="email" name="email" id="lsp-email"></input>
    <div class="lsp-label">Enter Password:</div>
    <input type="password" name="password" id="lsp-pass"></input>
    <button>Log In</button>
    <?php $view['form']->end($form); ?>
</div>