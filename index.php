<?php 
include('loadmore.php');

$search = "";
if(isset($_REQUEST["search_text"]))
{
  if($_REQUEST["search_text"] != "")
  {
    $search = $_REQUEST["search_text"]; 
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script type="text/javascript" src="script.js"></script>
</head>
<body>
 <div class="container">
   <br />
   <form id="form" name="form" method="post">
     <input type="text" name="search_text" value="<?php echo $search; ?>" id="search_text" placeholder="Search by firstname or lastname"/>
     <input type="submit" id="button_seacrh" value="search" onclick="">
     </form>
   <br />
   <div id="result"></div>
  </div>
</body>
</html>
<ul class="news_list">
<?php
  include('config.php');
  $resultsPerPage=5;
  $search = "";
  if(isset($_REQUEST["search_text"]))
  {
    if($_REQUEST["search_text"] != "")
    {
      $search = $_REQUEST["search_text"];
      $query = "SELECT * FROM users WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' LIMIT 0 , $resultsPerPage";
    }
    else
    {
     $query = "SELECT * FROM users ORDER BY id LIMIT 0 , $resultsPerPage";
    }
  }
  else
  {
    $query = "SELECT * FROM users ORDER BY id LIMIT 0 , $resultsPerPage";
  }
  
  $result = mysqli_query($connect, $query);
    while($row=mysqli_fetch_array($result)){ 
          echo '<div class="contain">';
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