<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view['UI']->output('title', 'N2M - Admin') ?></title>
        <?php $view['UI']->output('_styles'); ?>
        <?php $view['UI']->output('_scripts'); ?>
    </head>
    <body>
        <header>
            <?php $view['UI']->output('_header'); ?>
        </header>
        <div class="container">
            <div id="main-content">
                <div class="messages">
                    <?php
                    $typeTranslation = [
                        'notice' => 'info',
                        'success' => 'success',
                        'error' => 'danger'
                    ];

                    ?>
                    <?php foreach ($view['session']->getFlashes() as $type => $flash_messages): ?>
                        <?php foreach ($flash_messages as $flash_message): ?>
                            <div class="alert alert-<?php echo $typeTranslation[$type] ?>">
                                <?php echo $flash_message ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>      
                </div>
                <?php $view['UI']->output('_content'); ?>            
            </div>
        </div>
        <footer>
            <?php $view['UI']->output('_footer'); ?>
            <?php $view['UI']->output('_footer_scripts'); ?>

            <script type="text/javascript">
                window.AdminUI = {
                    loadContent: function (url) {
                        $.ajax(url, {

                        }).done(function (data) {
                            var newContent = $(data).find('#main-content');
                            $("#main-content").html(newContent.html());
                        });
                        return false;
                    },
                    submitForm: function (form) {
                        var url = $(form).attr('action');
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: $(form).serialize(),
                            success: function (data)
                            {
                                var newContent = $(data).find('#main-content');
                                $("#main-content").html(newContent.html());
                            }
                        });
                        return false;
                    },
                    editUser: function(id) {
                        var baseUrl = "<?php echo $view['router']->path('admin_user_edit_action'); ?>";
                        window.location = baseUrl + "/" + id;
                    }
                };
                $(document).ajaxStart(function () {
                    Pace.restart();
                });
            </script>
        </footer>
    </body>
</html>
