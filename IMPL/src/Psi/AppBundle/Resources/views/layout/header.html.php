<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#adminNav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="nav navbar-nav">
                <?php
                $links = [
                    'login' => $view['router']->path('user_login_action'),
                    'search' => $view['router']->path('app_search_action'),
                    'about' => $view['router']->path('app_search_action'),
                ];

                ?>
                <?php foreach ($links as $label => $href): ?>
                    <li>
                        <a href="<?php echo $href; ?>"><?php echo $label; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>
