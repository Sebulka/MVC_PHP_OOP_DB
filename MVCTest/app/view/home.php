


<div id="cos"><?php echo $data['text']; ?></div>
<?php print_r($param); ?>


<?php $db = new DB; 
$row = $db->getRecords('users','id', 2);

echo '<br>'.$row->name;


?>