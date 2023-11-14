<?php
//データベースから取り出せているのかチェック
require('dbconnect.php');

$reservation_member = array();

$posts = $db->query("SELECT * FROM cl");
foreach($posts as $post):
?>

<p class="schedule"><?php echo htmlspecialchars($post['schedule'], ENT_QUOTES); ?></p> 
<p class="day"><?php echo htmlspecialchars($post['day'], ENT_QUOTES); ?> </p>
<?php
endforeach;
?>
