<?php
    if (! defined('ABSPATH')) {
        http_response_code(404);
        die();
    }
?>

<div class='components-base-control__field'>
    <div style="margin-top: 1rem;">
        <label class="components-base-control__label" style="margin-top: .75rem; margin-bottom: .25rem;">
            <input type="checkbox" name="<?= $resetFieldName; ?>" value="1">
            <?php _e('Reset Ratings', 'Atozsites-star-ratings'); ?>
        </label>
    </div>
</div>

<div class='components-base-control__field'>
    <label class="components-base-control__label" style="margin-top: .75rem; margin-bottom: .25rem;">
        <strong><?php _e('Status', 'Atozsites-star-ratings'); ?></strong>
    </label>

    <div style="margin-top: 1rem;">
        <label class="components-base-control__label" style="margin-top: .5rem; margin-bottom: .25rem;">
            <input type="radio" name="<?= $statusFieldName; ?>" value="" <?php checked($status, ''); ?>>
            <?php _e('Auto', 'Atozsites-star-ratings'); ?>
        </label>
        <label class="components-base-control__label" style="margin-top: .5rem; margin-bottom: .25rem;">
            <input type="radio" name="<?= $statusFieldName; ?>" value="enable" <?php checked($status, 'enable'); ?>>
            <?php _e('Enable', 'Atozsites-star-ratings'); ?>
        </label>
        <label class="components-base-control__label" style="margin-top: .5rem; margin-bottom: .25rem;">
            <input type="radio" name="<?= $statusFieldName; ?>" value="disable" <?php checked($status, 'disable'); ?>>
            <?php _e('Disable', 'Atozsites-star-ratings'); ?>
        </label>
    </div>
</div>
