<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
			<title><?= $child['name'] ?></title>

		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/css/stylesheet_select_child.css">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

	<script>
	function myConfirm() {
		return confirm("Do you wish to delete this child from the Database?\nThis can not be undone!");
			}

	function confirmEvent() {
		return confirm("Are you sure?");
			}

	</script>

	</head>
<!--Start of Body-->
	<body class="container-fluid" ng-app='myApp'>
<!-- LEFT  COLUMN -->
		<div>
			<h1><?= $child['name'] ?></h1>
			
				<?php if ($child['image'] == 1) { ?><img class='child_image' src="../../assets/img/stk_img-1.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 2) { ?><img class='child_image' src="../../assets/img/stk_img-2.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 3) { ?><img class='child_image' src="../../assets/img/stk_img-3.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 4) { ?><img class='child_image' src="../../assets/img/stk_img-4.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 5) { ?><img class='child_image' src="../../assets/img/stk_img-5.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 6) { ?><img class='child_image' src="../../assets/img/medical_icon.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 7) { ?><img class='child_image' src="../../assets/img/stk_img-7.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 8) { ?><img class='child_image' src="../../assets/img/stk_img-8.png" alt="user"><?php ;} ?>
				<?php if (!$child['image']) { ?><img class='child_image' src="../../assets/img/user_stock_image.png" alt="user"><?php ;} ?>

	<div class="row">
		<a role='button' class="delete btn btn-md" onclick="return myConfirm();" href="/delete/<?= $child['id'] ?>";>Delete</a>
	</div>
	<hr class="header">
	<h2 >Age: <?= date("Y") - date("Y", strtotime($child['age'])) ?></h2>
	<h4><u style="color:red">ALLERGIES:</u>    <span style="color:gray"><?= $child['allergies'] ?></span></h4>
		
		<a href="/food_and_water/<?= $child['id'] ?>">
			<img class="icon" src="../../assets/img/food_icon3.png" alt="food"></a>

		<a href="/medicine/<?= $child['id'] ?>">
			<img class="icon" src="../../assets/img/med4.png" alt="medicine"></a>

		<a href="/boom_boom/<?= $child['id'] ?>">
			<img class="icon" src="../../assets/img/boom2.png" alt="boom"></a>

  		</div>
  
<!-- RIGHT COLUMN -->
		<div>
  			<div id="log">

 	 			<table class="table table-hover">
					<thead>

						<tr>
							<td>Category</td>
							<td>Description</td>
							<td>Comments</td>
							<td>Amount</td>
							<td>Time</td>
							<td>Entered by</td>
	  					</tr>

					</thead>

					<tbody>
						<?php if (isset($data)) { ?>
							<?php foreach ($data as $datas) { ?>
								<?php if ($datas['category'] == 'booms') { ?> <tr class='success'> <?php ;}
									elseif ($datas['category'] == 'medicines') { ?> <tr class='danger'> <?php ;}
									elseif ($datas['category'] == 'fluids') { ?> <tr class='info'> <?php ;} 
									elseif ($datas['category'] == 'food') { ?> <tr class='warning'> <?php ;} else {?>
	  							<tr><?php	} ?>
									<td><?= $datas['category'] ?></td>
									<td><?= $datas['description'] ?></td>
									<td><?= $datas['comments'] ?></td>
									<td><?= $datas['amount'] ?></td>
									<td><?= date("h a D", strtotime($datas['event_time'])) ?></td>
									<td><?= $datas['person']; 
										if ($datas['user2_id'] == $user['user_id'] ) { ?>
											<a onclick="return confirmEvent();" href="/rem_entry/<?= $datas['id_event'] ?>" ><span class="glyphicon glyphicon-remove"></span></a>
												<?php } ?>
													</td>
	  							</tr>  
	  						<?php	} ?> 
						<?php } ?> 

					</tbody>
	 
	 			</table>

  			</div>


<a class="map buttons btn btn-md" href="/map">Find a hospital near you</a>
<a class="go_back buttons btn btn-md" href="/users_profiles">Go Back</a>


		</div>
  
	</body>

</html>