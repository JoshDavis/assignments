<?php

require_once 'includes/db.php';

$sql = $db->query('
	SELECT id, movie_title, release_date, director
	FROM movies
	ORDER BY movie_title ASC


');

$results = $sql->fetchAll();

?><!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Movie Database</title>
    <link href="css/general.css" rel="stylesheet">
</head>

<body>

	<h1>Movie Database</h1>
	<div class="container">
		<?php foreach ($results as $movie) : ?>
		<h2><a href="single.php?id=<?php echo $movie['id'];?>">
		<?php echo $movie['movie_title']; ?></a></h2>
        <dl>
            <dt>Director</dt>
            <dd><?php echo $movie['director'];?></dd>
            
            <dt>Release Date</dt>
            <dd><?php echo $movie['release_date'];?></dd>
        </dl>
            
       
        <?php endforeach; ?>
</div>


</body>
</html>