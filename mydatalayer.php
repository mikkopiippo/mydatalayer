<?php
/*
Plugin Name: My Data Layer
Plugin URI: https://github.com/mikkopiippo/mydatalayer
Description: Adds a data layer to the head of each page
License: GPL-3.0
License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
Version: 1.0
Author: Mikko Piippo
Author URI: https://www.mikkopiippo.com
*/

function mydatalayer_add_datalayer() {
    global $post;
    $categories = get_the_category($post->ID);
    $category_names = array();
    foreach($categories as $category) {
        array_push($category_names, $category->name);
    }
    $tags = get_the_tags($post->ID);
    $tag_names = array();
    if ($tags) {
        foreach($tags as $tag) {
            array_push($tag_names, $tag->name);
        }
    }
	$tag_names_flat = implode(",",$tag_names);
	$category_names_flat = implode(",",$category_names);
	
    $page_type = 'page';
    if (is_home()) {
        $page_type = 'homepage';
    } else if (is_category()) {
        $page_type = 'category';
    } else if (is_tag()) {
        $page_type = 'tag';
    } else if (is_archive()) {
        $page_type = 'archive';
    } else if (is_single()) {
        $page_type = 'post';
    }
    $post_published = get_the_date('Y-m-d', $post->ID);
    $user_login_status = is_user_logged_in();
    $user_id = get_current_user_id();

    $datalayer_variables = array(
        'post_id' => $post->ID,
        'post_title' => get_the_title(),
        'post_author' => get_the_author_meta('display_name', $post->post_author),
        'post_author_id' => $post->post_author,
        'post_categories' => $category_names_flat,
        'post_tags' => $tag_names_flat,
        'page_type' => $page_type,
        'post_published' => $post_published,
        'user_login_status' => $user_login_status,
        'user_id' => $user_id
    );
    ?>
    <script>
    dataLayer = [<?php echo json_encode($datalayer_variables); ?>];
    </script>
    <?php
}
add_action('wp_head', 'mydatalayer_add_datalayer');
