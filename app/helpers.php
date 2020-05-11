<?php

use App\Setting;

function bustCache($public_file_path) {

    $public_file_path = '/' . ltrim($public_file_path, '/');
    $php_public_path = public_path();
    $file_md5 = md5_file($php_public_path . $public_file_path);

    $new_path = $public_file_path . '?v=' . $file_md5;

    return $new_path;
}

function mainTeamId() {
    $mainTeamSetting = Setting::where('name', 'main_team')->first();
    return (int) $mainTeamSetting->value;
}

function currentSeasonId() {
    $currentSeasonSetting = Setting::where('name', 'current_season')->first();
    return (int) $currentSeasonSetting->value;
}

function formatTitleForSlider($title) {
    $title = wordwrap($title, 40, "<br>", false);
    return strip_tags($title, '<br>');
}