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
<link rel="stylesheet" type="text/css" href="../assets/css/stylesheet_index.css">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
	

    </head>
<!--Start of Body-->
<body class="container-fluid">

    <h1 class="page-header">Please <span class="col-g">login</span> or <span class='col-g'>register</span></h1>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <form method="post" action="/register" role='form' class="form-horizontal">
            
            <input type="hidden" name="action" value="register" class="form-control">
            
            <div class="form-group">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <label for="name">Name:</label>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="text" name="name" placeholder="Name" class="form-control" id="name">
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <label for="role">Role:</label>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <select name="role" class="form-control" id="role">
                        <option value="mother">Mother</option>
                        <option value="father">Father</option>
                        <option value="sibling">Sibling</option>
                        <option value="grandparent">grandparent</option>
                        <option value="other_family">Other family member</option>
                        <option value="sitter">Sitter</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <label for="email">Email:</label>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="text" name="email" placeholder="email" class="form-control" id="email">
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">           
                    <label for="password">Password:</label>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="password" name="password" placeholder="password" class="form-control" id="pwd">
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">           
                    <label for="confirm_password" class="control-label col-sm-2">Confirm PW:</label>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input  type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" id="cpd">
                </div>

                
                <div class="form-group">
                    <div>
                        <input class="buttons btn btn-lg" type="submit" value="Register" class="form-control">
                    </div>
                </div>

            </div>

        </form>

    </div>


    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <form method="post" action="/login" role='form' class="form-horizontal">
            <input type="hidden" name="action" value="login" class="form-control">
            
            <div class="form-group"> 
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">  
                    <label for="name">Name:</label>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="text" name="name" placeholder="Name" class="form-control" id="name">
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">             
                    <label for="role">Role:</label>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <select name="role" class="form-control" id="role">
                        <option value="mother">Mother</option>
                        <option value="father">Father</option>
                        <option value="sibling">Sibling</option>
                        <option value="grandparent">grandparent</option>
                        <option value="other_family">Other family member</option>
                        <option value="sitter">Sitter</option>
                    </select>
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">                  
                    <label for="pwd">Password:</label>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <input type="password" name="password" placeholder="password" class="form-control" id="pwd">
                </div>

                <div>
                        <span class="glyphicon glyphicon-hand-right"></span>
                    <input class="btn btn-lg buttons" type="submit" value="Login" class="form-control">
                        <span class="glyphicon glyphicon-hand-left"></span>
                </div>
            </div>

        </form>

    </div>


    <div class="flash">
        <?php print_r($this->session->flashdata('error')); ?>
    </div>


</body>

</html>