<?php

/**
 * Class Voxpow
 */
class Voxpow
{
    /**
     * Instance of Voxpow class
     *
     * @since    1.0.0
     * @access private
     * @var callable $instance Voxpow class instance
     */
    private static $instance;

    private $tracker_id;
    private $api_token;
    private $domain;
    private $language;
    private $region;
    public $commands_js_file;

    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new Voxpow(
                defined("VOXPOW_TRACKER_ID") ? VOXPOW_TRACKER_ID : null,
                defined("VOXPOW_API_TOKEN") ? VOXPOW_API_TOKEN : null,
                defined("VOXPOW_COMMANDS_JS_FILE") ? VOXPOW_COMMANDS_JS_FILE : null
            );
        }
        return self::$instance;
    }

    /**
     * Voxpow constructor.
     * @access   public
     */
    public function __construct($tracker_id, $api_token, $commands_js_file)
    {
        $this->tracker_id = empty($tracker_id) ? get_option("voxpow_tracker_id") : $tracker_id;
        $this->api_token = empty($api_token) ? get_option("voxpow_api_token") : $api_token;
        $this->commands_js_file = empty($commands_js_file) ? get_option("voxpow_commands_js_file") : $commands_js_file;
    }

    /**
     * Register actions and filters
     *
     * @access   public
     */
    public function setup()
    {
        //Register all the actions and filters
        $this->register_actions();
    }


    /**
     * Deactivate the module and set initial settings
     *
     * @access   public
     */
    public static function deactivate()
    {
        //Delete key and secrect key also
        delete_option('voxpow_tracker_id');
        delete_option('voxpow_api_token');
        delete_option('voxpow_commands_js_file');
    }

    //REGISTRATIONS

    /**
     * Register actions
     *
     * @access private
     */
    private function register_actions()
    {

        //Register admin menu
        add_action('admin_menu', array($this, 'register_menu'));

        //Init register settings
        add_action('admin_init', array($this, 'register_settings'));

        //Enqueue admin scripts
        add_action('admin_enqueue_scripts', array($this, 'register_scripts'));

        //Enqueue admin styles
        add_action('admin_enqueue_scripts', array($this, 'register_styles'));

        //Add a notice if domain is null
        add_action('admin_notices', array($this, 'admin_notice_no_data'));

        //Register AJAX action to test the connection with Voxpow
        add_action('wp_ajax_voxpow_test_connection', array($this, 'test_connection'));

        //Enqueue scripts in the frontend part
        add_action('wp_enqueue_scripts', array($this, 'action_add_voxpow_scripts'));

    }


    /**
     * Register scripts in admin section
     *
     * @access public
     */
    public function register_scripts()
    {

        wp_enqueue_script('voxpow-core-js', plugin_dir_url(__FILE__) . '/assets/scripts/core.js', array('jquery'), '1.4.0', true);
    }

    /**
     * Register styles in admin section
     *
     * @access public
     */
    public function register_styles()
    {

        wp_enqueue_style('voxpow-core-css', plugin_dir_url(__FILE__) . '/assets/styles/core.css');

    }

    /**
     * Register settings of the Voxpow plugin
     *
     * @access public
     */
    public function register_settings()
    {

        register_setting("voxpow_settings", "voxpow_tracker_id");
        register_setting("voxpow_settings", "voxpow_api_token");
        register_setting("voxpow_settings", "voxpow_commands_js_file");

        if (!empty($this->tracker_id) && !empty($this->api_token)) {
            $connection = new Voxpow_Connection($this->tracker_id, $this->api_token);
            $response = $connection->voxpow_connect();

            $this->domain = isset($response["domain"]) ? $response["domain"] : null;
            $this->language = isset($response["language"]) ? $response["language"] : null;
            $this->region = isset($response["region"]) ? $response["region"] : null;
            $this->commands_js_file = isset($response["commands_js_file"]) ? $response["commands_js_file"] : null;
            update_option("voxpow_commands_js_file", isset($response["commands_js_file"]) ? $response["commands_js_file"] : null);
        }
    }

    /**
     * Register settings page in administration
     *
     * @access public
     */
    public function register_setting_page()
    {
        include_once('voxpow_settings_page.php');
    }

    /**
     * Register and add information in admin menu
     *
     * @access public
     */
    public function register_menu()
    {
        add_menu_page(
            'Welcome to the Voxpow WordPress Plugin',
            'Voxpow',
            'manage_options',
            'voxpow',
            array($this, 'register_setting_page'),
            plugin_dir_url(__FILE__) . './assets/images/voxpow-icon.png'
        );

    }


    /**
     * Add notice if domain is not set
     *
     * @since    1.0.0
     */
    public function admin_notice_no_data()
    {
        $class = 'notice notice-warning';
        $message = __('Voxpow is almost ready. To get started, please fill your API token : ', 'voxpow');

        if (empty($this->api_token) || empty($this->tracker_id)) {
            printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message) . '<a href="' . admin_url('admin.php?page=voxpow') . '">here</a>');
        }
    }

    public function action_add_voxpow_scripts()
    {

        $commands_js_file = isset($this->commands_js_file) ? $this->commands_js_file : get_option("voxpow_commands_js_file");

        if (!empty($commands_js_file)) {
            wp_enqueue_script('voxpow-script', 'https://cdn.voxpow.com/static/libs/v1/voxpow.js', [], null, true);
            wp_enqueue_script('voxpow-widget-script', 'https://cdn.voxpow.com/static/libs/v1/voxpow-widget.js', ['voxpow-script'], null, true);
            wp_enqueue_script('voxpow-tracker-script', $commands_js_file, ['voxpow-widget-script'], null, true);
            wp_add_inline_script('voxpow-tracker-script', $this->initializeResponsivePlugin());
        }
    }

    /**
     * Initialization of Voxpow JavaScript library
     * @return string
     *
     * @access public
     */
    private function initializeResponsivePlugin()
    {

        return
            "var voxpowShow=voxpowShowTracker();voxpow&&voxpowShow&&
            (voxpow.setLanguage(voxpowLanguage),voxpow.addCommands
            (voxpowCommands),voxpow.addCallback(voxpowCallbacks),
            SpeechKITT.voxpow(),SpeechKITT.setStylesheet(voxpowStylesheet),
            SpeechKITT.setInstructionsText(voxpowSearchMessage),
            SpeechKITT.setToggleLabelText(voxpowLabelText),
            SpeechKITT.rememberStatus(voxpowRememberStatus),
            SpeechKITT.render(),1===voxpowUseVoiceTyping&&(window.onload=function()
            {document.querySelectorAll(voxpowQuerySelector).forEach(voxpowElementsIterator)}));";
    }

    // METHODS

    /**
     * Testing the credentials for connection with Voxpow servers
     * Result is message in the administration
     *
     * @access public
     */
    public function test_connection()
    {

        $connection = new Voxpow_Connection($this->tracker_id, $this->api_token);
        $response = $connection->check_connection();
        if ($response == true) {
            $this->show_message(__('Connection is successfully established. Voice tracker will be activated on your website', 'voxpow'));
        } else {
            $this->show_message($response, 'voxpow');
        }
    }

    /**
     * Formating of the message
     * @param string $message Message to be formated
     * @param bool $errormsg Optional. Indicates if it is error message. Default false.
     *
     * @access public
     */
    public function show_message($message, $errormsg = false)
    {

        if ($errormsg) {

            echo '<div id="message" class="error">';

        } else {

            echo '<div id="message" class="updated fade">';

        }

        echo "<p><strong>$message</strong></p></div>";

    }

}