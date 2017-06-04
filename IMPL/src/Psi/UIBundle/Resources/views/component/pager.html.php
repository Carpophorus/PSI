<nav aria-label="pager">
    <ul class="pagination">
        <li <?php echo ($currentPage == 0) ? "class='disabled'" : ""; ?>>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for ($i = 0; $i < $pageNumber; $i++): ?>
            <li <?php echo ($i == $currentPage) ? "class='active'" : ""; ?>>
                <a 
                    href="#" 
                    data-index="<?php echo $i; ?>">
                    <span><?php echo $i; ?></span>
                </a>
            </li>
        <?php endfor; ?>
        <li <?php echo ($currentPage == $pageNumber) ? "class='disabled'" : ""; ?>>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>