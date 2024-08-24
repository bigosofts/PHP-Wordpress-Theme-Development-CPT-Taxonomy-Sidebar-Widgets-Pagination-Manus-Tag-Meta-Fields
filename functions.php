<?php
/* Use for calling stylesheet and other css file */
function calling_resources(){

wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css' );
wp_enqueue_style('flaticon', get_template_directory_uri() . '/css/flaticon.css' );
wp_enqueue_style('owlstyle', get_template_directory_uri() . '/css/owl.css' );
wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/css/bootstrap.css' );
wp_enqueue_style('fancybox', get_template_directory_uri() . '/css/jquery.fancybox.min.css' );
wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css' );
wp_enqueue_style('hover', get_template_directory_uri() . '/css/hover.css' );
wp_enqueue_style('style', get_stylesheet_uri(), '', '1.1.2' );
wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', '', '1.1.0' );
wp_enqueue_style('comments', get_template_directory_uri() . '/css/comments.css', '', '1.0.0' );
wp_enqueue_style('pagination', get_template_directory_uri() . '/css/pagination.css', '', '1.0.2' );
wp_enqueue_style('font-awesome','path/to/font-awesome/css/font-awesome.min.css', '', '1.0.1' );



}
/* initiate called stylesheet and other css file */
add_action('wp_enqueue_scripts','calling_resources');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
/* Registering navigation menu*/
register_nav_menus( array(
    'primary' =>__( 'Primary Menu', 'bbblab' ),
    'secondary' =>__( 'Sticky Header', 'bbblab' ),
    'tertiary' =>__( 'Footer Menu', 'bbblab' ),
    'extra' =>__( 'Footer Menu two', 'bbblab' ),
    'second_menu' =>__( 'Secondary Menu', 'bbblab' ),
) );


/* Getting feature image function in wordpress */
function wpse_setup_theme() {
	add_theme_support('post-thumbnails' , array('post', 'page', 'slider-items', 'team-member', 'professor', 'event', 'publication', 'gallery', 'thesis'));
	set_post_thumbnail_size( 370, 370, true);
	add_image_size('slider-items', 1920, 870, true );
	add_image_size('team-member', 270, 370, true );
	add_image_size('professor', 520, 520, true );
	add_image_size('event', 770, 450, true );
	add_image_size('gallery', 370, 370, true );

	add_theme_support( 'custom-logo', array(
	'height'      => 55,
	'width'       => 171,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

}

add_action( 'after_setup_theme', 'wpse_setup_theme' );




function ourWidgetInit(){
	register_sidebar(array(
		'name' => 'Sidebar-category',
		'id' => 'sidebar1',
		'before_widget' => '<div class="sidebar-category sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-title"><h4>',
		'after_title' => '</h4></div>',

	));
	register_sidebar(array(
		'name' => 'footer-widget-text',
		'id' => 'sidebar2',
		'before_widget' => '<div class="sidebar-category sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-title"><h4>',
		'after_title' => '</h4></div>',

	));
	register_sidebar(array(
		'name' => 'footer-last-menu',
		'id' => 'sidebar3',
		'before_widget' => '<div class="sidebar-category sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-title"><h4>',
		'after_title' => '</h4></div>',

	));
	register_sidebar(array(
		'name' => 'Top Bar Right Info',
		'id' => 'secondary_header_right',
		'before_widget' => '<div class="top-right">',
		'after_widget' => '</div>',
	));


}
add_action('widgets_init', 'ourWidgetInit');



// Excerpt Function
function excerpt($num) {
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt);
	echo $excerpt;
}

/* Custom Pagination */
function pagination($pages = '', $range = 4){
    $showitems = ($range * 2)+1;
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == ''){
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){$pages = 1;}
	}
	if(1 != $pages){
		echo "<div class=\"pagination\"><span>Page No- ".$paged." of ".$pages."</span>";

		if($paged > 2 && $paged > $range+1 && $showitems < $pages)
			echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";

		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

		for ($i=1; $i <= $pages; $i++){
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
				echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
				}
		}
		if ($paged < $pages && $showitems < $pages)
			echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next Page &rsaquo;</a>";           if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last Page &raquo;</a>";
		echo "</div>\n";
	}}


//custom post_type_ slider

add_action('init', 'slider_gallery');

function slider_gallery(){
		register_post_type('slider-items',
			array(
				'labels' =>
							array(
							'name' =>__('Slider'),
							'singular_name' =>__('Slider'),
							'menu_name' =>__('Slider Gallery'),
							'name_admin_bar' =>__('Add Slider'),
							'all_items' =>__('All Slider'),
							'add_new' =>__('Add Slider'),
							'add_new_item' =>__('Add Slider'),
							'edit_item' =>__('Edit Slider'),
							'new_item' =>__('New Slider'),
							'view_item' =>__('View Slider'),
							'search_item' =>__('Search Slider'),
						),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'slider-items'),
				'menu_position' => 2,
				'menu_icon' => 'dashicons-products',
				'supports' => array('title' , 'thumbnail' , 'editor' ,'excerpt')

			)
	);
}



//custom_metabox

function slider_custom_meta() {
	add_meta_box ('slider_meta', __('Others Section', 'professoratiqlab'), 'slider_meta_callback', 'slider-items');
}
add_action('add_meta_boxes', 'slider_custom_meta');

//field
function slider_meta_callback ($post){
	wp_nonce_field (basename(__FILE__), 'slider_nonce');
	$slider_stored_meta = get_post_meta($post->ID);
	?>
	<input type='text' name='meta-subtitle-slider' id='meta-text' value='<?php if(isset( $slider_stored_meta['meta-subtitle-slider'])) echo $slider_stored_meta['meta-subtitle-slider'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Sub Title Here" >

	<input type='text' name='meta-url-name-slider' id='meta-text' value='<?php if(isset( $slider_stored_meta['meta-url-name-slider'])) echo $slider_stored_meta['meta-url-name-slider'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter URL Name Here" >

	<input type='text' name='meta-url-slider' id='meta-text' value='<?php if(isset( $slider_stored_meta['meta-url-slider'])) echo $slider_stored_meta['meta-url-slider'][0]; ?>'
	style="width:100%; font-size:16px;" placeholder="Enter URL Here" >
	<?php
}


//save field value
function slider_meta_save($post_id) {
	//check save status
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['slider_nonce']) && wp_verify_nonce($_POST['slider_nonce'], basename(__FILE__))) ? 'true' : 'false' ;

	//Exits script depending on save status
	if($is_autosave || $is_revision || !$is_valid_nonce) {
		return;
	}
	//check for input and sanitizes/saves if needed
	if( isset($_POST['meta-subtitle-slider'])){
		update_post_meta($post_id, 'meta-subtitle-slider', sanitize_text_field($_POST['meta-subtitle-slider']));
	}
	if( isset($_POST['meta-url-name-slider'])){
		update_post_meta($post_id, 'meta-url-name-slider', sanitize_text_field($_POST['meta-url-name-slider']));
	}
	if( isset($_POST['meta-url-slider'])){
		update_post_meta($post_id, 'meta-url-slider', sanitize_text_field($_POST['meta-url-slider']));
	}
}

add_action('save_post', 'slider_meta_save');
















//custom post_type_team

add_action('init', 'team_group');

function team_group(){
		register_post_type('team-member',
			array(
				'labels' =>
							array(
							'name' =>__('Team'),
							'singular_name' =>__('Team'),
							'menu_name' =>__('Team'),
							'name_admin_bar' =>__('Add Member'),
							'all_items' =>__('All Member'),
							'add_new' =>__('Add Member'),
							'add_new_item' =>__('Add Member'),
							'edit_item' =>__('Edit Member'),
							'new_item' =>__('New Member'),
							'view_item' =>__('View Member'),
							'search_item' =>__('Search Member'),
						),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'team-member'),
				'menu_position' => 3,
				'menu_icon' => 'dashicons-image-filter',
				'supports' => array('title' , 'thumbnail' , 'editor', 'excerpt')

			)
	);
}

//custom taxonomy register for slider-all_items


//custom_metabox

function team_custom_meta() {
	add_meta_box ('team_meta', __('Others Section', 'professoratiqlab'), 'team_meta_callback', 'team-member');
}
add_action('add_meta_boxes', 'team_custom_meta');

//field
function team_meta_callback ($post){
	wp_nonce_field (basename(__FILE__), 'team_nonce');
	$team_stored_meta = get_post_meta($post->ID);
	?>
	<input type='text' name='meta-team-designation' id='meta-text' value='<?php if(isset( $team_stored_meta['meta-team-designation'])) echo $team_stored_meta['meta-team-designation'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Your Academic Rank/ Designation" >

	<input type='text' name='meta-facebook-url' id='meta-text' value='<?php if(isset( $team_stored_meta['meta-facebook-url'])) echo $team_stored_meta['meta-facebook-url'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Facebook URL Here" >

	<input type='text' name='meta-twitter-url' id='meta-text' value='<?php if(isset( $team_stored_meta['meta-twitter-url'])) echo $team_stored_meta['meta-twitter-url'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Twitter URL Here" >

	<input type='text' name='meta-linkedin-url' id='meta-text' value='<?php if(isset( $team_stored_meta['meta-linkedin-url'])) echo $team_stored_meta['meta-linkedin-url'][0]; ?>'
	style="width:100%; font-size:16px;" placeholder="Enter LinkedIn URL Here" >
	<?php
}


//save field value
function team_meta_save($post_id) {
	//check save status
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['team_nonce']) && wp_verify_nonce($_POST['team_nonce'], basename(__FILE__))) ? 'true' : 'false' ;

	//Exits script depending on save status
	if($is_autosave || $is_revision || !$is_valid_nonce) {
		return;
	}
	//check for input and sanitizes/saves if needed
	if( isset($_POST['meta-team-designation'])){
		update_post_meta($post_id, 'meta-team-designation', sanitize_text_field($_POST['meta-team-designation']));
	}
	if( isset($_POST['meta-facebook-url'])){
		update_post_meta($post_id, 'meta-facebook-url', sanitize_text_field($_POST['meta-facebook-url']));
	}
	if( isset($_POST['meta-twitter-url'])){
		update_post_meta($post_id, 'meta-twitter-url', sanitize_text_field($_POST['meta-twitter-url']));
	}
	if( isset($_POST['meta-linkedin-url'])){
		update_post_meta($post_id, 'meta-linkedin-url', sanitize_text_field($_POST['meta-linkedin-url']));
	}
}

add_action('save_post', 'team_meta_save');





//custom post_type_professor

add_action('init', 'professor_lab');

function professor_lab(){
		register_post_type('professor',
			array(
				'labels' =>
							array(
							'name' =>__('Professor'),
							'singular_name' =>__('Professor'),
							'menu_name' =>__('Professor'),
							'name_admin_bar' =>__('Add Section'),
							'all_items' =>__('All Section'),
							'add_new' =>__('Add Section'),
							'add_new_item' =>__('Add Section'),
							'edit_item' =>__('Edit Section'),
							'new_item' =>__('New Section'),
							'view_item' =>__('View Section'),
							'search_item' =>__('Search Section'),
						),
				'public' => true,
				'has_archive' => false,
				'rewrite' => array('slug' => 'professor'),
				'menu_position' => 4,
				'menu_icon' => 'dashicons-admin-users',
				'supports' => array('title' , 'thumbnail' , 'editor', 'excerpt')

			)
	);
}


//custom_metabox

function professor_custom_meta() {
	add_meta_box ('professor_meta', __('Others Section', 'professoratiqlab'), 'professor_meta_callback', 'professor');
}
add_action('add_meta_boxes', 'professor_custom_meta');

//field
function professor_meta_callback ($post){
	wp_nonce_field (basename(__FILE__), 'professor_nonce');
	$professor_stored_meta = get_post_meta($post->ID);
	?>
	<input type='text' name='meta-designation' id='meta-text' value='<?php if(isset( $professor_stored_meta['meta-designation'])) echo $professor_stored_meta['meta-designation'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Designation Here" >

	<input type='text' name='meta-button-text' id='meta-text' value='<?php if(isset( $professor_stored_meta['meta-button-text'])) echo $professor_stored_meta['meta-button-text'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Button Text Here" >

	<input type='text' name='meta-button-url' id='meta-text' value='<?php if(isset( $professor_stored_meta['meta-button-url'])) echo $professor_stored_meta['meta-button-url'][0]; ?>'
	style="width:100%; font-size:16px;" placeholder="Enter Button Link Here" >
	<?php
}


//save field value
function professor_meta_save($post_id) {
	//check save status
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['professor_nonce']) && wp_verify_nonce($_POST['professor_nonce'], basename(__FILE__))) ? 'true' : 'false' ;

	//Exits script depending on save status
	if($is_autosave || $is_revision || !$is_valid_nonce) {
		return;
	}
	//check for input and sanitizes/saves if needed
	if( isset($_POST['meta-designation'])){
		update_post_meta($post_id, 'meta-designation', sanitize_text_field($_POST['meta-designation']));
	}
	if( isset($_POST['meta-button-text'])){
		update_post_meta($post_id, 'meta-button-text', sanitize_text_field($_POST['meta-button-text']));
	}
	if( isset($_POST['meta-button-url'])){
		update_post_meta($post_id, 'meta-button-url', sanitize_text_field($_POST['meta-button-url']));
	}
}

add_action('save_post', 'professor_meta_save');






//custom post_type_event

add_action('init', 'event_section');

function event_section(){
		register_post_type('event',
			array(
				'labels' =>
							array(
							'name' =>__('Event'),
							'singular_name' =>__('Event'),
							'menu_name' =>__('Events'),
							'name_admin_bar' =>__('Add Event'),
							'all_items' =>__('All Events'),
							'add_new' =>__('Add Event'),
							'add_new_item' =>__('Add Event'),
							'edit_item' =>__('Edit Event'),
							'new_item' =>__('New Event'),
							'view_item' =>__('View Event'),
							'search_item' =>__('Search Event'),
						),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'event'),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-format-aside',
				'supports' => array('title' , 'thumbnail' , 'editor', 'excerpt')

			)
	);
}


//custom_metabox

function event_custom_meta() {
	add_meta_box ('event_meta', __('Others Section', 'professoratiqlab'), 'event_meta_callback', 'event');
}
add_action('add_meta_boxes', 'event_custom_meta');

//field
function event_meta_callback ($post){
	wp_nonce_field (basename(__FILE__), 'event_nonce');
	$event_stored_meta = get_post_meta($post->ID);
	?>
	<input type='text' name='meta-event-location' id='meta-text' value='<?php if(isset( $event_stored_meta['meta-event-location'])) echo $event_stored_meta['meta-event-location'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Event Location Here" >

	<input type='text' name='meta-event-time' id='meta-text' value='<?php if(isset( $event_stored_meta['meta-event-time'])) echo $event_stored_meta['meta-event-time'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Event Time Here" >

	<input type='text' name='meta-event-date' id='meta-text' value='<?php if(isset( $event_stored_meta['meta-event-date'])) echo $event_stored_meta['meta-event-date'][0]; ?>'
	style="width:100%; font-size:16px;" placeholder="Enter Event Date Here" >
	<?php
}


//save field value
function event_meta_save($post_id) {
	//check save status
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['event_nonce']) && wp_verify_nonce($_POST['event_nonce'], basename(__FILE__))) ? 'true' : 'false' ;

	//Exits script depending on save status
	if($is_autosave || $is_revision || !$is_valid_nonce) {
		return;
	}
	//check for input and sanitizes/saves if needed
	if( isset($_POST['meta-event-location'])){
		update_post_meta($post_id, 'meta-event-location', sanitize_text_field($_POST['meta-event-location']));
	}
	if( isset($_POST['meta-event-time'])){
		update_post_meta($post_id, 'meta-event-time', sanitize_text_field($_POST['meta-event-time']));
	}
	if( isset($_POST['meta-event-date'])){
		update_post_meta($post_id, 'meta-event-date', sanitize_text_field($_POST['meta-event-date']));
	}
}

add_action('save_post', 'event_meta_save');




//custom post_type_publication

add_action('init', 'publication_section');

function publication_section(){
		register_post_type('publication',
			array(
				'labels' =>
							array(
							'name' =>__('Publication'),
							'singular_name' =>__('Publication'),
							'menu_name' =>__('Publications'),
							'name_admin_bar' =>__('Add Publication'),
							'all_items' =>__('All Publications'),
							'add_new' =>__('Add Publication'),
							'add_new_item' =>__('Add Publication'),
							'edit_item' =>__('Edit Publication'),
							'new_item' =>__('New Publication'),
							'view_item' =>__('View Publication'),
							'search_item' =>__('Search Publication'),
						),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'Publication'),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-welcome-learn-more',
				'supports' => array('title' , 'thumbnail' , 'editor', 'excerpt')

			)
	);
}



//custom_metabox

function publication_custom_meta() {
	add_meta_box ('publication_meta', __('Others Section', 'professoratiqlab'), 'publication_meta_callback', 'publication');
}
add_action('add_meta_boxes', 'publication_custom_meta');

//field
function publication_meta_callback ($post){
	wp_nonce_field (basename(__FILE__), 'publication_nonce');
	$publication_stored_meta = get_post_meta($post->ID);
	?>
	<input type='text' name='meta-publication-category' id='meta-text' value='<?php if(isset( $publication_stored_meta['meta-publication-category'])) echo $publication_stored_meta['meta-publication-category'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Name of Publication Category" >

	<input type='text' name='meta-author' id='meta-text' value='<?php if(isset( $publication_stored_meta['meta-author'])) echo $publication_stored_meta['meta-author'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Name of Author/ Referance" >

	<input type='text' name='meta-year' id='meta-text' value='<?php if(isset( $publication_stored_meta['meta-year'])) echo $publication_stored_meta['meta-year'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Publication Year Here" >

	<input type='text' name='meta-website' id='meta-text' value='<?php if(isset( $publication_stored_meta['meta-website'])) echo $publication_stored_meta['meta-website'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Publisher Journal Name or Website" >

	<input type='text' name='meta-doi' id='meta-text' value='<?php if(isset( $publication_stored_meta['meta-doi'])) echo $publication_stored_meta['meta-doi'][0]; ?>'
	style="width:100%; font-size:16px;" placeholder="Enter DOI Here" >
	<?php
}


//save field value
function publication_meta_save($post_id) {
	//check save status
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['publication_nonce']) && wp_verify_nonce($_POST['publication_nonce'], basename(__FILE__))) ? 'true' : 'false' ;

	//Exits script depending on save status
	if($is_autosave || $is_revision || !$is_valid_nonce) {
		return;
	}
	//check for input and sanitizes/saves if needed
	if( isset($_POST['meta-publication-category'])){
		update_post_meta($post_id, 'meta-publication-category', sanitize_text_field($_POST['meta-publication-category']));
	}
	if( isset($_POST['meta-author'])){
		update_post_meta($post_id, 'meta-author', sanitize_text_field($_POST['meta-author']));
	}
	if( isset($_POST['meta-year'])){
		update_post_meta($post_id, 'meta-year', sanitize_text_field($_POST['meta-year']));
	}
	if( isset($_POST['meta-website'])){
		update_post_meta($post_id, 'meta-website', sanitize_text_field($_POST['meta-website']));
	}
	if( isset($_POST['meta-doi'])){
		update_post_meta($post_id, 'meta-doi', sanitize_text_field($_POST['meta-doi']));
	}
}

add_action('save_post', 'publication_meta_save');




//custom post_type_Gallery

add_action('init', 'gallery_section');

function gallery_section(){
		register_post_type('gallery',
			array(
				'labels' =>
							array(
							'name' =>__('Gallery'),
							'singular_name' =>__('Gallery'),
							'menu_name' =>__('Gallery'),
							'name_admin_bar' =>__('Add Picture'),
							'all_items' =>__('All Pictures'),
							'add_new' =>__('Add Picture'),
							'add_new_item' =>__('Add Picture'),
							'edit_item' =>__('Edit Picture'),
							'new_item' =>__('New Picture'),
							'view_item' =>__('View Picture'),
							'search_item' =>__('Search Picture'),
						),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'gallery'),
				'menu_position' => 6,
				'menu_icon' => 'dashicons-camera-alt',
				'supports' => array('title' , 'thumbnail' , 'editor', 'excerpt')

			)
	);
}
//custom post_type_thesis

add_action('init', 'thesis_section');

function thesis_section(){
		register_post_type('thesis',
			array(
				'labels' =>
							array(
							'name' =>__('Thesis'),
							'singular_name' =>__('Thesis'),
							'menu_name' =>__('Thesis'),
							'name_admin_bar' =>__('Add Thesis'),
							'all_items' =>__('All Thesis'),
							'add_new' =>__('Add Thesis'),
							'add_new_item' =>__('Add Thesis'),
							'edit_item' =>__('Edit Thesis'),
							'new_item' =>__('New Thesis'),
							'view_item' =>__('View Thesis'),
							'search_item' =>__('Search Thesis'),
						),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'thesis'),
				'menu_position' => 7,
				'menu_icon' => 'dashicons-welcome-write-blog',
				'supports' => array('title' , 'thumbnail' , 'editor', 'excerpt')

			)
	);
}


//custom_metabox

function thesis_custom_meta() {
	add_meta_box ('thesis_meta', __('Others Section', 'professoratiqlab'), 'thesis_meta_callback', 'thesis');
}
add_action('add_meta_boxes', 'thesis_custom_meta');

//field
function thesis_meta_callback ($post){
	wp_nonce_field (basename(__FILE__), 'thesis_nonce');
	$thesis_stored_meta = get_post_meta($post->ID);
	?>

	<input type='text' name='meta-thesis-author' id='meta-text' value='<?php if(isset( $thesis_stored_meta['meta-thesis-author'])) echo $thesis_stored_meta['meta-thesis-author'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Name of Author/ Referance" >

	<input type='text' name='meta-thesis-designation' id='meta-text' value='<?php if(isset( $thesis_stored_meta['meta-thesis-designation'])) echo $thesis_stored_meta['meta-thesis-designation'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Researcher Designation Here" >

	<input type='text' name='meta-thesis-year' id='meta-text' value='<?php if(isset( $thesis_stored_meta['meta-thesis-year'])) echo $thesis_stored_meta['meta-thesis-year'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Research Session" >

	<input type='text' name='meta-thesis-supervisor' id='meta-text' value='<?php if(isset( $thesis_stored_meta['meta-thesis-supervisor'])) echo $thesis_stored_meta['meta-thesis-supervisor'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Thesis Supervisor Name" >

	<input type='text' name='meta-thesis-cosupervisor' id='meta-text' value='<?php if(isset( $thesis_stored_meta['meta-thesis-cosupervisor'])) echo $thesis_stored_meta['meta-thesis-cosupervisor'][0]; ?>'
	style="width:100%; font-size:16px; margin-bottom: 15px;" placeholder="Enter Thesis Co-Supervisor Name" >

	<input type='text' name='meta-thesis-profile' id='meta-text' value='<?php if(isset( $thesis_stored_meta['meta-thesis-profile'])) echo $thesis_stored_meta['meta-thesis-profile'][0]; ?>'
	style="width:100%; font-size:16px;" placeholder="Enter Author Profile Link Here" >
	<?php
}


//save field value
function thesis_meta_save($post_id) {
	//check save status
	$is_autosave = wp_is_post_autosave($post_id);
	$is_revision = wp_is_post_revision($post_id);
	$is_valid_nonce = (isset($_POST['thesis_nonce']) && wp_verify_nonce($_POST['thesis_nonce'], basename(__FILE__))) ? 'true' : 'false' ;

	//Exits script depending on save status
	if($is_autosave || $is_revision || !$is_valid_nonce) {
		return;
	}
	//check for input and sanitizes/saves if needed
	if( isset($_POST['meta-thesis-author'])){
		update_post_meta($post_id, 'meta-thesis-author', sanitize_text_field($_POST['meta-thesis-author']));
	}
	if( isset($_POST['meta-thesis-designation'])){
		update_post_meta($post_id, 'meta-thesis-designation', sanitize_text_field($_POST['meta-thesis-designation']));
	}
	if( isset($_POST['meta-thesis-year'])){
		update_post_meta($post_id, 'meta-thesis-year', sanitize_text_field($_POST['meta-thesis-year']));
	}
	if( isset($_POST['meta-thesis-supervisor'])){
		update_post_meta($post_id, 'meta-thesis-supervisor', sanitize_text_field($_POST['meta-thesis-supervisor']));
	}
	if( isset($_POST['meta-thesis-cosupervisor'])){
		update_post_meta($post_id, 'meta-thesis-cosupervisor', sanitize_text_field($_POST['meta-thesis-cosupervisor']));
	}
	if( isset($_POST['meta-thesis-profile'])){
		update_post_meta($post_id, 'meta-thesis-profile', sanitize_text_field($_POST['meta-thesis-profile']));
	}
}

add_action('save_post', 'thesis_meta_save');
