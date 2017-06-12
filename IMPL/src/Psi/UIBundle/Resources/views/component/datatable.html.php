<table 
    class="table table-hover data-table <?php echo $class; ?>" 
    <?php echo isset($attributes) ? $attributes : ""; ?>
    id="<?php echo $id; ?>">
    <thead class="data-table-heading">
        <?php $heading[] = "actions"; ?>
        <?php foreach ($heading as $th): ?>
            <th>
                <span><?php echo $th; ?></span>
            </th>
        <?php endforeach; ?>
    </thead>
    <tbody class="data-table-content">
        <?php foreach ($data as $row): ?>
            <tr class="data-table-row">
                <?php foreach ($row as $td): ?>
                    <td>
                        <span><?php echo $td; ?></span>
                    </td>
                <?php endforeach; ?>
                <td class="row-actions">
                    <?php foreach ($actions as $action): ?>
                        <div class="action-<?php echo $action['name']; ?>">
                            <button onclick="<?php echo $action['jsMethod']; ?>(<?php echo $row[$action['data']] ?>);">
                                <?php echo $action['label']; ?>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
