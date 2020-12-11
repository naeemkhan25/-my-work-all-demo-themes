<?php
/*
Plugin Name: Philosophy Companion
Plugin URI:
Description:Companion plugin for the philosophy theme
Version: 1.0
Author: LWHH
Author URI:
License: GPLv2 or later
Text Domain: philosophy_companion
 */
function philosophy_companion_register_my_cpts_book() {

    /**
     * Post Type: Books.
     */

    $labels = [
        "name" => __( "Books", "philosophy" ),
        "singular_name" => __( "Book", "philosophy" ),
        "menu_name" => __( "My Books", "philosophy" ),
        "all_items" => __( "My books", "philosophy" ),
        "add_new" => __( "Add new", "philosophy" ),
        "add_new_item" => __( "Add new Book", "philosophy" ),
        "edit_item" => __( "Edit Book", "philosophy" ),
        "new_item" => __( "New Book", "philosophy" ),
        "view_item" => __( "View Book", "philosophy" ),
        "view_items" => __( "View Books", "philosophy" ),
        "search_items" => __( "Search Books", "philosophy" ),
        "not_found" => __( "No Books found", "philosophy" ),
        "not_found_in_trash" => __( "No Books found in trash", "philosophy" ),
        "parent" => __( "Parent Book:", "philosophy" ),
        "featured_image" => __( "Cover image for this Book", "philosophy" ),
        "set_featured_image" => __( "Set  cover image for this Book", "philosophy" ),
        "remove_featured_image" => __( "Remove featured image for this Book", "philosophy" ),
        "use_featured_image" => __( "Use as featured image for this Book", "philosophy" ),
        "archives" => __( "Book archives", "philosophy" ),
        "insert_into_item" => __( "Insert into Book", "philosophy" ),
        "uploaded_to_this_item" => __( "Upload to this Book", "philosophy" ),
        "filter_items_list" => __( "Filter Books list", "philosophy" ),
        "items_list_navigation" => __( "Books list navigation", "philosophy" ),
        "items_list" => __( "Books list", "philosophy" ),
        "attributes" => __( "Books attributes", "philosophy" ),
        "name_admin_bar" => __( "Book", "philosophy" ),
        "item_published" => __( "Book published", "philosophy" ),
        "item_published_privately" => __( "Book published privately.", "philosophy" ),
        "item_reverted_to_draft" => __( "Book reverted to draft.", "philosophy" ),
        "item_scheduled" => __( "Book scheduled", "philosophy" ),
        "item_updated" => __( "Book updated.", "philosophy" ),
        "parent_item_colon" => __( "Parent Book:", "philosophy" ),
    ];

    $args = [
        "label" => __( "Books", "philosophy" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => "note",
        "show_in_menu" => "edit.php",
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "note", "with_front" => false ],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail", "excerpt", "author" ],
        "taxonomies" => [ "category" ],
    ];

    register_post_type( "book", $args );
}

add_action( 'init', 'philosophy_companion_register_my_cpts_book' );
