<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
			<title>Boom Boom</title>

	    <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- <link rel="stylesheet" type="text/css" href="../../assets/css/stylesheet_boom_boom.css"> -->
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</head>
	
	<body id="boom_boom_body">
	
		<div class="row">
			<img id="child_img" src="../assets/img/user_stock_image.png" alt="user">
		
			<div class="progress-container">
  				<div id="boom_bar" class="progressbar" style="width:80%">
  					<div></div>
				</div>
<!-- This is the start of the progress bar.  Should be able to grab the last 20 entries and create an average.  Plug that into the progress bar as increments.  Then adjust from there. -->
		<!-- Age: <?= date("d M Y", strtotime($datas['date'])) ?> -->
			<h4 id="boom">!!  Average time till next Boom Boom  !!</h4>

			</div>

		<div class="row" class="form-group">		
			
			<table>
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
				  </tr>
 
					<?php	} ?>    
				</tbody>
			</table>

			<form id="med_entry" method="post" action="/main/add_event/<?= $child['id'] ?>" role='form'>
		 		<input type="hidden" name="category" value="booms" class="form-control">
		 		<input type="hidden" name="description" value="poop" class="form-control">
		  		<input type="checkbox" name="amount" value="small" class="form-control">Small
		  		<input type="checkbox" name="amount" value="avg" class="form-control">Avg
		  		<input type="checkbox" name="amount" value="large" class="form-control">Large
		  		<input type="checkbox" name="amount" value="wet" class="form-control">wet
		  		<label>Comments:</label>
	      			<input type="text" name="comments" placeholder="comments e.g. strained boom" class="form-control">
		  		
		  		<input id="add_boom_btn" type="submit" value="'Log' a boom" class="form-control">
		  		
			</form>

		</div>

<a href="/main/map">Find a hospital near you</a>
<a id="go_back" href="/main/select_child/<?= $child['id'] ?>">Go Back</a>

	</body>

</html>