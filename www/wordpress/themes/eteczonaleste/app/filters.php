<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Leia Mais" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' ... <a href="%s">%s</a>', get_permalink(), __('Leia Mais', 'sage'));
});
