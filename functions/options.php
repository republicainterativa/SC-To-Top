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
}

function sc_to_top_settings_page() { ?>
    <div class="wrap sc-to-top-page">
        <h1>SC To Top Configuration</h1>

        <form method="post" action="options.php">
            <?php settings_fields( 'sc-to-top-settings-group' ); ?>
            <?php do_settings_sections( 'sc-to-top-settings-group' ); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Background color</th>
                    <td>
                        <input type="color" name="sc_color" value="<?php echo esc_attr( get_option('sc_color') ); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Icon color</th>
                    <td>
                        <input type="color" name="sc_icon_color" value="<?php echo esc_attr( get_option('sc_icon_color')); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Icon</th>
                    <td>
                        <input id="selected-icon" type="text" name="sc_icon" value="<?php echo esc_attr( get_option('sc_icon')); ?>">
                        <br />
                        <p>Select the icon bellow:</p>
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
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>

        </form>
    </div>
<?php } ?>