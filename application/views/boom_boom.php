<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
			<title>Boom Boom</title>

	    <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/css/stylesheet_boom_boom.css">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

	</head>
	
	<body id="container-fluid">
	
		<div class="row">
			<?php if ($child['image'] == 1) { ?><img class='child_image' src="../../assets/img/stk_img-1.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 2) { ?><img class='child_image' src="../../assets/img/stk_img-2.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 3) { ?><img class='child_image' src="../../assets/img/stk_img-3.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 4) { ?><img class='child_image' src="../../assets/img/stk_img-4.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 5) { ?><img class='child_image' src="../../assets/img/stk_img-5.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 6) { ?><img class='child_image' src="../../assets/img/stk_img-6.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 7) { ?><img class='child_image' src="../../assets/img/stk_img-7.png" alt="user"><?php ;} ?>
			<?php if ($child['image'] == 8) { ?><img class='child_image' src="../../assets/img/stk_img-8.png" alt="user"><?php ;} ?>
			<?php if (!$child['image']) { ?><img class='child_image' src="../../assets/img/user_stock_image.png" alt="user"><?php ;} ?>
	

			<h4>!!  Average time till next Boom Boom  !!</h4>
				<?php echo '<h3>' ?> <?= $event_diff; ?>  <?php '</h3>'; ?>

			</div>

		<div class="row" class="form-group">		
			
			<table class="table table-hover">
				<thead>

					<tr>
						<td>Date</td>
						<td>Time</td>
						<td>Size</td>
						<td>Comments</td>
						<td>Entered by</td>
					</tr>

				</thead>

				<tbody>
					<?php if (isset($data)) { ?>
						<?php foreach ($data as $datas) { ?>

		 			<tr>
		  				<td><?= date("d M Y", strtotime($datas['date'])) ?></td>
					  	<td><?= date("h A D", strtotime($datas['time'])) ?></td>
						<td><?= $datas['amount'] ?></td>
						<td><?= $datas['comments'] ?></td>
						<td><?= $datas['person']; 
							if ($datas['user2_id'] == $user['user_id'] ) { ?>
								<a onclick="return confirmEvent();" href="/rem_entry/<?= $datas['boom_id'] ?>" ><span class="glyphicon glyphicon-trash"></span></a>
							<?php } ?>
						</td>
		  			</tr>  

	  					<?php	} ?> 
					<?php } else { ?>

				  <tr>
				  	  <td>Nothing yet?</td>
					  <td>Nothing yet?</td>
					  <td>Nothing yet?</td>
					  <td>Nothing yet?</td>
					  <td>Nothing yet?</td>
				  </tr>
 
					<?php	} ?>    
				</tbody>
			</table>

			<form method="post" action="/add_event/<?= $child['id'] ?>" role='form'>

		 		<input type="hidden" name="category" value="booms" class="form-control">
		 		<input type="hidden" name="description" value="poop" class="form-control">
		 		
		 		<label>
		 			<input type="radio" name="amount" value="small" class="form-control">
		 				<img class="icons" src="../../assets/img/cir1.png">
		 		</label>
		  		
		  		<label>
		  			<input type="radio" name="amount" value="avg" class="form-control">
		  				<img class="icons" src="../../assets/img/cir2.png">
		  		</label>

		  		<label>
		  			<input type="radio" name="amount" value="large" class="form-control">
		  				<img class="icons" src="../../assets/img/cir3.jpg">
		  		</label>

		  		<label>
		  			<input type="radio" name="amount" value="wet" class="form-control">
		  				<img class="icons" src="../../assets/img/wet.png">
		  		</label>
		</div>
			<div class="comment-row">
		  		<label>Comments:</label>
	      			<input type="text" name="comments" placeholder="comments e.g. strained boom" class="form-control">
		  		
		  		<input type="submit" value="'Log' a boom" class="form-control btn btn-lg btn-success succ-btn">
		  		
			</form>


				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	            	<a class='btn btn-lg btn-success map' href="/map">Find a hospital near you</a>
	            	<a class="btn btn-lg btn-info go_back" href="/select_child/<?= $child['id'] ?>">Go Back</a>
	        	</div>
        	</div>

	</body>

</html>