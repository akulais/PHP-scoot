<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
			<title><?= $child['name'] ?></title>

		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" href="../../assets/css/stylesheet_select_child.css"> -->
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js'></script>

	<script>
//ATTEMPT 1
		var app = angular.module('myApp', []);

		app.controller('notification', function($scope) {
			$scope.showMe = false;
			$scope.myFunc = function() {
				$scope.showMe = !$scope.showMe;
				alert("med notification 1 is set to : " + $scope.showMe);
			}
    
		});

	</script>

	</head>
<!--Start of Body-->
	<body class="container-fluid" ng-app='myApp'>
<!-- LEFT  COLUMN -->
		<div id="left_column">
			<?php if ($child['image'] == 1) { ?><img style="width:200px;height:200px" id="child_img" src="../../assets/img/stk_img-1.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 2) { ?><img style="width:200px;height:200px" id="child_img" src="../../assets/img/stk_img-2.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 3) { ?><img style="width:200px;height:200px" id="child_img" src="../../assets/img/stk_img-3.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 4) { ?><img style="width:200px;height:200px" id="child_img" src="../../assets/img/stk_img-4.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 5) { ?><img style="width:200px;height:200px" id="child_img" src="../../assets/img/stk_img-5.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 6) { ?><img style="width:200px;height:200px" id="child_img" src="../../assets/img/stk_img-6.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 7) { ?><img style="width:200px;height:200px" id="child_img" src="../../assets/img/stk_img-7.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 8) { ?><img style="width:200px;height:200px" id="child_img" src="../../assets/img/stk_img-8.png" alt="user"><?php ;} ?>
			<?php if (!$child['image']) { ?><img style="width:200px;height:200px" id="child_img" src="../../assets/img/user_stock_image.png" alt="user"><?php ;} ?>

	<h4>allergies:</h4>

		<a href="/main/food_and_water/<?= $child['id'] ?>">
			<img style="width:150px;height:150px" class="icon" id="food_icon" src="../../assets/img/food_icon3.png" alt="food"></a>

		<a href="/main/medicine/<?= $child['id'] ?>">
			<img style="width:150px;height:150px" class="icon" id="medicine_icon" src="../../assets/img/med4.png" alt="medicine"></a>

		<a href="/main/boom_boom/<?= $child['id'] ?>">
			<img style="width:150px;height:150px" class="icon" id="boom_icon" src="../../assets/img/boom2.png" alt="boom"></a>

  		</div>
  
<!-- RIGHT COLUMN -->
		<div id="right_column">
  			<div id="notifications" ng-controller="notification" class="form-group">
  
  				<form method="post" action="" class="notifications_boom" role='form'>
					BOOM notifications
						<label class="switch" for="boom_switch">
							<span value='true' class="switch_enable"></span>
	    					<span value='false' class="switch_disable"></span>
  			
	  						<input class="notification_toggle" name="boom_switch" id="boom_switch" type="checkbox" class="form-control">
	  			 <!-- value="<?= $notification1; ?>" -->
	  						<div class="slider round"></div>
						</label>
				</form><br>

<!-- ATTEMPT 1 -->

 				<form class="notifications_med" role='form'>
 	 <!-- method="post" action="notification/med_notification1/<?= $child[id] ?>" -->
  					Medicine Notification 1
  						<label class="switch" for="med_switch1">
  				<!-- <span class="switch_enable"></span>
	    		<span class="switch_disable"></span> -->
	 						<input class="notification_toggle" data-notification="true" name="med_switch1" id="med_switch1" type="checkbox" ng-click="myFunc()" class="form-control">
							<div class="slider round"></div>
						</label>
				</form>


				<div id="resultQuickVar1"></div>
		
				<form method="post" class="notifications_med" role='form'>
  					Medicine Notification 2
  						<label class="switch" for="med_switch2">
  							<span value='true' class="switch_enable"></span>
	    					<span value='false' class="switch_disable"></span>
	 						<input class="notification_toggle" name="med_switch2" id="med_switch2" type="checkbox" class="form-control">
							<div class="slider round"></div>
						</label>
				</form>

			</div>

  			<div id="allergies">
  				<p><?= $child['allergies'] ?></p>
			</div>

			
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
									<td><?= $datas['person'] ?></td>
	  							</tr>  
	  						<?php	} ?> 
						<?php } else { ?>

	  							<tr>
	  	  							<td>Nothing yet?</td>
		  							<td>Nothing yet?</td>
		  							<td>Nothing yet?</td>
		  							<td>Nothing yet?</td>
		  							<td>Nothing yet?</td>
		  							<td>Nothing yet?</td>
	  							</tr>
 
						<?php	} ?>    

					</tbody>
	 
	 			</table>

  			</div>


<a href="/main/map" id="map">Find a hospital near you</a>
<a id="delete" href="/main/delete/<?= $child['id'] ?>">Delete</a>
<a id="go_back" href="/main/users_profiles">Go Back</a>


		</div>
  
	</body>

</html>