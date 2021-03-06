<?php
// Register 'card' Custom Post Type
function wpcc_post_type() {

	$labels = array(
		'name'                  => _x( 'Cards', 'Post Type General Name', 'WP_Church_Center' ),
		'singular_name'         => _x( 'Card', 'Post Type Singular Name', 'WP_Church_Center' ),
		'menu_name'             => __( 'Church Center', 'WP_Church_Center' ),
		'name_admin_bar'        => __( 'Cards', 'WP_Church_Center' ),
		'archives'              => __( 'Card Archives', 'WP_Church_Center' ),
		'attributes'            => __( 'Card Attributes', 'WP_Church_Center' ),
		'parent_item_colon'     => __( 'Parent Card:', 'WP_Church_Center' ),
		'all_items'             => __( 'All Cards', 'WP_Church_Center' ),
		'add_new_item'          => __( 'Add New Card', 'WP_Church_Center' ),
		'add_new'               => __( 'Add Card', 'WP_Church_Center' ),
		'new_item'              => __( 'New Card', 'WP_Church_Center' ),
		'edit_item'             => __( 'Edit Card', 'WP_Church_Center' ),
		'update_item'           => __( 'Update Card', 'WP_Church_Center' ),
		'view_item'             => __( 'View Card', 'WP_Church_Center' ),
		'view_items'            => __( 'View Cards', 'WP_Church_Center' ),
		'search_items'          => __( 'Search Item', 'WP_Church_Center' ),
		'not_found'             => __( 'Not found', 'WP_Church_Center' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'WP_Church_Center' ),
		'featured_image'        => __( 'Featured Image', 'WP_Church_Center' ),
		'set_featured_image'    => __( 'Set featured image', 'WP_Church_Center' ),
		'remove_featured_image' => __( 'Remove featured image', 'WP_Church_Center' ),
		'use_featured_image'    => __( 'Use as featured image', 'WP_Church_Center' ),
		'insert_into_item'      => __( 'Insert into item', 'WP_Church_Center' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'WP_Church_Center' ),
		'items_list'            => __( 'Card list', 'WP_Church_Center' ),
		'items_list_navigation' => __( 'Items list navigation', 'WP_Church_Center' ),
		'filter_items_list'     => __( 'Filter items list', 'WP_Church_Center' ),
	);
	$args = array(
		'label'                 => __( 'Card', 'WP_Church_Center' ),
		'description'           => __( 'Cards for the Church Hub', 'WP_Church_Center' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-screenoptions',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'card', $args );


if(function_exists("register_field_group"))
{


	register_field_group(array (
		'id' => 'acf_card-content',
		'title' => 'Card Content',
		'fields' => array (
		     array (
				'key' => 'field_5908a41b36dd2',
				'label' => 'Card Subtitle',
				'name' => 'wpcc_subtitle',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),

		     array (
				'key' => 'field_5994ca00ccd17',
				'label' => 'Card Type',
				'name' => 'wpcc_card_type',
				'type' => 'radio',
				'instructions' => 'What sort of Card would you like to create?',
				'required' => 1,
				'choices' => array (
					'plain' => 'Plain Card',
					'external' => 'External Link Card',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => 'plain',
				'layout' => 'horizontal',
			),

			array (
				'key' => 'field_5908a59x36dd2',
				'label' => 'External URL',
				'name' => 'wpcc_external_url',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5994ca00ccd17',
							'operator' => '==',
							'value' => 'external',
						),
					),
					'allorany' => 'all',
				),
			),
			array (
			'key' => 'field_5996c9ef1c74d',
			'label' => '',
			'name' => 'wppc_external_new_window',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5994ca00ccd17',
							'operator' => '==',
							'value' => 'external',
						),
					),
					'allorany' => 'all',
				),
			'message' => 'Load link in new window',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),

			array (
				'key' => 'field_5908a49ed36dd3',
				'label' => 'Card Content',
				'name' => 'wpcc_content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
				'conditional_logic' => array (
					'status' => 1,
					'rules' => array (
						array (
							'field' => 'field_5994ca00ccd17',
							'operator' => '==',
							'value' => 'plain',
						),
					),
					'allorany' => 'all',
				),
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'card',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'the_content',
			),
		),
		'menu_order' => 0,
	));


	register_field_group(array (
		'id' => 'acf_card-presentation',
		'title' => 'Card Presentation',
		'fields' => array (
			array (
				'key' => 'field_5908a8e2b3dab',
				'label' => 'Card Image',
				'name' => 'wpcc_image',
				'type' => 'image',
				'save_format' => 'id',
				'preview_size' => 'medium',
				'library' => 'all',
				'instructions' => 'Try and load an image at least 1000px wide'
			),
			array (
				'key' => 'field_5908a904b3dac',
				'label' => 'Highlight Color',
				'name' => 'wpcc_color',
				'type' => 'color_picker',
				'required' => 1,
				'default_value' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'card',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 2,
	));
}

}
add_action( 'init', 'wpcc_post_type', 0 );


//Flush the rewrite rules on plugin activation (and deactivation)
//This should mean that /card-name/ just works 
register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'wpcc_flush_rewrites' );
function wpcc_flush_rewrites() {
	// call your CPT registration function here (it should also be hooked into 'init')
	wpcc_post_type();
	flush_rewrite_rules(false);
}


function wpcc_get_home_center_link(){

	//Get the  Church Center Home link
	$centerHomeQuery = new WP_Query( array(
	    'post_type'  => 'page',
	    'meta_key'   => '_wp_page_template',
	    'meta_value' => 'center_home.php',
	    'orderby' 	  => 'modified',
	    'posts_per_page' => 1
	) );

	if ( $centerHomeQuery->have_posts() ) : 
		while ( $centerHomeQuery->have_posts() ) : $centerHomeQuery->the_post();
			$homeURL =  get_the_permalink(); 
		endwhile; 
		wp_reset_query();
	else: 
	    $homeURL =  get_post_type_archive_link( 'card' );
	endif;

	if ( is_admin() ) {
		return esc_html( $homeURL );
	}else{
		echo esc_html( $homeURL );
	}
	 
}