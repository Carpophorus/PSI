<div class="input-group">
    <span class="input-group-addon" id="configuration-<?php echo $configuration->getName(); ?>">
        <?php echo $configuration->getLabel(); ?>
    </span>
    <input 
        type="text" 
        value="<?php echo $configuration->getValue(); ?>" 
        name="configuration[<?php echo $configuration->getName(); ?>]"
        class="configuration-field-text form-control"
        />
</div>