<?php

use \Roots\Acorn\Application;

function getFilteredCourses() {
    $taxQuery = [];

    if (isset($_GET['term']) && $_GET['term'] !== '') {
        $taxQuery[] = [
            'taxonomy' => 'format',
            'field' => 'id',
            'terms' => $_GET['term'],
        ];
    }

    $args = [
        'post_type' => 'cursos',
        'posts_per_page' => -1,
    ];

    if (!empty($taxQuery)) {
        $args['tax_query'] = $taxQuery;
    }

    $posts = get_posts($args);

    // Renderizar a visualização Blade e retornar o HTML
    return wp_send_json([
        'html' => view('partials.list-courses', ['posts' => $posts])->render(),
    ]);
}

add_action('wp_ajax_nopriv_get_fieltered_courses', 'getFilteredCourses');
add_action('wp_ajax_get_fieltered_courses', 'getFilteredCourses');
