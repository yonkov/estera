<?php

/**
 * Register Blog Settings Section in the theme customizer.
 * 
 * @package Estera
 * 
 */
function estera_register_blog_theme_customizer( $wp_customize )
{
    $wp_customize->add_section( 'blog_options', array(
        'title'       => esc_html__( 'Blog Settings', 'estera' ),
        'description' => esc_html__( 'Customize the way blog posts in post archives are displayed. Display posts in multi-column layout - go pro version.', 'estera' ),
    ) );
    $wp_customize->add_setting( 'show_post_categories', array(
        'default'           => 1,
        'sanitize_callback' => 'estera_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'show_post_categories', array(
        'label'       => esc_html__( 'Show post categories', 'estera' ),
        'description' => esc_html__( 'Show the categories, associated to the post.', 'estera' ),
        'section'     => 'blog_options',
        'type'        => 'checkbox',
    ) );
    /* Show tags entry meta */
    $wp_customize->add_setting( 'show_post_tags', array(
        'default'           => 1,
        'sanitize_callback' => 'estera_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'show_post_tags', array(
        'label'       => esc_html__( 'Show post tags', 'estera' ),
        'description' => esc_html__( 'Show the tags, associated to the post.', 'estera' ),
        'section'     => 'blog_options',
        'type'        => 'checkbox',
    ) );
    /* Show Published date entry meta */
    $wp_customize->add_setting( 'show_post_date', array(
        'default'           => 1,
        'sanitize_callback' => 'estera_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'show_post_date', array(
        'label'       => esc_html__( 'Show post date', 'estera' ),
        'description' => esc_html__( 'Show the published date of the post.', 'estera' ),
        'section'     => 'blog_options',
        'type'        => 'checkbox',
    ) );
    /* Show Published date entry meta */
    $wp_customize->add_setting( 'show_post_author', array(
        'default'           => 1,
        'sanitize_callback' => 'estera_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'show_post_author', array(
        'label'       => esc_html__( 'Show post author', 'estera' ),
        'description' => esc_html__( 'Show the published date of the post.', 'estera' ),
        'section'     => 'blog_options',
        'type'        => 'checkbox',
    ) );
    $wp_customize->add_setting( 'show_post_comments', array(
        'default'           => 1,
        'sanitize_callback' => 'estera_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'show_post_comments', array(
        'label'       => esc_html__( 'Show Comments', 'estera' ),
        'description' => esc_html__( 'Display the number of comments.', 'estera' ),
        'section'     => 'blog_options',
        'type'        => 'checkbox',
    ) );
    // Add Settings and Controls for blog content.
    $wp_customize->add_setting( 'post_archives_content', array(
        'default'           => 1,
        'sanitize_callback' => 'estera_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'post_archives_content', array(
        'label'       => esc_html__( 'Blog Excerpts', 'estera' ),
        'description' => esc_html__( 'Show post excerpts instead of full content for your blog summaries', 'estera' ),
        'section'     => 'blog_options',
        'type'        => 'checkbox',
    ) );
    // Add Setting and Control for Excerpt Length.
    $wp_customize->add_setting( 'estera_excerpt_length', array(
        'default'           => 55,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'estera_excerpt_length', array(
        'label'           => esc_html__( 'Post Excerpt Length', 'estera' ),
        'section'         => 'blog_options',
        'type'            => 'number',
        'input_attrs'     => array(
        'min'  => 10,
        'max'  => 55,
        'step' => 1,
    ),
        'description'     => 'Enter a number between 10 and 55. Default is 55.',
        'active_callback' => 'estera_is_excerpt',
    ) );
}

add_action( 'customize_register', 'estera_register_blog_theme_customizer' );
function estera_blog_settings_css()
{
    $estera_post_columns = get_theme_mod( 'estera_post_columns', 'one' );
    $estera_resize_thumbs = get_theme_mod( 'resize_image_thumbnails', 'one' );
    $sidebar_layout = get_theme_mod( 'default_sidebar_layout', 'one' );
    
    if ( $estera_post_columns == 'two' ) {
        ?>

    <style type="text/css">
        .post-wrapper {
            display: flex;
            flex-wrap: wrap;
        }
        .post-wrapper article {
            width: 50%;
            padding-right: 15px;
        }

        <?php 
        
        if ( $estera_resize_thumbs ) {
            ?>

            <?php 
            
            if ( $sidebar_layout == 'two' ) {
                ?>
            .post-wrapper article img {
                height: 360px;
                object-fit: cover;
            }
            <?php 
            } else {
                ?>
            .post-wrapper article img {
                height: 260px;
                object-fit: cover;
            }
            <?php 
            }
            
            ?>

        <?php 
        }
        
        ?>
    </style>

    <?php 
    } elseif ( $estera_post_columns == "three" ) {
        ?>

    <style type="text/css">
        .post-wrapper {
            display: flex;
            flex-wrap: wrap;
        }

        .post-wrapper article {
            width: 33.33%;
            padding-right: 15px;
            flex-grow: 1;
        }

        <?php 
        
        if ( $estera_resize_thumbs ) {
            ?>

            <?php 
            
            if ( $sidebar_layout == 'two' ) {
                ?>
            .post-wrapper article img {
                height: 250px;
                object-fit: cover;
            }
            <?php 
            } else {
                ?>
            .post-wrapper article img {
                height: 180px;
                object-fit: cover;
            }
            <?php 
            }
            
            ?>

        <?php 
        }
        
        ?>

    </style>

    <?php 
    } elseif ( $estera_post_columns == "four" ) {
        ?>

    <style type="text/css">
        .post-wrapper {
            display: flex;
            flex-wrap: wrap;
        }

        .post-wrapper article {
            width: 25%;
            padding-right: 15px;
            flex-grow: 1;
        }

        <?php 
        if ( $estera_resize_thumbs ) {
            ?>
            .post-wrapper article img {
                height: 180px;
                object-fit: cover;
            }
        <?php 
        }
        ?>

    </style>

    <?php 
    }

}

add_action( 'wp_head', 'estera_blog_settings_css' );