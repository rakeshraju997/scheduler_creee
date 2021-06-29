<?php 
function Wo_LoadPage($page_url = '') {
    // global $wo,$db;
    // $create_file = false;
    // if ($page_url == 'sidebar/content' && $wo['loggedin'] == true && $wo['config']['cache_sidebar'] == 1) {
    //     $file_path = './cache/sidebar-' . $wo['user']['user_id'] . '.tpl';
    //     if (file_exists($file_path)) {
    //        $get_file = file_get_contents($file_path);
    //        if (!empty($get_file)) {
    //            return $get_file;
    //        }
    //     } else {
    //         $create_file = true;
    //     }
    // }
    $page         = $page_url;
    $page_content = '';
    ob_start();
    require($page);
    $page_content = ob_get_contents();
    ob_end_clean();
    // if ($create_file == true && $wo['config']['cache_sidebar'] == 1) {
    //     $create_sidebar_file = file_put_contents($file_path, $page_content);
    //     setcookie("last_sidebar_update", time(), time() + (10 * 365 * 24 * 60 * 60));
    // }
    return $page_content;
}