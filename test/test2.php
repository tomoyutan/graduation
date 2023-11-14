<?php
require('dbconnect.php');
 $memos = $db->prepare('SELECT * FROM cl ');
$memos->execute();
$memo = $memos->fetch();

foreach($memo as $me){
print ($memo['id']);

}
?>