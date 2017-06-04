<div class="input-group">
    <span class="form-control" id="configuration-<?php echo $configuration->getName(); ?>">
        <?php echo $configuration->getLabel(); ?>
    </span>    
    <span class="input-group-addon">
        <input 
            type="checkbox" 
            <?php echo ($configuration->getValue()) ? "checked='checked'" : ""; ?>
            value="<?php echo $configuration->getValue(); ?>" 
            name="configuration[<?php echo $configuration->getName(); ?>]"
            class="configuration-field-text"
            />
    </span>    
</div>