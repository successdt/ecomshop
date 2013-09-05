<?php
/**
 * Your Inspiration Themes
 * 
 * @package WordPress
 * @subpackage Your Inspiration Themes
 * @author Your Inspiration Themes Team <info@yithemes.com>
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

/**
 * Add specific fields to the tab Colors -> General
 * 
 * @param array $fields
 * @return array
 */ 
function yit_tab_colors_general( $fields ) {
	
    return array_merge( $fields, array(
        80 => array(
            'id' => 'general-border-hover',
            'type' => 'colorpicker',
            'name' => __( 'Border hover color', 'yit' ),
            'desc' => __( 'Select the color of the border when is hover.', 'yit' ),
            'std' => apply_filters( 'yit_general-border-hover_std', '#464646' ),
            'style' => array(
            	'selectors' => '.portfolio-big-image .work-thumbnail .thumb-wrapper:hover, .related_project .related_img:hover, .portfolio-categories ul li:hover, #portfolio .more-link:hover, .portfolio-big-image a.more:hover, #portfolio.columns .overlay_a:hover, .showcase-thumbnail img:hover, .widget_archive ul li a:hover, .widget_nav_menu ul li a:hover, .widget_pages ul li a:hover, .widget_categories ul li a:hover, .picture_overlay:hover, .section-portfolio-classic .work-projects a.img:hover, .section-portfolio-classic .work-projects a.img.active,
#portfolio.filterable .ch-item-hover:hover, #portfolio.filterable .ch-item-opened',
            	'properties' => 'border-color'
			)
        ),
        82 => array(
            'id' => 'general-border-internal',
            'type' => 'colorpicker',
            'name' => __( 'Internal border color', 'yit' ),
            'desc' => __( 'Select the color of the internal border (where provided).', 'yit' ),
            'std' => apply_filters( 'yit_general-border-internal_std', '#ededec' ),
            'style' => array(
            	'selectors' => '.woocommerce.widget_best_sellers .border, .woocommerce.widget_best_sellers .border ul.product_list_widget li, .page-template-home-php .home-row .home-widget .widget-wrap, .page-template-home-php .home-row .home-widget .widget-wrap.widget-last, .sidebar .widget.text-image .widget-wrap,
.blog-big-image-meta > div:after, .blog-big-image-meta-single > *:after, .blog-big-image .the-content-quote blockquote:after, .woocommerce .address:after,
.the-content-list > div:after, .blog-small-image .blog-small-image-date:after, .blog-small-image-meta p, .faq-filters, .woocommerce table:after, .woocommerce table.shop_table td, .woocommerce-page table.shop_table td,
.woocommerce-account .woocommerce form:after, .woocommerce .woocommerce_checkout_coupon:after, .woocommerce .cart-collaterals .cart_totals:after, .woocommerce table.shop_table tfoot td, .woocommerce table.shop_table tfoot th, .woocommerce-page table.shop_table tfoot td, .woocommerce-page table.shop_table tfoot th,
.order-info:after,

.boxed #header-container .span12 > div.border, .boxed #header-container .span10 > div.border, .boxed #header-container .span2 > div.border, .boxed #header-container #header-cart .border',
            	'properties' => 'border-color'
			)
        ),

        170 => array(
            'id' => 'read-more-button',
            'type' => 'colorpicker',
            'name' => __( 'Read more button', 'yit' ),
            'desc' => __( 'Select the color of the Read more button.', 'yit' ),
            'std' => apply_filters( 'yit_read-more-button_std', '#605f5e' ),
            'style' => array(
                'selectors' => '.section-services-bandw .service-wrapper .service .read-more a, .not-btn.more-link, .not-btn.read-more, #portfolio .read-more, #portfolio .more-link, #respond #commentsubmit',
                'properties' => 'background-color'
            )
        ),
        180 => array(
            'id' => 'read-more-button-hover',
            'type' => 'colorpicker',
            'name' => __( 'Read more button (hover)', 'yit' ),
            'desc' => __( 'Select the color of the Read more button when is hover.', 'yit' ),
            'std' => apply_filters( 'yit_read-more-button_std', '#bc7f3e' ),
            'style' => array(
                'selectors' => '.section-services-bandw .service-wrapper .service .read-more a:hover, .not-btn.more-link:hover, .not-btn.read-more:hover, #portfolio .read-more:hover, #portfolio .more-link:hover, #respond #commentsubmit:hover',
                'properties' => 'background-color'
            )
        ),
        190 => array(
            'id' => 'general-button-bg',
            'type' => 'colorpicker',
            'name' => __( 'General buttons background', 'yit' ),
            'desc' => __( 'Set background color for all general buttons.', 'yit' ),
            'std' => apply_filters( 'yit_read-more-button_std', '#BC7F3E' ),
            'style' => array(
                'selectors' => '.teaser .image p, .teaser .image p a, .yit_quick_contact .contact-form li.submit-button input.sendmail, .sidebar .cta .newsletter-submit .submit-field, #footer .cta .newsletter-submit .submit-field, .home-widget .newsletter-call3 .newsletter-submit .submit-field',
                'properties' => 'background-color'
            )
        ),
        200 => array(
            'id' => 'general-button-bg-hover',
            'type' => 'colorpicker',
            'name' => __( 'General buttons background (hover)', 'yit' ),
            'desc' => __( 'Set background color for all general buttons (on hover).', 'yit' ),
            'std' => apply_filters( 'yit_read-more-button_std', '#E79C0C' ),
            'style' => array(
                'selectors' => '.teaser .image p:hover, .teaser .image p a:hover, .yit_quick_contact .contact-form li.submit-button input.sendmail:hover, .sidebar .cta .newsletter-submit .submit-field:hover, #footer .cta .newsletter-submit .submit-field:hover, .home-widget .newsletter-call3 .newsletter-submit .submit-field:hover',
                'properties' => 'background-color'
            )
        ),
        210 => array(
            'id' => 'general-button-text',
            'type' => 'colorpicker',
            'name' => __( 'General buttons background', 'yit' ),
            'desc' => __( 'Set text color for all general buttons.', 'yit' ),
            'std' => apply_filters( 'yit_read-more-button_std', '#FFFFFF' ),
            'style' => array(
                'selectors' => '.teaser .image p, .teaser .image p a, .yit_quick_contact .contact-form li.submit-button input.sendmail, .sidebar .cta .newsletter-submit .submit-field, #footer .cta .newsletter-submit .submit-field, .home-widget .newsletter-call3 .newsletter-submit .submit-field',
                'properties' => 'color'
            )
        ),
        220 => array(
            'id' => 'general-button-text-hover',
            'type' => 'colorpicker',
            'name' => __( 'General buttons background (hover)', 'yit' ),
            'desc' => __( 'Set text color for all general buttons (on hover).', 'yit' ),
            'std' => apply_filters( 'yit_read-more-button_std', '#FFFFFF' ),
            'style' => array(
                'selectors' => '.teaser .image p:hover, .yit_quick_contact .contact-form li.submit-button input.sendmail:hover, .sidebar .cta .newsletter-submit .submit-field:hover, #footer .cta .newsletter-submit .submit-field:hover, .home-widget .newsletter-call3 .newsletter-submit .submit-field:hover',
                'properties' => 'color'
            )
        ),
        240 => array(
            'id'   => 'back-top-background',
            'type' => 'colorpicker',
            'name' => __( 'Back to Top background', 'yit' ),
            'desc' => __( 'Select the color to use for Back to Top background. ', 'yit' ),
            'std'  => apply_filters( 'yit_back-top-background_std', '#93866d' ),
            'style' => apply_filters( 'yit_back-top-background_style', array(
                'selectors' => '#back-top',
                'properties' => 'background-color'
            ) )
        )
    ) );
}
add_filter( 'yit_submenu_tabs_theme_option_colors_general', 'yit_tab_colors_general' );

add_filter( 'yit_general-border_std', create_function( '', 'return "#d3d2d2";' ) );
function yit_general_border_style( $array ) {
    $array['selectors'] = 'code, pre, body hr, #copyright .inner, #footer .inner, .gallery img, .gallery img, .content .archive-list ul, .content .archive-list ul li, 
.more-projects-widget .work-thumb, .more-projects-widget .controls, .more-projects-widget .top, .featured-projects-widget img,
.thumb-project img, #searchform input, .portfolio-categories ul li, .portfolio-categories ul li:hover, .recent-comments .avatar img,
.content .contact-form li.submit-button input, #portfolio .read-more, #portfolio .more-link, #portfolio .read-more:hover,
#portfolio .more-link:hover, .accordion-title, .accordion-item-thumb img, form input[type="text"], form textarea, .testimonial-page,
div.section-caption .caption, .line, .last-tweets-widget ul li, .toggle p.tab-index, .toggle .content-tab, .testimonial,
.google-map-frame, .section.blog .post, .section.blog h4.other-articles, .section.blog .sticky .thumbnail, .section .portfolio-sticky .work-categories,
.testimonial, #searchform input, .blog-big .meta p, .blog-big p.list-tags, .blog-small .image-wrap, .comment-container, .image-square-style #comments img.avatar,
#comments .comment-author img, .comment-meta, #respond input, #respond textarea, img.comment-avatar, .portfolio-big-image a.thumb, .portfolio-big-image a.more,
.portfolio-big-image a.more:hover, .portfolio-big-image .work-thumbnail a.nozoom, .portfolio-big-image .work-skillsdate, .internal_page_item, .gallery-wrap li h5,
.gallery-filters, .portfolio-full-description a.thumb, .portfolio-full-description a.more, .portfolio-full-description a.more:hover,
.portfolio-full-description .work-skillsdate, .related_img, #portfolio.columns .overlay_a, .yit-widget-content .widget,
.slider.thumbnails .showcase-thumbnail img, .slider.thumbnails .showcase-thumbnail img:hover, .slider.thumbnails .showcase-thumbnail.active img,
.recent-post .thumb-img img, .widget_archive ul li a, .widget_archive ul li a:hover, .widget_nav_menu ul li a, .widget_nav_menu ul li a:hover,
.widget_pages ul li a, .widget_pages ul li a:hover, .widget_categories ul li a, .widget_categories ul li a:hover, #searchform input,
.widget_flickrRSS img, .widget_nav_menu ul li a, .widget_pages ul li a, .widget_categories ul li a, .widget_archive ul li a:hover,
.widget_nav_menu ul li.current_page_item > a, .widget_pages ul li.current_page_item > a, .widget_categories ul li.current_page_item > a,
.testimonial-widget div.name-testimonial, .last-tweets-widget ul li, .yit-widget-content .widget, .portfolio-categories ul li, .recent-comments .avatar img,
.more-projects-widget .work-thumb, .more-projects-widget .controls, .more-projects-widget .top, .featured-projects-widget img, .thumb-project img, .picture_overlay,
#respond textarea:focus, .section-portfolio-classic .work-projects a.img, .border, #header-cart-search .cart-items, #header-cart-search .cart-subtotal,
#header-cart-search .widget_shopping_cart .cart_control, #nav .container, .sitemap h3, .woocommerce.archive .sidebar .widget h3, #copyright .border,
#topbar .widget_search_mini, .topbar-border, .faq-filters-container, .woocommerce .cart-collaterals .cart_totals,
.woocommerce table, .woocommerce table.shop_table, .woocommerce-page table.shop_table, .ie_border, .woocommerce form.login,
.woocommerce .woocommerce_checkout_coupon, .woocommerce form.register, .woocommerce-page form.login, .woocommerce-page .woocommerce_checkout_coupon, .woocommerce-page form.register,
.woocommerce-account .woocommerce form, .woocommerce .address,
.woocommerce div.product .product_title,
.single-layout-2.woocommerce div.product div.images img, .woocommerce div.product div.images .thumbnails img, .single-layout-2.woocommerce .woocommerce-tabs ul.tabs
#primary .woocommerce div.product table.variations, .woocommerce div.product table.variations td, .blog-big-image-meta > div, .blog-big-image-meta p,
.single-product.woocommerce div.product .related-products h2, .woocommerce .content #page-meta, .single-product.woocommerce div.product div.images .thumbnails img,

.single-product.woocommerce div.product table.variations td, .single-product.woocommerce div.product .single_variation_wrap span.label, .single-product.woocommerce div.product .single_variation_wrap span.value,
.woocommerce table:after, .woocommerce-page .woocommerce_checkout_coupon:after, .woocommerce .woocommerce_checkout_coupon:after, .woocommerce .address:after, .woocommerce-account .woocommerce form:after, .woocommerce form.checkout_coupon:after,
.single-product.woocommerce div.product .product_title, .single-product.woocommerce div.product .related.products h2,

.team-professional ul li .padding, .blog-big-image-meta > div, .blog-big-image-meta-single > div, .blog-big-image .the-content-quote blockquote, .the-content-list > div,
.thumb-img img, .recent-post .thumb-img img, .sidebar .recent-post .thumb-img img, .recent-post .thumb-img img, .blog-big-ribbon .thumbnail, .blog-small-ribbon .thumbnail,
.single-post .blog-big-ribbon .the-content p:last-child, #portfolio.filterable .ch-item, .error404 .border-img-bottom, .error404 .error-404-text, .error404 .error-404-search, .error-404-search input#s,
.faq-title, .recent-post .hentry-post, .toggle h4.tab-index,


.blog-big-image-meta > div:after, .blog-big-image .blog-big-image-date:after, .blog-big-image .post-title, .teaser .image img, ul.filters, #map .view-map a,

.woocommerce ul.products li.product.grid.classic.with-border a.thumb,

div.yit_quick_contact, .woocommerce ul.cart_list li, .woocommerce-page ul.cart_list li, .woocommerce ul.product_list_widget li,
.woocommerce-page ul.product_list_widget li, .woocommerce.widget_best_sellers, .sidebar .recent-post .hentry-post,
.sidebar .recent-comments .border, .testimonial-widget li blockquote, .almost-all-categories ul > li, .sidebar .home-widget.contact-info ul li, .sidebar .widget.contact-info ul li,
#footer .widget.contact-info ul li, .yit_toggle_menu ul.menu li a, .widget.widget_layered_nav li, .widget_product_categories .product-categories li,
.widget.widget_layered_nav li small.count, .widget_product_categories .product-categories li span.count,

.page-template-home-php .home-row .home-widget .widget-wrap:before, .page-template-home-php .home-row .home-widget .widget-wrap.widget-last:before,
.sidebar .widget.text-image .widget-wrap:before,

.boxed #header-container .innerborder,
.boxed #header-cart:after';
    return $array;
}
add_filter( 'yit_general-border_style', 'yit_general_border_style' );

add_filter( 'yit_general-border-hover_std', create_function( '', 'return "#cccccc";' ) );

function yit_container_background_style( $array ) {
    $array['selectors'] = '.boxed #wrapper';    
    return $array;
}
add_filter( 'yit_container-background_style', 'yit_container_background_style' );


