<?php

function base_path($path) {
    return BASE_PATH . $path;
}

function email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}