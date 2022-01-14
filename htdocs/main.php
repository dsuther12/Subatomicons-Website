<?php


require_once("confidential.php"); // Contains confidential API key

$channelID = "UC4AHDpDN38KZRgb16VhaiaA";

$maxResults = 1;

$apiDataPopular = @file_get_contents('https://www.googleapis.com/youtube/v3/search?part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$APIkey.'&order=viewCount'.'');

$apiDataRecent = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelID.'&maxResults='.$maxResults.'&key='.$APIkey.'');

	if($apiDataPopular)
	{
		$videoListPopular = json_decode($apiDataPopular);
	}
	else
	{
		echo "Invalid API key or Channel ID";
	}

	if($apiDataRecent)
	{
		$videoListRecent = json_decode($apiDataRecent);
	}
	else
	{
		echo "Invalid API key or Channel ID";
	}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Subatomicons</title>
	<link rel="stylesheet" href="css/styles.css">
</head>

<body>
	<header>
		<div id="main">
  		<button class="openbtn" onclick="openNav()">&#9776;</button>
		</div>
		<div id="mySidebar" class="sidebar">
 		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
 		<a href="main.php" style="text-shadow: 2px 2px white">Home</a>
  		<a href="about.php">About</a>
  		<a href="contact.php">Contact</a>
  		<a href="stats.php">Stats</a>
	</div>
	<h1>Subatomicons</h1>
	</header>
	<main>
		<div class="newestVid">
			<h2>Newest Video</h2>
	<?php

	if(!empty($videoListRecent->items)){ 
    foreach($videoListRecent->items as $item){ 
        // Embed video 
        if(isset($item->id->videoId)){ 
            echo ' 
                <iframe width="100%" height="50%" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>'; 
        } 
    }
    } 
	else
	{ 
    	echo '<p style="color:red">ERRORRRR</p>'; 
	}

	?>
		</div>
		<div class="popularVid">
			<h2>Most Viewed Video</h2>
	<?php

	if(!empty($videoListPopular->items))
	{ 
    		foreach($videoListPopular->items as $item)
    		{ 
        	// Embed video 
        		if(isset($item->id->videoId))
        		{ 
            		echo ' 
                <iframe width="100%" height="50%" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>'; 
      
    			} 
			}
	}
	else
	{ 
    	echo '<p style="color:red">ERROR</p>'; 
	}

	 ?>
		</div>
	</main>
	<script type="text/javascript" 
    src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">  
    </script>
    <script src="scripts/script.js"></script>

</body>
</html>
