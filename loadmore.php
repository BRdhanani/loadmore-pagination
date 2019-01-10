<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

</body>
</html>
<?php
$resultsPerPage=4;
	if(isset($_POST['page'])):
 	$paged=$_POST['page'];
	$sql="SELECT * FROM users ORDER BY id ASC";
	if($paged>0){
	       $page_limit=$resultsPerPage*($paged-1);
	       $pagination_sql=" LIMIT  $page_limit, $resultsPerPage";
	       }
	else{
	$pagination_sql=" LIMIT 0 , $resultsPerPage";
	}

	$result=mysqli_query($connect,$sql.$pagination_sql);

	$num_rows = mysqli_num_rows($result);
	while($row=mysqli_fetch_array($result)){echo '<div class="container">';
		echo $row['firstname']."<br>";
        echo $row['lastname']."<br>";
        echo $row['email']."<br>";
        echo $row['gender']."<br>";?>
        <img src="<?php echo $row['picture'];?>" height='50' width='50'>
        <?php echo "</div>";
      }
	
	if($num_rows == $resultsPerPage){?>
 	<li class="loadbutton"><button class="loadmore" data-page="<?php echo  $paged+1 ;?>">Load More</button></li>
 <?php 
  }else{
  	echo '<label class="data" align="center">No More Data to Load</label>';
 }
  endif;
   ?>
