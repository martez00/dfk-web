<?php

function bustCache($public_file_path) {

    $public_file_path = '/' . ltrim($public_file_path, '/');
    $php_public_path = public_path();
    $file_md5 = md5_file($php_public_path . $public_file_path);

    $new_path = $public_file_path . '?v=' . $file_md5;

    return $new_path;
}