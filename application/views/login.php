<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
            <title>Dashboard</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/stylesheet_login.css">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

	</head>


<body class="container-fluid">

    <div class="row">	
        <div class='col-sm-6'>

            <nav class="navbar navbar-inverse">
                <div class="container-fluid nav_bar">
                    <ul class="nav navbar-nav navbar-right nav_bar">
                        <li><a href="/map"><span class="glyphicon glyphicon-map-marker"></span>Find a <b>hospital</b> near you</a></li>
                        <li><a href="/reset"><span class="glyphicon glyphicon-user"></span>Logout</a></li> 
                    </ul>
                </div>
            </nav>
            
            <h1 class="page-header">Welcome <?= $user['name'] ?></h1>
                <?php echo "<h3 id='date'>" . date("M d h:i a") . "</h3>"; ?>
                    <h4 class="header">List of children</h4>
                    
                        <?php if(isset($child)) { 
                            $count = 0;
                                foreach($child as $childs) {
                                    echo '<div class="progress">';
                                        echo  $div[$count]; ?>
                                            <?= $childs['name'] ?>'s <?= $childs['category'] ?>
 <!-- the projected date is the aria-valuemax           the min should be the date1            current should be projected - date1(count_down)  -->
 <!-- MAKE A PERCENTAGE ON THE BACK END AND PUT IT IN THE WIDTH PORTION OF THE DIV TO SHOW PROGRESS -->                                           
                                        <?php echo '</div>';
                                    echo '</div>';
                            $count++; ?>
                        <?php } ?>
                <?php } ?>

            </div>
        </div>


        <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
                    <form method="post" action="/add_child" role='form'>
                        <input type="submit" value="Add child" class="btn buttons btn-lg form-control">
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <ul class="nav navbar-nav col-sm-6" id="faces">
                <?php if(isset($child)) { ?>
                    <?php $count = 0; ?>
                        <?php foreach($child as $childs) { ?>
                            <?php echo $faces[$count]; ?>
                                <li><a href="/select_child/<?= $childs['id'] ?>"><?= $childs['name'] ?></a></li>
                            <?php echo '</div>'; ?>
                    <?php $count++; ?>
                        <?php  } ?>
                <?php  } ?>
            </ul>

    </div>

</body>

</html>