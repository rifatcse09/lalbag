<?php

session_start();
$user_id = $_SESSION['user_id'];
require_once('../functions/cls_dbconfig.php');

function __autoload($class_name) {
    require_once("../functions/$class_name.class.php");
}

$db = new DB();
$cls_item = new cls_item();
$item_id = $db->con()->real_escape_string("$_POST[item_id]");
$item_name = $db->con()->real_escape_string("$_POST[item_name]");
$item_code = $db->con()->real_escape_string("$_POST[item_code]");
$category = $db->con()->real_escape_string("$_POST[category]");
$size = 0;
$unit = $db->con()->real_escape_string("$_POST[unit]");
$description = $db->con()->real_escape_string("$_POST[description]");

echo $cls_item->update_item($item_id, $category, $item_name, $item_code, $size, $unit, $description, $user_id);
?>