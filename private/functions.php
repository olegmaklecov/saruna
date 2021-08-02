<?php
function u($str) {
    return urlencode($str);
}

function h($str) {
    return htmlspecialchars($str);
}

function displayErrors($errors) {
    $output = '';
    if (!empty($errors)) {
        $output .= '<div id="errors">';
        $output .= '<ul>';
        foreach ($errors as $error) {
            $output .= '<li>' . h($error) . '</li>';
        }
        $output .= '</ul>';
        $output .= '</div>';
    }
    return $output;
}
?>