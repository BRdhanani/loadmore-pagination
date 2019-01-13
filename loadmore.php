<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body></body>
</html>
<?php

	$resultsPerPage=4;
	if(isset($_POST['page']))
	{ 
	 	$paged=$_POST['page'];
	 	//$search = mysqli_real_escape_string($connect, $_POST["page"]);
		  if($_POST['search'] != "")
		  {
		    $search = $_POST["search"];
		    $page="SELECT * FROM users WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' ORDER BY id ASC";
		    if($paged > 0)
		    {
		      $page_limit=$resultsPerPage*($paged-1);
		      $pagination_sql=" LIMIT  $page_limit, $resultsPerPage";
		    }
		    else
		    {
		      $pagination_sql=" LIMIT 0 , $resultsPerPage";
		    }
		  }
		  else
		  {
		    $page="SELECT * FROM users  ORDER BY id ASC";
		    if($paged > 0)
		    {
		      $page_limit=$resultsPerPage*($paged-1);
		      $pagination_sql=" LIMIT  $page_limit, $resultsPerPage";
		    }
		    else
		    {
		      $pagination_sql=" LIMIT 0 , $resultsPerPage";
		    }
		  }    
			$result=mysqli_query($connect,$page.$pagination_sql);
			while($row = mysqli_fetch_array($result))
			 {
			 		echo '<div class="contain">';
			  		echo $row['firstname']."<br>";
			        echo $row['lastname']."<br>";
			        echo $row['email']."<br>";
			        echo $row['gender']."<br>";
			        ?><img src="<?php echo $row['picture'];?>" height='50' width='50'>
			  <?php echo "</div>";
		 	}
				$num_rows = mysqli_num_rows($result);

			
				if($num_rows == $resultsPerPage){
?>
			 	<li class="loadbutton"><button class="loadmore" data-page="<?php echo  $paged+1 ;?>">Load More</button></li>
<?php 
			  }
			  else
			  {
			  	echo '<center><b>No More Data to Load</b></center>';
			  }
	}
?>
