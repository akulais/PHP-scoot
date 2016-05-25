<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
			<title>Medicine</title>
	     
	    <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/css/stylesheet_medicine.css">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

	<script>

		function confirmEvent() {
			return confirm("!! Please confirm removing this medical entry !!");
		}

	</script>

	<body class="container-fluid">
<!-- TOP ROW DIV WITH STATISTICAL INFORMATION	 -->
		<?php if (isset($child)) { ?>
			<div class="page-header header">
				<?php if ($child['image'] == 1) { ?><img class='child_image' src="../../assets/img/stk_img-1.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 2) { ?><img class='child_image' src="../../assets/img/stk_img-2.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 3) { ?><img class='child_image' src="../../assets/img/stk_img-3.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 4) { ?><img class='child_image' src="../../assets/img/stk_img-4.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 5) { ?><img class='child_image' src="../../assets/img/stk_img-5.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 6) { ?><img class='child_image' src="../../assets/img/stk_img-6.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 7) { ?><img class='child_image' src="../../assets/img/stk_img-7.png" alt="user"><?php ;} ?>
				<?php if ($child['image'] == 8) { ?><img class='child_image' src="../../assets/img/stk_img-8.png" alt="user"><?php ;} ?>
				<?php if (!$child['image']) { ?><img class='child_image' src="../../assets/img/user_stock_image.png" alt="user"><?php ;} ?>

				<div>
					<h2 >Name: <?= $child['name'] ?></h2>
                    <h2 >Age: <?= date("Y") - date("Y", strtotime($child['age'])) ?></h2>
					<h3>Doctor's info: <?= $child['dr_name'] ?></h3>
					<h3>Contact info:<?= $child['dr_contact_info'] ?></h3>
				</div>

			</div>

<!-- BOTTOM ROW DIV WITH DATA ENTRY -->
			
			<div>
				<div>
					<div>

  						<table class="table table-hover">
    						<thead>
      							<tr>
								    <td><b>Category</b></td>
									<td><b>Name</b></td>
									<td><b>Amount</b></td>
									<td><b>Time given</b></td>
									<td><b>Dose every</b></td>
									<td><b>Date</b></td>
									<td><b>Entered by</b></td>
      							</tr>
    						</thead>
    
    						<tbody>
     							<?php foreach ($data as $info) { ?>
      							<tr>
								    <td><?= $info['category'] ?></td>
								    <td><?= $info['description'] ?></td>
								    <td><?= $info['amount'] ?></td>
								    <td><?= date("h A", strtotime($info['time'])) ?></td>
								    <td><?= $info['comments'] ?></td>
								    <td><?= date("d M Y", strtotime($info['date'])) ?></td>
								    <td><?= $info['person']; 
										if ($info['user2_id'] == $user['user_id'] ) { ?>
											<a onclick="return confirmEvent();" href="/main/rem_entry/<?= $info['med_id'] ?>" ><span class="glyphicon glyphicon-trash"></span></a>
												<?php } ?>
													</td>
      							</tr>
      							<?php } ?>
      						</tbody>
     						</table>
  					</div>
  				</div>

      	<?php } ?>
      			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<form method="post" action="/main/add_event/<?= $child['id'] ?>" role='form'>
		
					<div class="form-group">
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
							<label>Medicine:</label>
						</div>

						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<input type="hidden" name="category"  value="medicines" id="name1" placeholder="name" class="form-control">
      						<input type="text" name="description" id="description" placeholder="name" class="form-control">
			
							<select name="amount" id="amount" class="form-control">
					  			<option value="0.5ml">0.5ml</option>
								<option value="1ml">1ml</option>
								<option value="2ml">2ml</option>
								<option value="3ml">3ml</option>
								<option value="4ml">4ml</option>
								<option value="5ml">5ml</option>
								<option value="6ml">6ml</option>
								<option value="7ml">7ml</option>
								<option value="8ml">8ml</option>
								<option value="9ml">9ml</option>
								<option value="10ml">10ml</option>
							</select>

							<select name="comments" id="comments" class="form-control">
					  			<option value="every 30min">30min</option>
								<option value="every 1hr">1hr</option>
								<option value="every 2hr">2hr</option>
								<option value="every 3hr">3hr</option>
								<option value="every 4hr">4hr</option>
								<option value="every 5hr">5hr</option>
								<option value="every 6hr">6hr</option>
								<option value="every 7hr">7hr</option>
								<option value="every 8hr">8hr</option>
							</select>
						</div>

						<div class="form-group">
                        	<div class='col-xs-offset-10 col-sm-offset-10 col-md-offset-10 col-lg-offset-10'>
                            	<input class="buttons btn btn-info btn-sm" type="submit" value="Update medicines" class="form-control">
                        	</div>
                        </div>

                    </div>
      
      			</form>
      	
    			</div>

    		</div>

    		<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	            	<a class='btn btn-lg btn-success map' href="/main/map">Find a hospital near you</a>
	            	<a class="btn btn-lg btn-info go_back" href="/main/select_child/<?= $child['id'] ?>">Go Back</a>
	        	</div>
        	</div>

	</body>

</html>