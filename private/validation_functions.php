<?php
function isBlank($value) {
    return !isset($value) || trim($value) === '';
}

function hasLength($value, $options) {
    $length = strlen($value);
    if (isset($options['min']) && $length < $options['min']) {
        return false;
    } elseif (isset($options['max']) && $length > $options['max']) {
        return false;
    } elseif (isset($options['exact']) && $length != $options['exact']) {
        return false;
    } else {
        return true;
    }
}

function hasUniqueUsername($username, $current_id='0') {
    $user = User::findByUsername($username);
    if ($user === false || $user->id == $current_id) {
        return true;
    } else {
        return false;
    }
}
?>