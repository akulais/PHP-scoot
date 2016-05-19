<!DOCTYPE html>
<html lang="en">
    <head>
	   <meta charset="UTF-8">
		  <title>Scoot</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet_index.css"> -->
	

    </head>
<!--Start of Body-->
<body class="container-fluid">

    <h1 class="page-header">Please login or register</h1>

    <div class="form-group" class="row">
        <form method="post" action="/main/register" role='form' class="form-horizontal">
            <input type="hidden" name="action" value="register" class="form-control">
            
            <div class='col-sm-6'>
                <label for="name" class="control-label col-sm-2">Name:</label>
                    <input type="text" name="name" placeholder="Name" class="form-control" id="name">
                        </div>

            <div class='col-sm-6'>
                <label for="role" class="control-label col-sm-2">Role:</label>
                    <select name="role" class="form-control" id="role">
                        <option value="mother">Mother</option>
                        <option value="father">Father</option>
                        <option value="sibling">Sibling</option>
                        <option value="grandparent">grandparent</option>
                        <option value="other_family">Other family member</option>
                        <option value="sitter">Sitter</option>
                    </select>
                        </div>

            <div class='col-sm-6'>
                <label id="email" class="control-label col-sm-2">Email:</label>
                    <input type="text" name="email" placeholder="email" class="form-control" id="email">
                        </div>

            <div class='col-sm-6'>            
                <label for="pwd" class="control-label col-sm-2">Password:</label>
                    <input type="password" name="password" placeholder="password" class="form-control" id="pwd">
                        </div>

            <div class='col-sm-6'>            
                <label id="cpd" class="control-label col-sm-2">Confirm PW:</label>
                    <input  type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" id="cpd">
                    <input class="btn btn-primary btn-lg" type="submit" value="Register" class="form-control">
                        </div>
        </form>

    </div>


    <div class="form-group" class='row'>
        <form method="post" action="/main/login" role='form' class="form-horizontal">
            <input type="hidden" name="action" value="login" class="form-control">
            
            <div class='col-sm-6'>
                <label for="name" class="control-label col-sm-2">Name:</label>
                    <input type="text" name="name" placeholder="Name" class="form-control" id="name">
                        </div>

            <div class='col-sm-6'>            
                <label for="role" class="control-label col-sm-2">Role:</label>
                    <select name="role" class="form-control" id="role">
                        <option value="mother">Mother</option>
                        <option value="father">Father</option>
                        <option value="sibling">Sibling</option>
                        <option value="grandparent">grandparent</option>
                        <option value="other_family">Other family member</option>
                        <option value="sitter">Sitter</option>
                    </select>
                        </div>

            <div class='col-sm-6'>                
                <label for="pwd" class="control-label col-sm-2">Password:</label>
                    <input type="password" name="password" placeholder="password" class="form-control" id="pwd">
                        <span class="glyphicon glyphicon-hand-right"></span>
                    <input class="btn btn-primary btn-lg" type="submit" value="Login" class="form-control">
                        <span class="glyphicon glyphicon-hand-left"></span>
                        </div>
        </form>

    </div>


    <div class="flash">
        <?php print_r($this->session->flashdata('error')); ?>
    </div>


</body>

</html>