<div 
    class="data-table <?php echo $class; ?>" 
    <?php echo $attributes; ?>
    id="<?php echo $id; ?>">
    <div class="data-table-heading">
        <?php $heading[] = "actions"; ?>
        <?php foreach ($heading as $th): ?>
            <div>
                <span><?php echo $th; ?></span>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="data-table-content">
        <?php foreach ($data as $row): ?>
            <div class="data-table-row">
                <?php foreach ($row as $td): ?>
                    <div>
                        <span><?php echo $td; ?></span>
                    </div>
                <?php endforeach; ?>
                <div class="row-actions">
                    <?php foreach ($actions as $action): ?>
                        <div class="action-<?php echo $action['name']; ?>">
                            <button onclick="<?php echo $action['jsMethod']; ?>(this);">
                                <?php echo $action['label']; ?>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
