<?php

// Site header
if ( ! function_exists ( 'simpleTheme_site_header' ) ) {
    function simpleTheme_site_header() {
        echo '<div class="logo-text-con">';

        // Logo
            echo '<div class="site-logo"><a href="' . esc_url( home_url( '/' ) ) . '"><img src="'. get_template_directory_uri() . '/assets/images/logo.png" alt="logo"></a></div>';

            // Title
            if ( get_bloginfo( 'name' )  !== '' ) {
                echo '<div class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name' ) . '</a></div>';
            }

            echo '<button id="nav-icon" class="ipad-and-below" aria-label="Åben menu" aria-pressed="false" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span class="screen-reader-text">Åben eller luk menu</span>
                </button>';
            echo '</div>';
    }
}


// Content image

function simpleTheme_the_post_thumbnail() {
    $caption = get_the_post_thumbnail_caption();

    if ( is_singular( 'person' ) ) {
        echo '<div class="person-img-con">';
        if ( has_post_thumbnail() ) {
        echo '<div class="content-img person-img">';
        the_post_thumbnail( 'simpletheme-content-image' );
        if(!empty($caption)) {
            echo '<div class="img-caption">' . $caption . '</div>';
        }
        echo '</div>';
    }

    echo '<div class="person-info">';
    echo '<div class="person-info-inner">';
    the_title( '<h1>', '</h1>');
    simpleTheme_acf_person();

    echo '</div>';
    echo '</div>';
    echo '</div>';

    }

    else {

    if ( has_post_thumbnail() ) {
        echo '<div class="content-img">';
        the_post_thumbnail( 'simpletheme-content-image' );
        if(!empty($caption)) {
            echo '<div class="img-caption">' . $caption . '</div>';
        }
        echo '</div>';
    }
}

}

// Date
if ( ! function_exists ( 'simpleTheme_date' ) ) {
    function simpleTheme_date() {
        echo '<div class="simple-theme-time">';
            the_time('d/m - Y');
        echo '</div>';
    }
}

// Cat & Tags
if ( ! function_exists ( 'simleTheme_cat_tag' ) ) {
    function simleTheme_cat_tag() {
        echo '<div class="cat-tag-con small-txt">';
            echo '<span class="categories">Kategorier: </span>' . get_the_category_list( ', ' ) . '<br />';
            the_tags( '<span class="tags">Tags: </span>', ', ' );
        echo '</div>';
    }
}
// Search Results

function simpleTheme_search_results() {
    if ( have_posts() ) :
        echo '<ol class="search-results">';
            while ( have_posts() ) : the_post();
                echo '<li class="search-result-type--' . get_post_type() . '"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
            endwhile;
        echo '</ol>';
    endif;
}

// Aside Left

function simpleTheme_aside_left() {
    if ( is_page() ) :
        // ACF
        if( function_exists('acf_add_local_field_group') ):
            if( get_field('aside_left') ):
                echo '<div class="simple-theme-acf-aside-left">';
                the_field( 'aside_left' );
                echo '</div>';
            endif;
        endif;
        // end ACF
        dynamic_sidebar( 'sidebar-aside-left' );
    else :
        dynamic_sidebar( 'sidebar-aside-left-single' );
    endif;
}

// Aside Right

function simpleTheme_aside_right() {
    if ( is_page() ) :
        // ACF
        if( function_exists('acf_add_local_field_group') ):
            if( get_field('aside_right') ):
                echo '<div class="simple-theme-acf-aside-right">';
                the_field( 'aside_right' );
                echo '</div>';
            endif;
        endif;
        // end ACF
        dynamic_sidebar( 'sidebar-aside-right' );
    else :
        dynamic_sidebar( 'sidebar-aside-right-single' );
    endif;
}

// Filer - Download

function simpleTheme_download() {

if( have_rows('filer_til_download') ):
    echo '<div class="download-con flex-con g3">';
    while( have_rows('filer_til_download') ) : the_row();

        // Get parent value.
        $parent_title = get_sub_field('filer_overskrift');
        echo '<div class="filer-con flex-item">';
        echo '<p><strong>' . $parent_title . '</strong></p>';
        // Loop over sub repeater rows.
        if( have_rows('filer_filer') ):
            echo '<ul class="filer">';
            while( have_rows('filer_filer') ) : the_row();
                // Get sub value.
                $child_title = get_sub_field('sub_file');
                echo '<li><a href="' . $child_title['url'] . '" target="_blank">' . $child_title['title'] . '</a></li>';

            endwhile;
            echo '</ul>';
        endif;
        echo '</div>';
    endwhile;
    echo '</div>';
endif;

}

function simpleTheme_aside_download() {

if( have_rows('filer_til_download') ):
    echo '<div class="download-con flex-con g1">';
    while( have_rows('filer_til_download') ) : the_row();

        // Get parent value.
        $parent_title = get_sub_field('filer_overskrift');
        echo '<div class="filer-con flex-item">';
        echo '<p><strong>' . $parent_title . '</strong></p>';
        // Loop over sub repeater rows.
        if( have_rows('filer_filer') ):
            echo '<ul class="filer">';
            while( have_rows('filer_filer') ) : the_row();
                // Get sub value.
                $child_title = get_sub_field('sub_file');
                echo '<li><a href="' . $child_title['url'] . '" target="_blank">' . $child_title['title'] . '</a></li>';

            endwhile;
            echo '</ul>';
        endif;
        echo '</div>';
    endwhile;
    echo '</div>';
endif;

}

// Blog loop - Sticky posts

function simpleTheme_blog_loop() {

 $loop = new WP_Query( array( 'post__in'  => get_option('sticky_posts') ) );
    echo '<ul class="stick-posts">';
        while ( $loop->have_posts() ) : $loop->the_post();
            echo '<li class="simple-theme-sticky"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
                simpleTheme_date();
            echo '</li>';
        endwhile;
    echo '</ul>';

}

// Single class
function simpleTheme_wrap_class() {
    if ( is_active_sidebar( 'sidebar-aside-left-single' ) || is_active_sidebar( 'sidebar-aside-right-single' ) ) {
        echo "simple-grid-con space-between";
    }
}
function simpleTheme_main_class() {
    if ( is_active_sidebar( 'sidebar-aside-left-single' ) XOR is_active_sidebar( 'sidebar-aside-right-single' )  ) {
        echo "simple-grid-item-main";
    }
    if ( is_active_sidebar( 'sidebar-aside-left-single' ) ) {
        echo " order-2";
    }
    if ( is_active_sidebar( 'sidebar-aside-left-single' ) && is_active_sidebar( 'sidebar-aside-right-single' )  ) {
        echo " simple-grid-item-main-small";
    }
}
function simpleTheme_aside_class() {
    if ( is_active_sidebar( 'sidebar-aside-left-single' ) && is_active_sidebar( 'sidebar-aside-right-single' )  ) {
        echo "-small";
    }

}


// ACF Gallery

function simpleTheme_acf_gallery() {
    if( function_exists('acf_add_local_field_group') ):
        if( have_rows('galleri_box') ):
            while( have_rows('galleri_box') ): the_row();
                echo '<div class="gallery-box">';
                    // Var
                    $title = get_sub_field( 'overskrift' );
                    $text1 = get_sub_field( 'beskrivelse' );
                    $text2 = get_sub_field( 'tekst_2' );
                    $gallery = get_sub_field( 'galleri' );
                    $size = get_sub_field( 'thumbnail_type' );

                    if ( $title ) {
                        echo '<h4>' . $title . '</h4>';
                    }

                    echo $text1;

                    if( $gallery ):

                            echo '<div class="images-box ' . $size . '">';


                        foreach( $gallery as $image ):



                            echo '<figure class="gal-item">';




                            //echo wp_get_attachment_image( $image['ID'], $size );
                            if ( (strpos($image['title'], '.jpg') === false) && (strpos($image['title'], '.png') === false) ) {
                            echo '<a href="' . $image['url'] . '"' . 'data-title="' . $image['title'] . '">';
                            } else {
                                echo '<a href="' . $image['url'] . '">';
                            }
                            echo '<img src="' . $image['sizes'][$size] . '" alt="' . $image['alt'] . '" title="' . $image['title'] . '" />';
                            echo '</a>';



                            if ( (strpos($image['title'], '.jpg') === false) && (strpos($image['title'], '.png') === false) ) {
                                echo '<div class="img-title">' . $image['title'] . '</div>';
                            }

                            if ( $image['caption'] ) {
                                echo '<figcaption>' . $image['caption'] . '</figcaption>';
                            }

                            echo '</figure>';

                        endforeach;
                        echo '</div>';
                    endif;

                    echo $text2;

                echo '</div>';
            endwhile;
        endif;

    endif;
}

// ACF Person


function simpleTheme_acf_person() {
    if( function_exists('acf_add_local_field_group') ):
            echo '<ul class="person--data design-list">';
                if( get_field('titel') ) {
                    echo '<li class="title">' . get_field('titel') . '</li>';
                }
                if( get_field('mobiltelefon') ) {
                    echo '<li class="cell icon">';
                     get_template_part( 'assets/images/icon/cell' );
                    echo '<span class="data"><a href="tel:' . str_replace(' ', '',get_field('mobiltelefon')) . '">' . get_field('mobiltelefon') . '</a></span></li>';
                }
                if( get_field('telefon') ) {
                    echo '<li class="phone icon">';
                    get_template_part( 'assets/images/icon/phone' );
                    echo '<span class="data"><a href="tel:' . str_replace(' ', '',get_field('telefon')) . '">' . get_field('telefon') . '</a></span></li>';
                }
                if( get_field('email') ) {
                    echo '<li class="email icon">';
                    get_template_part( 'assets/images/icon/mail' );
                    echo '<a href="mailto:' . get_field('email') . '">Email</a></li>';
                }
                if( get_field('linkedin') ) {
                    echo '<li class="phone icon">';
                    get_template_part( 'assets/images/icon/linkedin' );
                    echo '<a href="' . get_field('linkedin') . '" target="_blank">Linkedin</a></li>';
                }
                if( get_field('facebook') ) {
                    echo '<li class="facebook icon">';
                    get_template_part( 'assets/images/icon/facebook' );
                    echo '<a href="' . get_field('facebook') . '" target="_blank">facebook</a></li>';
                }
                if( get_field('hjemmeside') && get_field('klik_tekst') ) {
                    echo '<li class="hjemmeside icon">';
                    get_template_part( 'assets/images/icon/www' );
                    echo '<a href="' . get_field('hjemmeside') . '" target="_blank">' . get_field('klik_tekst') . '</a></li>';
                }
            echo '</ul>';
            edit_post_link( __( 'edit', 'simpletheme' ), '<p>', '</p>' );
    endif;
}

function simpleTheme_acf_person_pp() {
    if( function_exists('acf_add_local_field_group') ):
        if( get_field('titel') ) {
            echo '<ul class="person--data design-list">';
                if( get_field('titel') ) {
                    echo '<li class="title">' . get_field('titel') . '</li>';
                }
            echo '</ul>';
        }
    endif;
}

// BackButton

function simpleTheme_go_back() {
    if (is_single() ):
        echo '<div class="go-back-con">';
        echo '<button onclick="goBack()" class="go-back">' . esc_html__( 'Go back', 'simpletheme' ) . '</button>';
        echo '<script>function goBack() {window.history.back();}</script>';
        echo '</div>';
endif;
}

// Copyright

function simpleTheme_copyright() {
    if( get_option('simpletheme-copyright') ):
        echo '<div class="background background-copyright">';
        echo '<div class="l-wrap l-wrap-copyright">';
        echo '<div class="copyright-con">';
        echo '&copy; copyright - ' . get_option('simpletheme-copyright') . ' | by <a href="https://www.hjemmesider.dk" target="_blank" rel="nofollow noreferrer">Hjemmesider.dk</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    endif;
}

// HTML body footer (Google analytics etc.)
function simpleTheme_html_body_footer() {
    if( get_option('simpletheme-html-bottom') ):
        echo get_option('simpletheme-html-bottom');
    endif;
}

// Site mail
function simpleTheme_mail() {
    if( get_option('simpletheme-mail') ):
        echo '<span class="icon icon-mail">';
        get_template_part( 'assets/images/icon/mail' );
        echo '<a href="mailto:' . get_option('simpletheme-mail') . '">' . get_option('simpletheme-mail') . '</a>';
        echo '</span>';
    endif;
}

// Site phone
function simpleTheme_phone() {
    if( get_option('simpletheme-phone') ):
        echo '<span class="icon icon-phone">';
        get_template_part( 'assets/images/icon/phone' );
        echo '<a href="tel:' . get_option('simpletheme-phone') . '">' . get_option('simpletheme-phone') . '</a>';
        echo '</span>';
    endif;
}

// Comments

function simpleTheme_comments() {
    foreach (get_comments() as $comment):
        echo $comment->comment_author;
        echo $comment->comment_content;
    endforeach;

    comment_form();
}

// Favicon
function sor_favicon_link() {
    echo '<link rel="shortcut icon" href="' .  get_template_directory_uri() . '/favicon.ico" />' . "\n";
}
add_action( 'wp_head', 'sor_favicon_link' );