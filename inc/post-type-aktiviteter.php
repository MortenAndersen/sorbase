<?php

// If ACF
if( function_exists('acf_add_local_field_group') ):
// Posttype aktivitet

add_action( 'init', 'simpleTheme_create_posttype_aktiviteter' );

	function simpleTheme_create_posttype_aktiviteter() {
		 register_post_type(
	    	'aktivitet',
	    	array(
	    		'labels' => array(
	    			'name' => __('Aktiviteter', 'simpletheme'),
	    			'singular_name' => __('Aktivitet', 'simpletheme')
	    		),
	    		'public' => true,
	    		'menu_icon' => 'dashicons-hammer',
	    		'supports' => array(
	    			'title',
	    			'editor',
	    			'excerpt',
	    			'thumbnail',
	    		),
	    		'show_in_rest' => true,
	    		'rewrite' => array(
	    			'slug' => 'aktivitet'
	    		),
	    	)
	    );
	}

	function simpleTheme_posttype_function_aktiviteter() {
	    simpleTheme_create_posttype_aktiviteter();
	}

	// Custom Taxonomy = 'aktiviteter'

	function custom_taxonomy_aktivitet() {

    $labels = array(
        'name'                       => _x( 'Typer', 'Taxonomy General Name', 'simpletheme' ),
        'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'simpletheme' ),
        'menu_name'                  => __( 'Type', 'simpletheme' ),
        'all_items'                  => __( 'All Items', 'simpletheme' ),
        'parent_item'                => __( 'Parent type', 'simpletheme' ),
        'parent_item_colon'          => __( 'Parent type:', 'simpletheme' ),
        'new_item_name'              => __( 'New Item Name', 'simpletheme' ),
        'add_new_item'               => __( 'Add New type', 'simpletheme' ),
        'edit_item'                  => __( 'Edit Item', 'simpletheme' ),
        'update_item'                => __( 'Update Item', 'simpletheme' ),
        'view_item'                  => __( 'View Item', 'simpletheme' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'simpletheme' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'simpletheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'simpletheme' ),
        'popular_items'              => __( 'Popular Items', 'simpletheme' ),
        'search_items'               => __( 'Search Items', 'simpletheme' ),
        'not_found'                  => __( 'Not Found', 'simpletheme' ),
        'no_terms'                   => __( 'No items', 'simpletheme' ),
        'items_list'                 => __( 'Items list', 'simpletheme' ),
        'items_list_navigation'      => __( 'Items list navigation', 'simpletheme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'show_in_rest'							=> true,

    );
    register_taxonomy( 'aktivitet-type', array( 'aktivitet' ), $args );
}

add_action( 'init', 'custom_taxonomy_aktivitet', 2 );





// Ændre archive loop på 'aktivitet-type' til orderby menu_order



function order_aktivitet_type_categories( $query ) {
    $query->set( 'orderby', 'menu_order' );
    $query->set( 'order', 'ASC' );
    return $query;
}

add_action( 'pre_get_posts', 'remove_pre_aktivitet_orderby', 10 );
function remove_pre_aktivitet_orderby( $query ) {
    if ( is_tax( 'aktiviteter-type' ) && $query->is_main_query() ) {
        remove_all_filters( 'posts_orderby' );
        add_action( 'pre_get_posts', 'order_aktivitet_type_categories', 11 );
    }
}




// Loop til page-ydleser.php - fordeling af de forskellige ydlerser
if ( ! function_exists ( 'aktivitet_type' ) ) {
    function aktivitet_type() {

        $post_type = 'aktivitet';
        $taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );

        $i = 1;

        foreach( $taxonomies as $taxonomy ) :
            $terms = get_terms( $taxonomy );
            foreach( $terms as $term ) :

              $args = array(
                'post_type' => $post_type,
                'posts_per_page' => -1,
                'tax_query' => array(
                  array(
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => $term->slug,
                  )
                )
              );

              $posts = new WP_Query($args);

                if( $posts->have_posts() ):
                echo '<div id="content" class="background background-projekt bgid-' . $i . '">';
                echo '<div class="l-wrap l-main--content">';
                echo '<div class="main">';
                    echo '<div class="aktivitet-beskrivelse">';
                        echo '<h3 class="term-name">' . $term->name . '</h3>';
                        echo '<p>' . $term->description . '</p>';
                    echo '</div>';
                    echo '<div class="simple-archive flex-con g4">';
                        while( $posts->have_posts() ) : $posts->the_post();
                            echo '<div class="flex-item">';
                                echo '<article id="post-' . get_the_ID() . '" class="' . $post_class = implode( ' ', get_post_class() ) . '"">';
                                    echo '<a href="' . get_the_permalink() . '" class="image-zoom">';
                                        if ( has_post_thumbnail() ) {
                                            echo '<div class="box-img">';
                                            the_post_thumbnail( 'small');
                                            echo '</div>';
                                        }
                                        if ( get_field('box_overskrift') ) {
                                            echo '<h4 class="post-loop-title">' . get_field('box_overskrift') . '</h4>';
                                        } else {
                                            the_title( '<h4 class="post-loop-title">', '</h4>');
                                        }
                                    echo '</a>';
                                    the_excerpt();
                                    echo '<div class="more-link-con"><a href="' . get_permalink() . '" class="more-link">' . __( 'Læs mere', 'simpletheme') . '</a></div>';
                                echo '</article>';
                            echo '</div>';
                        endwhile;
                    echo '</div>';

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;
$i++;
            endforeach;

        endforeach;
        wp_reset_query();

    }
}

// Loop hvis vi ikke benytter kategorier (type)

if ( ! function_exists ( 'aktiviteter_all' ) ) {
    function aktiviteter_all() {

        $loop = new WP_Query( array(
            'post_type' => 'aktivitet',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'asc',
        ) );
        if ( $loop->have_posts() ) {
            echo '<div class="simple-archive flex-con g4">';
            while ( $loop->have_posts() ) : $loop->the_post();
                    echo '<div class="flex-item">';
                                echo '<article id="post-' . get_the_ID() . '" class="' . $post_class = implode( ' ', get_post_class() ) . '"">';
                                    echo '<a href="' . get_the_permalink() . '" class="image-zoom">';
                                        if ( has_post_thumbnail() ) {
                                            echo '<div class="box-img">';
                                            the_post_thumbnail( 'small');
                                            echo '</div>';
                                        }
                                        if ( get_field('box_overskrift') ) {
                                            echo '<h4 class="post-loop-title">' . get_field('box_overskrift') . '</h4>';
                                        } else {
                                            the_title( '<h4 class="post-loop-title">', '</h4>');
                                        }
                                    echo '</a>';
                                    the_excerpt();
                                    echo '<div class="more-link-con"><a href="' . get_permalink() . '" class="more-link">' . __( 'Læs mere', 'simpletheme') . '</a></div>';
                                echo '</article>';
                            echo '</div>';
            endwhile;
            echo '</div>';
            wp_reset_query();
        }

    }
}

// endif ACF
endif;