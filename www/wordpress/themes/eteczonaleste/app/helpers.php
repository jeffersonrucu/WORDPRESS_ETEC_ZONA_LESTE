<?php

namespace App;

/**
 * Formats a text by truncating it to a maximum length and converting it to uppercase.
 *
 * @param string $text The text to be formatted.
 * @param int $maxLength The maximum length of the formatted text.
 * @return string The formatted text.
 */
function formatText($text, $maxLength)
{
    $text = (mb_strlen($text, 'UTF-8') > $maxLength) ? mb_substr($text, 0, $maxLength - 3, 'UTF-8') . "..." : $text;
    return $text;
}
