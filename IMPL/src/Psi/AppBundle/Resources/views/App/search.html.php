<?php $view->extend('PsiAppBundle:layout:base.html.php') ?>

<?php $view['UI']->start('_content') ?>
<script type="text/javascript">
    var SearchForm = {
        submit: function (form) {
            var data = new FormData(form);
            var url = $(form).attr('action') + "/" + data.get('summoner')
            console.log(url);
            $.ajax(url, {
                type: "POST",
                url: url,
                success: function (data)
                {
                    var messages = data.messages;
                    if (data.success) {
                        var newContent = data.content;
                        $("#search-results").html(newContent);
                    } else {

                    }
                    $(".messages").html(messages);
                }
            });
            return false;
        }
    };
</script>

<div id="lp-bckgrnd"></div>
<form onSubmit="SearchForm.submit(this); return false;" action="<?php echo $router->generate('app_search_action'); ?>" method="GET">
    <div id="sn-search" class="search-container">
        <div class="sc-label">Enter Summoner Name:</div>
        <input type="text" name="summoner" class="sc-input" placeholder="Example: Doublelift" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Example: Doublelift'">
        </input>
        <button class="sc-button button">Search</button>
    </div>
</form>
<div id="search-results"></div>
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