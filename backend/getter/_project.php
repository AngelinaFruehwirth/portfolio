
<?php

function get_project_by_id(int $id): array {

    // Project Title
    $title = get_the_title($id);

    // Project Image
    $image_id = carbon_get_post_meta($id, 'image');
    $image = get_media_by_id($image_id);

    // Hero Image
    $hero_image_id = carbon_get_post_meta($id, 'hero_image');
    $hero_image = $hero_image_id
        ? get_media_by_id($hero_image_id, 'full')
        : $image;

    // Hero Title
    $hero_title = carbon_get_post_meta($id, 'hero_title');
    $hero_title = $hero_title ?: $title;

    // Project Information
    $lead = carbon_get_post_meta($id, 'lead');
    $description = carbon_get_post_meta($id, 'description');
    $credits = carbon_get_post_meta($id, 'credits');

    // Project Permalink
    $link = get_permalink($id);

    // Project Categories
    $terms = get_the_terms($id, 'project_category');

    $project_categories = is_array($terms)
        ? array_map(function($item) {
            return $item->name;
        }, $terms)
        : [];

    // Return Project Data
    return [
        'title' => $title,
        'image' => $image,
        'hero_image' => $hero_image,
        'hero_title' => $hero_title,
        'lead' => $lead,
        'description' => $description,
        'credits' => $credits,
        'project_categories' => $project_categories,
        'link' => $link,
    ];
}
