<div class="voxpow__loader">

</div>

<div id="voxpow-plugin-container" class="voxpow__page row">

    <div class="voxpow-lower">

        <div class="voxpow__message"></div>

        <div class="voxpow-box">

            <div class="content-container">
                <div class="top_part">
                    <div class="voxpow-image">
                        <img src=" <?php echo plugin_dir_url(__FILE__); ?>/assets/images/voxpow.png"
                             alt="Speech Recognition" title="Speech Recognition">
                    </div>
                    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
                </div>


                <div class="intro_text">
                    <h3>
                        <a href="https://voxpow.com/?utm_source=wp_plugin&utm_medium=referral&utm_campaign=wp_plugin"
                           class="voxpow-link"><?php esc_attr_e('Voxpow', 'voxpow'); ?></a>
                        <?php
                        esc_attr_e(' is tool which adds Speech Recognition Direct in your website for free.', 'voxpow'); ?>
                    </h3>
                    <h2><?php
                        $commands_js_file = get_option("voxpow_commands_js_file");
                        if (strpos($commands_js_file, 'https://cdn.voxpow.com/media/trackers/js/vp-') !== false) {
                            echo 'Speech Tracker is successfuly installed!';
                        } else {
                            echo 'Speech Tracker is NOT enabled, please enter correct credetentials.';
                        }
                        ?></h2>
                    <?php if (esc_attr(defined('VOXPOW_TRACKER_ID') ? VOXPOW_TRACKER_ID : get_option('voxpow_tracker_id'))) { ?>
                        <p class="big_p">
                            <?php esc_attr_e('Thank you for connecting your Voxpow account, you have successfuly set up Voxpow. Test your connection with the button at the bottom of the page. If you need any help or have any concerns please drop us a message at ', 'voxpow'); ?>
                            <a href="mailto:hello@voxpow.com"
                               class="voxpow-link"> <?php esc_attr_e('hello@voxpow.com', 'voxpow'); ?></a>
                        </p>
                    <?php } else { ?>
                        <div class="warning-wrapper">
                            <p class="big_p">
                                <?php esc_attr_e('Please connect your Voxpow account below to enable the plugin. You need to register for a free Voxpow account to obtain tracker ID and user API Key. Please ', 'voxpow'); ?>
                                <a href="https://voxpow.com/accounts/signup/?utm_source=wp_plugin&utm_medium=referral&utm_campaign=wp_plugin"
                                   class="voxpow-warrning-link"> <?php esc_attr_e('register here', 'voxpow'); ?></a>
                            </p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <form method="POST" action="options.php" class="voxpow-box">
            <div class="content-container">

                <?php settings_fields("voxpow_settings"); ?>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 voxpow-control">
                        <h1>
                            <?php _e('Settings', 'voxpow'); ?>
                        </h1>
                    </div>

                </div>

                <div class="voxpow__block">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 voxpow-control">
                            <label for="voxpow_tracker_id">
                                <?php _e('Voxpow tracker ID', 'voxpow'); ?>:
                                <div class="tooltip">?
                                    <span class="tooltiptext">Voxpow tracker ID which you make from the admin section</span>
                                </div>
                            </label>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 voxpow-control">
                            <input id="voxpow_tracker_id" name="voxpow_tracker_id" type="text" class="regular-text code"
                                   value="<?php echo esc_attr(defined('VOXPOW_TRACKER_ID') ? VOXPOW_TRACKER_ID : get_option('voxpow_tracker_id')); ?>"
                                <?php echo(defined('VOXPOW_TRACKER_ID') ? 'disabled' : ''); ?>/>
                            <div class="voxpow__description">
                                <?php _e('Enter API key', 'voxpow'); ?>: <code>for example vp-145981XXXXX</code>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 voxpow-control">
                            <label for="voxpow_api_token">
                                <?php _e('Voxpow API Key', 'voxpow'); ?>:
                                <div class="tooltip">?
                                    <span class="tooltiptext">Get the Voxpow API Key for the WP integration and enter it here</span>
                                </div>
                            </label>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 voxpow-control">
                            <input id="voxpow_api_token" name="voxpow_api_token" type="password"
                                   class="regular-text code"
                                   value="<?php echo esc_attr(defined('VOXPOW_API_TOKEN') ? VOXPOW_API_TOKEN : get_option('voxpow_api_token')); ?>"
                                <?php echo(defined('VOXPOW_API_TOKEN') ? 'disabled' : ''); ?>/>
                            <div class="voxpow__description">
                                <?php _e('Enter secret key', 'voxpow'); ?>: <code>for example
                                    f0e79feab03fa4XXXXXXXXXXXXXXX</code>
                            </div>
                        </div>

                    </div>


                    <div class="row">
                            <span class="voxpow-demo">
                                <?php esc_attr_e('Adding Speech Recognition to you website will help the customers to find inside your website easily.', 'voxpow') ?>
                            </span>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 voxpow-control">
                        <input type="hidden" name="action" value="update"/>
                        <?php submit_button(__('Save all changes', 'voxpow'), ['primary', 'large'], 'submit', true); ?>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 voxpow-control" style="display: none;">
                        <input type="button" name="test"
                               class="button test-connection-btn voxpow__test__connection"
                               value="<?php _e('Test the connection (after saving)', 'voxpow'); ?>"/>
                    </div>

                </div>
            </div>
        </form>

        <div class="voxpow-box">
            <h4>Advanced options : <a
                        href="https://voxpow.com/?utm_source=wp_plugin&utm_medium=referral&utm_campaign=wp_plugin">Voxpow
                    Admin </a></h4>
        </div>

    </div>
</div>

