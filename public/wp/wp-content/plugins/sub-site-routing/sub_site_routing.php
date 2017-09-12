<?php
/*
Plugin Name: For sub site routing.
Description: 特定ディレクトリで別テーマを使用する（Multi Device Switcherプラグインに依存）
Version: 1.0.0
*/

// テーマの値を取得する
function get_theme_value($theme_name, $value_name){
    $themes = get_themes();

    foreach ($themes as $theme_data) {
        if ($theme_data['Name'] == $theme_name) {
            return $theme_data[$value_name];
        }
    }
}

// テーマを切り替える
function swithc_theme($theme_name){
    add_filter('stylesheet', function() use ($theme_name){
        $stylesheet_path = get_theme_value($theme_name, 'Stylesheet');

        return $stylesheet_path;
    }, 999999);

    add_filter('template', function() use ($theme_name){
        $template_path = get_theme_value($theme_name, 'Template');

        return $template_path;
    }, 999999);
}

add_action('plugins_loaded', function(){
    $subsite_path_regex = "/\/sub-site/";
    $url = $_SERVER['REQUEST_URI'];

    // サブサイトのURLかどうかの判定
    if(preg_match($subsite_path_regex, $url)){
      swithc_theme('Twenty Fifteen');  //テーマの指定
    }
}, 999999);
