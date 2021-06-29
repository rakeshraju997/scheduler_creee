<?php

if(isset($_POST['email'])){
    
    $page         = '../client/calendar/calendar.php';
    $page_content = '';
    ob_start();
    require($page);
    $page_content = ob_get_contents();
    ob_end_clean();
    header("Content-type: application/json");
    echo json_encode($page_content);
    exit();
}