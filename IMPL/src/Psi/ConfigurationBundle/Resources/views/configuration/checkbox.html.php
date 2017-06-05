<div class="input-group">
    <span class="input-group-addon" id="configuration-<?php echo $configuration->getName(); ?>">
        <?php echo $configuration->getLabel(); ?>
    </span>
    <span class="input-group-addon">
        <select 
            autocomplete="off"
            name="configuration[<?php echo $configuration->getName(); ?>]"
            class="configuration-field-text form-control"
            >
            <option <?php echo ($configuration->getValue() > 0) ? "selected='true'" : ""; ?> value="1">Yes</option>
            <option <?php echo ($configuration->getValue() > 0) ? "" : "selected='true'"; ?> value="0">No</option>
        </select>  
    </span>    
</div>