<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.wplauncher.com
 * @since      1.0.0
 *
 * @package    Tweet_Button
 * @subpackage Tweet_Button/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tweet_Button
 * @subpackage Tweet_Button/admin
 * @author     Ben Shadle <wplauncher@gmail.com>
 */
class Tweet_Button_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_shortcode( 'tweet_button', array( $this, 'addTweetButton' ));

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tweet_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tweet_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tweet-button-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Tweet_Button_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Tweet_Button_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tweet-button-admin.js', array( 'jquery' ), $this->version, false );
		

	}
	/**
	 * Tweet Button Shortcode Functionality
	 *
	 * @since    1.0.0
	 */
	public function addTweetButton( $atts, $content = "" ) {
		//[tweet_button classes="" style=""][/tweet_button]
		$a = shortcode_atts( array(
			          'class' => '',
					  'style'=> '',
					  'tweet'=>'',
					  'url'=>'',
					  'size'=>'',
					  'via'=>'',
					  'hashtags'=>''
			      ), $atts );
		return '<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text='.urlencode($a['tweet']).'&url='.urlencode($a['url']).'&via='.urlencode($a['via']).'&hashtags='.urlencode($a['hashtags']).'"
  data-size="'.urlencode($a['size']).'">
Tweet</a>';
  }

}
