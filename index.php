<?php 
include('config.php');
include('loadmore.php');
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
	<script type="text/javascript" src="script.js"></script>
</head>
<body>

</body>
</html>
<ul class="news_list">
<?php
  $query="SELECT * FROM users ORDER BY id ASC LIMIT 0 , $resultsPerPage";
  $result = mysqli_query($connect, $query);
  while($row=mysqli_fetch_array($result)){ 
        echo '<div class="container">';
        echo $row['firstname']."<br>";
        echo $row['lastname']."<br>";
        echo $row['email']."<br>";
        echo $row['gender']."<br>";
        ?><img src="<?php echo $row['picture'];?>" height='50' width='50'>
        <?php echo "</div>";
  }
?>
<li class="loadbutton"><button class="loadmore" data-page="2">Load More</button></li>
</ul>