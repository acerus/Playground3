<?php
/*
Plugin Name: Social Bet
Plugin URI:
Description:
Author: Paul Fedorov
Version: 1.0
Author URI: http://paulfedorov.ru
*/


// Register Custom Post Type Bets{
function bets_register() {

	$labels = array(
		'name'                  => _x( 'Bets', 'Post Type General Name', 'bets_lang' ),
		'singular_name'         => _x( 'Bet', 'Post Type Singular Name', 'bets_lang' ),
		'menu_name'             => __( 'Bets', 'bets_lang' ),
		'name_admin_bar'        => __( 'Bets', 'bets_lang' ),
		'archives'              => __( 'Bets Archives', 'bets_lang' ),
		'all_items'             => __( 'All Bets', 'bets_lang' ),
		'add_new_item'          => __( 'Add New bet', 'bets_lang' ),
		'add_new'               => __( 'Add New Bet', 'bets_lang' ),
		'new_item'              => __( 'New bet', 'bets_lang' ),
		'edit_item'             => __( 'Edit bet', 'bets_lang' ),
		'update_item'           => __( 'Update bet', 'bets_lang' ),
		'view_item'             => __( 'View bet', 'bets_lang' ),
		'view_items'            => __( 'View bets', 'bets_lang' ),
		'not_found'             => __( 'Not found', 'bets_lang' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'bets_lang' ),
		'featured_image'        => __( 'Featured Image', 'bets_lang' ),
		'set_featured_image'    => __( 'Set featured image', 'bets_lang' ),
		'remove_featured_image' => __( 'Remove featured image', 'bets_lang' ),
		'use_featured_image'    => __( 'Use as featured image', 'bets_lang' ),
	);
	$rewrite = array(
		'slug'                  => 'bets',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true
	);

  $capabilities = array(
  		'edit_post'             => 'edit_sb_bet',
  		'read_post'             => 'read_sb_bet',
  		'delete_post'           => 'delete_sb_bet',
  		'edit_posts'            => 'edit_sb_bets',
  		'edit_others_posts'     => 'edit_others_sb_bets',
  		'publish_posts'         => 'publish_sb_bets',
  		'read_private_posts'    => 'read_private_sb_bets',
       'edit_published_posts' => 'edit_published_sb_bets',
			 'delete_others_posts' => 'delete_others_sb_bets',
			 'delete_private_posts' => 'delete_private_sb_bets',
			 'delete_published_posts' => 'delete_published_sb_bets'
  	);

	$args = array(
		'label'                 => __( 'Bet', 'bets_lang' ),
		'description'           => __( 'bets for everyone', 'bets_lang' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields', ),
		'taxonomies'            => array( 'bet_type', 'bet_status' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-tickets-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capabilities'          => $capabilities,
		'map_meta_cap'        => true,
		'show_in_rest'          => true,
	);
	register_post_type( 'bets', $args );

}
add_action( 'init', 'bets_register', 0 );


// Register Custom Taxonomy Bets' Types
function bet_types_function() {

	$labels = array(
		'name'                       => _x( 'Bet Types', 'Taxonomy General Name', 'bets_lang' ),
		'singular_name'              => _x( 'Bet Type', 'Taxonomy Singular Name', 'bets_lang' ),
		'menu_name'                  => __( 'Bet Types', 'bets_lang' ),
		'all_items'                  => __( 'All Bet Types', 'bets_lang' ),
		'new_item_name'              => __( 'New Bet Type', 'bets_lang' ),
		'add_new_item'               => __( 'Add New Bet Type', 'bets_lang' ),
		'edit_item'                  => __( 'Edit Bet Type', 'bets_lang' ),
		'update_item'                => __( 'Update Bet Type', 'bets_lang' ),
		'view_item'                  => __( 'View Bet Type', 'bets_lang' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'bets_lang' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'bets_lang' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'bets_lang' ),
		'popular_items'              => __( 'Popular Bet Types', 'bets_lang' ),
		'search_items'               => __( 'Search Bet Types', 'bets_lang' ),
		'not_found'                  => __( 'Not Found', 'bets_lang' ),
		'no_terms'                   => __( 'No items', 'bets_lang' ),
		'items_list'                 => __( 'Items list', 'bets_lang' ),
		'items_list_navigation'      => __( 'Items list navigation', 'bets_lang' ),
	);

	$capabilities = array(
		'manage_terms'               => 'manage_sb_types',
		'edit_terms'                 => 'edit_sb_types',
		'delete_terms'               => 'delete_sb_types',
		'assign_terms'               => 'assign_sb_types',
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => 'btype',
		'show_in_rest'               => true,
		'capabilities'               => $capabilities,
	);
	register_taxonomy( 'bet_type', array( 'bets' ), $args );

}
add_action( 'init', 'bet_types_function', 0 );


/* adding default type terms */
function first_insert_terms() {

    $terms = array(
        'express' => 'Экспресс',
        'ordinar' => 'Ординар',
    );

    foreach($terms as $key=>$name){
        if( ! term_exists( $key ) ){
                wp_insert_term(
                    $name,
                    'bet_type',
                    array(
                        'slug' => $key,
                    )
                );
        }
    }
}
add_action( 'init', 'first_insert_terms', 5 );


// Register Custom Taxonomy for Bets Statuses
function bet_status_function() {

	$labels = array(
		'name'                       => _x( 'Bet Status', 'Taxonomy General Name', 'bets_lang' ),
		'singular_name'              => _x( 'Bet Status', 'Taxonomy Singular Name', 'bets_lang' ),
		'menu_name'                  => __( 'Bet Statuses', 'bets_lang' ),
		'all_items'                  => __( 'All Bet Statuses', 'bets_lang' ),
		'new_item_name'              => __( 'New Bet Status', 'bets_lang' ),
		'add_new_item'               => __( 'Add New Bet Status', 'bets_lang' ),
		'edit_item'                  => __( 'Edit Bet Status', 'bets_lang' ),
		'update_item'                => __( 'Update Bet Status', 'bets_lang' ),
		'view_item'                  => __( 'View Bet Status', 'bets_lang' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'bets_lang' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'bets_lang' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'bets_lang' ),
		'popular_items'              => __( 'Popular Bet Statuses', 'bets_lang' ),
		'search_items'               => __( 'Search Bet Status', 'bets_lang' ),
		'not_found'                  => __( 'Not Found', 'bets_lang' ),
		'no_terms'                   => __( 'No items', 'bets_lang' ),
		'items_list'                 => __( 'Items list', 'bets_lang' ),
		'items_list_navigation'      => __( 'Items list navigation', 'bets_lang' ),
	);

	$capabilities = array(
		'manage_terms'               => 'manage_sb_statuses',
		'edit_terms'                 => 'edit_sb_statuses',
		'delete_terms'               => 'delete_sb_statuses',
		'assign_terms'               => 'assign_statuses',
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => 'bstatus',
		'show_in_rest'               => true,
		'capabilities'               => $capabilities,
	);
	register_taxonomy( 'bet_status', array( 'bets' ), $args );

}
add_action( 'init', 'bet_status_function', 0 );


/* adding default type terms */
function second_insert_terms() {

    $terms = array(
        'win' => 'Выигрыш',
        'lose' => 'Проигрыш',
        'return' => 'Возврат',
        'active' => 'Активная',
    );

    foreach($terms as $key=>$name){
        if( ! term_exists( $key ) ){
                wp_insert_term(
                    $name,
                    'bet_status',
                    array(
                        'slug' => $key,
                    )
                );
        }
    }
}
add_action( 'init', 'second_insert_terms', 5 );

/* Adding Capper Role */
function add_capper_role() {
 add_role('capper_role',
            'Каппер',
            array(
              'read' => true,
              'read_sb_bet' => true,
              'edit_sb_bets' => true,
              'edit_sb_bet' => true,
              'publish_sb_bets' => true,
              'delete_published_sb_bets' => true,
							'edit_published_sb_bets' => true,
							'manage_sb_types' => true,
							'assign_sb_types' => true,
							'manage_sb_statuses' => true,
							'assign_statuses' => true,

            )
        );
   }

  register_activation_hook( __FILE__, 'add_capper_role' );

/* Adding Moderator Role */
function add_moderator_role() {
 add_role('sb_moderator_role',
            'Модератор',
            array(
              'read' => true,
              'read_sb_bet' => true,
              'edit_sb_bets' => true,
              'edit_sb_bet' => true,
              'publish_sb_bets' => true,
              'delete_published_sb_bets' => true,
                            'edit_published_sb_bets' => true,
                            'manage_sb_types' => true,
                            'edit_sb_types' => true,
                            'delete_sb_types' => true,
                            'assign_sb_types' => true,
                            'edit_others_sb_bets' => true,



            )
        );
}

register_activation_hook( __FILE__, 'add_moderator_role' );


/* Assigning new capabilities to default roles and moderator */
add_action('admin_init','sb_add_role_caps',999);
function sb_add_role_caps() {

		 $roles = array('editor','administrator', 'sb_moderator_role');
		 foreach($roles as $the_role) {

		      $role = get_role($the_role);

		              $role->add_cap( 'read' );
		              $role->add_cap( 'read_sb_bet');
		              $role->add_cap( 'read_private_sb_bets' );
		              $role->add_cap( 'edit_sb_bet' );
		              $role->add_cap( 'edit_sb_bets' );
		              $role->add_cap( 'edit_others_sb_bets' );
		              $role->add_cap( 'edit_published_sb_bets' );
		              $role->add_cap( 'publish_sb_bets' );
		              $role->add_cap( 'delete_others_sb_bets' );
		              $role->add_cap( 'delete_private_sb_bets' );
		              $role->add_cap( 'delete_published_sb_bets' );
		  						$role->add_cap('manage_sb_types');
									$role->add_cap('edit_sb_types');
									$role->add_cap('delete_sb_types');
									$role->add_cap('assign_sb_types');
									$role->add_cap('manage_sb_statuses');
									$role->add_cap('edit_sb_statuses');
									$role->add_cap('delete_sb_statuses');
									$role->add_cap('assign_statuses');

		 }
		 };

 add_action('plugins_loaded', 'sb_load_textdomain');
 function sb_load_textdomain() {
    load_plugin_textdomain( 'bets_lang', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
 }


 /*ajax button */
function update_bets_count() {

      $post_id = intval( $_GET['post_id'] );

      if( filter_var( $post_id, FILTER_VALIDATE_INT ) ) {

        $article = get_post( $post_id );
        $output_count = 0;

        if( !is_null( $article ) ) {
            $count = get_post_meta( $post_id, '_bet_vote', true );
            if( $count == '' ) {
                update_post_meta( $post_id, '_bet_vote', '1' );
                $output_count = 1;
            } else {
                $n = intval( $count );
                $n++;
                update_post_meta( $post_id, '_bet_vote', $n );
                $output_count = $n;
            }
        }

      }
      $output = array( 'count' => $output_count );
      echo json_encode( $output );
      exit();
 }

 add_action( 'wp_ajax_my_update_votes', 'update_bets_count' );
 add_action( 'wp_ajax_nopriv_my_update_votes', 'update_bets_count' );

 function display_post_likes( $post_id = null ) {
    $value = '';
    if( is_null( $post_id ) ) {
        global $post;
        $value = get_post_meta( $post->ID, '_bet_vote', true );

    } else {
        $value = get_post_meta( $post_id, '_bet_vote', true );
    }

    echo $value;
 }


?>
