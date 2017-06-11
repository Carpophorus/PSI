<script type="text/javascript">
    window.loader = function(element) {
        this.template = "<?php echo preg_replace('~[\r\n]+~', '',  addslashes($view->render('PsiUIBundle:component:loader/template.html.php', []))); ?>";
        this.el = element;
        var loadMask;

        this.start = function () {
            this.loadMask = $("<div class='loader'></div>");
            this.loadMask.html(this.template);
            $(this.el).append(this.loadMask);
        };
        
        this.stop = function () {
            $(this.loadMask).remove();
        };
    };
</script>
