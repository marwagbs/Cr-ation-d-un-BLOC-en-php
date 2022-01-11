
<?php
$database = new PDO
	(
		'mysql:host=db.3wa.io;dbname=marwaghedamssi_Blog;charset=UTF8',
		'marwaghedamssi',
		'9df2df27a94d3e613fe34ef98318c316',
	    [
	    	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	    ]
    );

//define("DATABASE",$database);
    
?>