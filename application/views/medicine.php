<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
			<title>Medicine</title>
	     
	    <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" type="text/css" href="../../assets/css/stylesheet_medicine.css"> -->
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> -->
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<body id="medicine_body">
<!-- TOP ROW DIV WITH STATISTICAL INFORMATION	 -->
		<?php if (isset($child)) { ?>
			<div id="top_row">
				<img id="child_img" src="../assets/img/user_stock_image.png" alt="user">

					<div id="notifications" class="form-group">
						<h2>notification 1</h2>
						<h2>notification 2</h2>
						<h4>Doctor's info: <?= $child['dr_name'] ?> : <?= $child['dr_contact_info'] ?></h4>
					</div>
			</div>

<!-- BOTTOM ROW DIV WITH DATA ENTRY -->
			<div id="bottom_row">
				<div id="entries" class="form-group">
					<div class="medicine_row" class="form-group">
						<div id="med_log" class="form-group">

  							<table>
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
								        <td><?= $info['person'] ?></td>
      								</tr>
      								<?php } ?>
      							</tbody>
     						</table>
  						</div>

      	<?php } ?>

					<form method="post" action="/main/add_event/<?= $child['id'] ?>" role='form'>
	
						<label>Medicine 1:</label>
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

						<input id="update_medicine_btn1" type="submit" value="update medicines(s)" class="form-control">
      
      				</form>
      	
    			</div>

    		</div>

<a href="/main/map">Find a hospital near you</a>
<a id="go_back" href="/main/select_child/<?= $child['id'] ?>">Go Back</a>

	</body>

</html>

    <!-- <form id="medicine_2" action="post" method="#">
		<label>Medicine 2:</label>
	    <input type="text" name="name2" id="name2" placeholder="name">
	    <select name="dosage2" id="dosage2">
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
		<select name="time_guide2" id="time_guide2">
  			<option value="30min">30min</option>
			<option value="1hr">1hr</option>
			<option value="2hr">2hr</option>
			<option value="3hr">3hr</option>
			<option value="4hr">4hr</option>
			<option value="5hr">5hr</option>
			<option value="6hr">6hr</option>
			<option value="7hr">7hr</option>
			<option value="8hr">8hr</option>
			</select>
		<input id="update_medicine_btn2" type="submit" value="update medicines(s)">
      	</form>
      
    <form id="medicine_3" action="post" method="#">
		<label>Medicine 3:</label>
      	<input type="text" name="name3" id="name3" placeholder="name">
      	<select name="dosage3" id="dosage3">
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
		<select name="time_guide3" id="time_guide3">
  			<option value="30min">30min</option>
			<option value="1hr">1hr</option>
			<option value="2hr">2hr</option>
			<option value="3hr">3hr</option>
			<option value="4hr">4hr</option>
			<option value="5hr">5hr</option>
			<option value="6hr">6hr</option>
			<option value="7hr">7hr</option>
			<option value="8hr">8hr</option>
			</select>
		<input id="update_medicine_btn3" type="submit" value="update medicines(s)">
      	</form>

    <form id="medicine_4" action="post" method="#">
		<label>Medicine 4:</label>
      	<input type="text" name="name4" id="name4" placeholder="name">
      	<select name="dosage4" id="dosage4">
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
		<select name="time_guide4" id="time_guide4">
  			<option value="30min">30min</option>
			<option value="1hr">1hr</option>
			<option value="2hr">2hr</option>
			<option value="3hr">3hr</option>
			<option value="4hr">4hr</option>
			<option value="5hr">5hr</option>
			<option value="6hr">6hr</option>
			<option value="7hr">7hr</option>
			<option value="8hr">8hr</option>
			</select> -->
		<!-- <input id="update_medicine_btn4" type="submit" value="update medicines(s)">
      	</form> -->
      

	<!-- <form id="med_entry" action="post" method="#">
	  <input type="checkbox" name="medicine1" value="medicine1" checked> Medicine 1
	  <input type="checkbox" name="medicine2" value="medicine2"> Medicine 2
	  <input type="checkbox" name="medicine3" value="medicine3"> Medicine 3
	  <input type="checkbox" name="medicine4" value="medicine4"> Medicine 4
	  <input id="add_medicine_btn" type="submit" value="enter medicine(s)">
	</form> -->