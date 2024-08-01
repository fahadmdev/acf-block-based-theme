<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package acf_based_custom_theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head();
    ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header id="masthead" class="site-header">
            <div class="container">
                <div class="inner">
                    <div class="logo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <!-- desktop menu -->
                    <nav id="site-navigation" class="navbar__wrap d-lg-block d-none">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            )
                        );
                        ?>
                    </nav>
                    <div class="header__cta d-lg-flex align-items-center d-none">
                        <span class="search-button d-flex" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <a href="<?php echo get_option("siteurl") ?>/contact" class="header__cta--btn cta-btn">Request a Call</a>

                    </div>
                    <div class="mobile-right-menu d-lg-none">
                        <span class="search-button d-flex" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <button id="mobile__menu--button" class="mobile-menu-button--collapse d-lg-none" type="button">
                            <span class="mobile-menu-button-box">
                                <span class="mobile-menu-button-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- mobile menu -->
            <nav id="mobile__menu" class="mob__menu d-lg-none">
                <div class="container text-center">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                    
                    <div class="header__cta d-flex justify-content-center gap-3 align-items-center">
                        <a href="<?php echo get_option("siteurl") ?>/contact" class="header__cta--btn cta-btn">Request a Call </a>
                       
                    </div>
                </div>
            </nav>
        </header>
        <div class="header-padding"></div>
        <!-- #masthead -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Search <span class="fill-primary">Here </span> </h1>
                        <div class="search-form-container ">
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">


                                <input type="search" id="search-input" class="search-input" placeholder="<?php echo esc_attr_x('Search …', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />

                                <input  type="submit" id="search-button" class="search-button cta-btn" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" />
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>