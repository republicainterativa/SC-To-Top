<?php
// create custom plugin settings menu
add_action('admin_menu', 'sc_to_top_create_menu');

function sc_to_top_create_menu() {

    //create new top-level menu
    global $page_hook_suffix;
    $page_hook_suffix = add_menu_page('SC TO TOP Settings', 'SC to top', 'administrator', __FILE__, 'sc_to_top_settings_page', 'dashicons-arrow-up-alt2' );

    //call register settings function
    add_action( 'admin_init', 'register_sc_to_top_settings' );
}


function register_sc_to_top_settings() {
    //register our settings
    register_setting( 'sc-to-top-settings-group', 'sc_color' );
    register_setting( 'sc-to-top-settings-group', 'sc_icon_color' );
    register_setting( 'sc-to-top-settings-group', 'sc_icon' );
    register_setting( 'sc-to-top-settings-group', 'sc_titleattr' );
    register_setting( 'sc-to-top-settings-group', 'sc_css' );
}

function sc_to_top_settings_page() { ?>
    <div class="wrap sc-to-top-page container">
        <h1>SC To Top Configuration</h1>

        <form method="post" action="options.php">
            <?php settings_fields( 'sc-to-top-settings-group' ); ?>
            <?php do_settings_sections( 'sc-to-top-settings-group' ); ?>
                <div class="form-group">
                    <label for="sc_color">Background color</label>
                    <input type="color" id="sc_color" class="form-control" name="sc_color" value="<?php echo esc_attr( get_option('sc_color')); ?>" />
                </div>
                <div class="form-group">
                    <label for="sc_icon_color">Icon color</label>
                    <input type="color" id="sc_icon_color" class="form-control" name="sc_icon_color" value="<?php echo esc_attr( get_option('sc_icon_color')); ?>" />
                </div>
                <div class="form-group">
                    <label for="sc_icon">Icon</label>
                    <input type="text" id="sc_icon" class="form-control" name="sc_icon" value="<?php echo esc_attr( get_option('sc_icon')); ?>">
                    <p class="help-block">Select the icon bellow:</p>
                    <a href="javascript:void(0)" class="select-icon">
                        <i class="icon-up"></i>
                    </a>
                    <a href="javascript:void(0)" class="select-icon">
                        <i class="icon-up-circled2"></i>
                    </a>
                    <a href="javascript:void(0)" class="select-icon">
                        <i class="icon-up-dir"></i>
                    </a>
                    <a href="javascript:void(0)" class="select-icon">
                        <i class="icon-up-open"></i>
                    </a>
                    <a href="javascript:void(0)" class="select-icon">
                        <i class="icon-up-big"></i>
                    </a>
                    <a href="javascript:void(0)" class="select-icon">
                        <i class="icon-up-hand"></i>
                    </a>
                    <a href="javascript:void(0)" class="select-icon">
                        <i class="icon-up-open-big"></i>
                    </a>
                    <a href="javascript:void(0)" class="select-icon">
                        <i class="icon-up-fat"></i>
                    </a>
                    <a href="javascript:void(0)" class="select-icon">
                        <i class="icon-up-1"></i>
                    </a>
                    <a href="javascript:void(0)" class="select-icon">
                        <i class="icon-up-circled"></i>
                    </a>
                </div>
                <div class="form-group">
                    <label for="sc_titleattr">Title attribute</label>
                    <input type="text" id="sc_titleattr" class="form-control" name="sc_titleattr" value="<?php echo esc_attr( get_option('sc_titleattr') ); ?>" />
                </div>
                <div class="form-group">
                    <label for="sc_css">Custom CSS</label>
                    <textarea rows="8" id="cs_css" class="form-control" name="sc_css" placeholder=".sc-to-top i { font-size: 22px; }"><?php echo esc_attr( get_option('sc_css') ); ?></textarea>
                    <p class="help-block"><i><b>(Advanced)</b></i> You must use the "<i><b> .sc-to-top </b></i>" or "<i><b> .sc-to-top i </b></i>" selectors</p>
                </div>

            <?php submit_button(); ?>

        </form>
    </div>
<?php } ?>