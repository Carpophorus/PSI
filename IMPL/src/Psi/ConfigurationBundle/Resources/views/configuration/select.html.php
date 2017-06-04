<div class="input-group">
    <span class="input-group-addon" id="configuration-<?php echo $configuration->getName(); ?>">
        <?php echo $configuration->getLabel(); ?>
    </span>
    <select 
        name="configuration[<?php echo $configuration->getName(); ?>]"
        class="configuration-field-text form-control"
        >
        <option value="">- Please select -</option>
        <?php foreach ($configuration->getOptions() as $option): ?>
            <option <?php echo ($configuration->getValue() == $option['value']) ? "selected" : ""; ?> value="<?php echo $option['value']; ?>"><?php echo $option['label']; ?></option>
        <?php endforeach; ?>
    </select>
</div>