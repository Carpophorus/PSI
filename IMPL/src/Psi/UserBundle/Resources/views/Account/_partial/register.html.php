<div class="signup-container hidden">
    <?php $view['form']->start($form); ?>
    <div class="lsp-label">First Name:</div>
    <input type="text" name="name" id="lsp-name"></input>
    <div class="lsp-label">Last Name:</div>
    <input type="text" name="lastname" id="lsp-summ"></input>
    <div class="lsp-label">Enter E-mail Address:</div>
    <input type="email" name="email" id="lsp-email"></input>
    <div class="lsp-label">Enter Password:</div>
    <input type="password" name="password" id="lsp-pass"></input>
    <button>Sign Up</button>
    <?php $view['form']->end($form); ?>
</div>