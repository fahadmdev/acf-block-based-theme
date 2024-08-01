<?php
if (function_exists('acf_register_block_type')) {
    // common hero block implemetation
    acf_register_block_type(array(
        'name'              => 'hero-block',
        'title'             => __('Common Hero Block'),
        'description'       => __('A custom common-hero-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/common-blocks/common-hero-block/common-hero-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('hero_block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/common-blocks/common-hero-block/_common-hero-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/common-blocks/common-hero-block/common-hero-block.js',
        'supports'          => array(
            'renaming' => false
        ),

    ));

    //home hero block
    acf_register_block_type(array(
        'name'              => 'home-hero-block',
        'title'             => __('Home Hero Block'),
        'description'       => __('A custom home-hero-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/home-hero-block/home-hero-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('home-hero-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/home-hero-block/_home-hero-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/home-hero-block/home-hero-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //project block
    acf_register_block_type(array(
        'name'              => 'project-block',
        'title'             => __('Project Block'),
        'description'       => __('A custom project-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/project-block/project-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('project-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/project-block/_project-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/project-block/project-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    // pricing plan block
    acf_register_block_type(array(
        'name'              => 'pricingPlan-block',
        'title'             => __('Pricing Plan Block'),
        'description'       => __('A custom Pricing Plan Block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/pricing-plan-block/pricing-plan-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('pricingPlan-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/pricingPlan-block/_pricing-plan-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/pricingPlan-block/pricing-plan-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));

    //blog block
    acf_register_block_type(array(
        'name'              => 'blog-block',
        'title'             => __('Blogs Block'),
        'description'       => __('A custom Blog Block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/blogs-block/blogs-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('blog-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/blog-block/_blogs-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/blog-block/blogs-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //team block
    acf_register_block_type(array(
        'name'              => 'team-block',
        'title'             => __('Teams Block'),
        'description'       => __('A custom Team Block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/team-block/team-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('team-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/team-block/_team-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/team-block/team-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //staff Augmentation block
    acf_register_block_type(array(
        'name'              => 'staff-augmentation-block',
        'title'             => __('Staff Augmentation Block'),
        'description'       => __('A custom Team Block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/staff-augmentation-block/staff-augmentation-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('staff-augmentation-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/staff-augmentation-block/_staff-augmentation-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/staff-augmentation-block/staff-augmentation-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //contact form block
    acf_register_block_type(array(
        'name'              => 'contact-form-block',
        'title'             => __('Contact Form Block'),
        'description'       => __('A custom contact-form-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/contact-form-block/contact-form-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('contact-form-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/contact-form-block/_contact-form-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/contact-form-block/contact-form-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //common service  block
    acf_register_block_type(array(
        'name'              => 'common-cards-block',
        'title'             => __('Common Card Block'),
        'description'       => __('A custom common-cards-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/common-blocks/common-cards-block/common-cards-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('common-cards-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/common-blocks/common-cards-block/_common-cards-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/common-blocks/common-cards-block/common-cards-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //markee banner  block
    acf_register_block_type(array(
        'name'              => 'marquee-banner-block',
        'title'             => __('marquee Banner Block'),
        'description'       => __('A custom marquee-banner-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/marquee-banner-block/marquee-banner-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('markee-banner-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/marquee-banner-block/_marquee-banner-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/markee-banner-block/marquee-banner-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //newsletter banner  block
    acf_register_block_type(array(
        'name'              => 'newsletter-banner-block',
        'title'             => __('Newsletter Banner Block'),
        'description'       => __('A custom newsletter-banner-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/newsletter-banner-block/newsletter-banner-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('newsletter-banner-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/newsletter-banner-block/_newsletter-banner-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/newsletter-banner-block/newsletter-banner-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //globally service  block
    acf_register_block_type(array(
        'name'              => 'globally-service-block',
        'title'             => __('Globally Service Block'),
        'description'       => __('A custom globally-service-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/globally-service-block/globally-service-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('globally-service-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/globally-service-block/_globally-service-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/globally-service-block/globally-service-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //qoutation banner  block
    acf_register_block_type(array(
        'name'              => 'qoutation-banner-block',
        'title'             => __('Qoutation Banner Block'),
        'description'       => __('A custom qoutation-banner-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/quotation-banner-block/quotation-banner-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('qoutation-banner-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/quotation-banner-block/_quotation-banner-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/quotation-banner-block/quotation-banner-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //about feature block
    acf_register_block_type(array(
        'name'              => 'post-feature-block',
        'title'             => __('Post Feature Block'),
        'description'       => __('A custom post-feature-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/post-feature-block/post-feature-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('post-feature-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/about-feature-block/_about-feature-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/post-feature-block/post-feature-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    //releated image block
    acf_register_block_type(array(
        'name'              => 'releated-image-block',
        'title'             => __('Related Image Block'),
        'description'       => __('A custom releated-image-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/related-images-block/related-images-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('releated-image-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/related-images-block/_related-images-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/related-images-block/related-images-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
    // career join form  block
    acf_register_block_type(array(
        'name'              => 'career-join-form-block',
        'title'             => __('Career Join Form Block'),
        'description'       => __('A custom career-join-form-block.'),
        'render_template'   => get_stylesheet_directory() . '/blocks/career-join-form-block/career-join-form-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('career-join-form-block', 'quote'),
        // 'enqueue_style'     => get_stylesheet_directory_uri() . '/blocks/career-join-form-block/_career-join-form-block.scss',
        'enqueue_script'    => get_stylesheet_directory_uri() . '/blocks/career-join-form-block/career-join-form-block.js',
        'supports'          => array(
            'renaming' => false
        ),
    ));
}
