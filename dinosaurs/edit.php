<?php

require_once 'includes/db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$dino_name = filter_input(INPUT_POST, 'dino_name', FILTER_SANITIZE_STRING);
$loves_meat = filter_input(INPUT_POST, 'loves_meat', FILTER_SANITIZE_NUMBER_INT);
$in_jurassic_park = (isset($POST['in_jurassic_park'])) ? 1 : 0;
$errors = array();

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD']== 'POST'){
	 if (strlen($dino_name) < 1 || strlen ($dino_name) > 256) {
		 $errors['dino_name'] = true;
	 }
	 if (!in_array('loves_meat', array(0, 1))) {
		$errors['loves_meat'] = true; 
	 }
	 
	 if (empty($errors)) {
		
		
		$sql = $db->prepare('
		
			UPDATE dinosaurs
			SET dino_name = :dino_name
			, loves_meat = :loves_meat
			, in_jurassic_park = :in_jurassic_park
			WHERE id = :id
		
		');
		$sql->bindValue(':dino_name', $dino_name, PDO::PARAM_INT);
		$sql->bindValue(':loves_meat', $loves_meat, PDO::PARAM_STR);
		$sql->bindValue(':in_jurassic_park', $in_jurassic_park, PDO::PARAM_INT);
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->execute();
		
		header('Location:index.php');
		exit;
	 }
	 
	
} else {

	 	$sql = $db->prepare('
		SELECT dino_name, loves_meat, in_jurassic_park
		FROM dinosaurs
		WHERE id = :id
		
		');
		
		$sql->bindValue(':id', $id, PDO::PARAM_INT);
		$sql->execute();
		$results = $sql->fetch();
		
		$dino_name = $results['dino_name'];
		$loves_meat = $results['loves_meat'];
		$in_jurassic_park = $results['in_jurassic_park'];

		
	 }

?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Add a Dinosaur</title>
</head>

<body>
	
   	<h1>Edit Dinosaur</h1>
		
        <form method="post" action="edit.php?id=<?php echo $id; ?>>
    
    	<div>
        	<label for="dino_name">Dinosaur Name<?php if(isset($errors['dino_name'])) : ?><strong class="error">Is Required.</strong><?php endif;?></label>
            <input id="dino_name" name="dino_name" required value="<?php echo $dino_name; ?>">
        </div>
    	
        <fieldset>
        	<legend>Relationship with meat<?php if (isset($errors['loves_meat'])) : ?><strong class="error">Is Required.</strong><?php endif; ?></legend>
        	<input type="radio" id="love" name="loves_meat" value="1" <?php if ($loves_meat == 1) : ?>checked<?php endif; ?>>
            <label for="love">Loves Meat</label>
            <input type="radio" id="hate" name="loves_meat" value="0"<?php if ($loves_meat == 0) : ?>checked<?php endif; ?>>
            <label for="hate">Hates Meat</label>
        </fieldset>
        
        <div>
        	<input type="checkbox" id="in_jurassic_park" name="in_jurassic_park"<?php if ($in_jurassic_park == 1) : ?>checked<?php endif; ?>>
            <label for="in_jurassic_park">In Jurassic Park</label>
        </div>
        
        <button type="submit">Save</button>
    
    
    
    </form>





</body>
</html>