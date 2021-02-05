<?php 
include('scripts/config.php');
error_reporting(0);

?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>cardio | hallist</title>
<!-- Style -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/fonts/icomoon/style.css">
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link href="assets/css/fontawesome.css" rel="stylesheet">
<link href="assets/css/brands.css" rel="stylesheet">
<link href="assets/css/solid.css" rel="stylesheet">
<!-- Scripts -->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</head>
<body>
<?php include('assets/header.php');?>

<section class="container">
 <div class="py-5">
	<div class="py-4">
	</div>
 </div>
	<div class="container-xl">
	   <div class="row">
		  <div class="col-md-9 col-md-push-3 order-lg-1">
<?php
$sport=$_POST['sport'];
$sql = "SELECT dbhall.*,dbsport.sportname,dbsport.id as sid from dbhall join dbsport on dbsport.id=dbhall.sport where dbhall.sport=:sport";
$query = $dbh -> prepare($sql);
$query -> bindParam(':sport',$sport, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
			 <ul class="list-unstyled">
			 <li class="media py-2">
				<img class="mr-5 rounded" width="250" src="assets/img/<?php echo htmlentities($result->image);?>"/>
				<div class="media-body align-self-center">
				   <h5 class="mt-0 mb-1 font-weight-bold"><a class="text-dark" href="hall-details.php?hid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->hallname);?></a></h5>
				   <p class="text-dark mb-0 py-1 small text-muted mr-2"><i class="fas fa-biking"></i>  Sport: <?php echo htmlentities($result->sportname);?></p>
				   <p class="text-dark mb-0 py-1 small text-muted mr-2"><i class="fas fa-users"></i>  Capacity: <?php echo htmlentities($result->capacity);?></p>
				   <p class="text-dark mb-0 py-1 small text-muted mr-2"><i class="fas fa-map-marker-alt"></i>  City: <?php echo htmlentities($result->city);?></p>
				   <div class="d-flex align-items-center justify-content mt-1">
					  <h6 class="font-weight-bold my-2"><?php echo htmlentities($result->price);?>$ Per hour</span></h6>
				   </div>
				   <a href="hall-details.php?hid=<?php echo htmlentities($result->id);?>" class="col-sm-3 float-right btn text-white btn-block btn-primary">View Details</a>
				</div>
			 </li>
			 <?php }} ?>
		  </div>
		  <aside class="col-md-3 col-md-pull-9">
				   <h5><i class="fa fa-filter" aria-hidden="true"></i> Filter </h5>
				   <form action="searchhall.php" method="post">
					  <div class="form-group select">
						 <select class="form-control" name="sport">
							<option>Select sport</option>
<?php $sql = "SELECT * from  dbsport order by sportname ASC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{       ?>
							<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->sportname);?></option>
							<?php }} ?>
						 </select>
					  </div>
					  <div class="form-group">
						 <button type="submit" class="btn text-white btn-block btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Search facilities</button>
					  </div>
				   </form>
				   <a href="halllist.php"<button type="button" class="btn text-white btn-block btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Reset</button></a>
			 <div class="mt-4">
				   <h5><i class="fa fa-futbol" aria-hidden="true"></i> Recently added facilities</h5>
				   <ul class="list-unstyled px-2 py-2">
<?php $sql = "SELECT dbhall.*,dbsport.sportname,dbsport.id as sid from dbhall join dbsport on dbsport.id=dbhall.sport order by id desc limit 4";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
					  <li class="media-sm py-2 border-top border-secondary">
						 <img class="rounded-cricle" width="70" src="assets/img/<?php echo htmlentities($result->image);?>"/> 
						 <a class="text-dark px-3 font-weight-bold" href="hall-details.php?hid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->hallname);?></a>
						 <p class="text-dark mb-0 small"><span class="text-muted mr-2"> Sport: <?php echo htmlentities($result->sportname);?></span></p>
						 <p class="text-dark mb-0 small"><span class="text-muted mr-2">City: <?php echo htmlentities($result->city);?></span></p>
					  </li>
					  <?php }} ?>
				   </ul>
			 </div>
	   </div>
	   </aside>
	</div>
 </section>
</body>
</html>