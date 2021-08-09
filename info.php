<?php
include "header.php";
 ?>

<?php
$flag = 0;
if (isset($_GET['id'])){
  $rating = $_GET['id'];
  if ($rating == '5 Star' || $rating == '4 Star' || $rating == '3 Star'){
    $result = "SELECT * from hotels where type = '$rating'";
  }
  elseif ($rating == 'Dhabas' || $rating == 'Street vendors' || $rating == 'Cafes') {
    $result = "SELECT * from Restaurants where type = '$rating'";
  }
  elseif ($rating == 'Temples' || $rating == 'Parks' || $rating == 'Zoo' ||  $rating == 'Monuments') {
    $result = "SELECT * from tourist_places where type = '$rating'";
  }
  elseif ($rating == 'clubs Pubs') {
    $result = "SELECT * from clubs_pubs";
  }
  else {
    echo "0 re";
  }
  if ($obj->select($result)){
    $val = $obj->select($result);
  if ($val->num_rows > 0) {
    $flag = 1;
} else {
  echo "0 results";
}
}
}

 ?>

 <div class="jumbotron jumbotron-fluid">
 <div class="bg-light p-2">
   <h2 class="text-center display-4"><?php echo $rating; ?></h2>
   <hr>
 <div class="row">
   <?php if ($flag == 1): while($row = $val->fetch_assoc()){?>
 <div class="col-sm-2">
 <div class="card">
   <img src="images/<?php echo $row['image_name'];?>.jpg" height= "100px" class="card-img-top" alt="">
   <div class="card-body">
     <h5 class="card-title"><?php echo $row["name"]; ?></h5>
     <p class="card-text"><?php echo $row['description']; ?></p>
     <p class="lead">
    <a class="btn btn-primary btn-sm" href="<?php echo $row['map_link']; ?>" role="button" target="_blank">Book Now</a>
  </p>
   </div>
 </div>
 </div>
<?php } endif;?>
 </div>
 </div>
 </div>

 <?php include "footer.php" ?>