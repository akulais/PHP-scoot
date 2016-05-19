<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
            <title>Login</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" type="text/css" href="../assets/css/stylesheet_login.css"> -->
	</head>


<body class="container-fluid">

    <div class="row">	
            <div class='col-sm-6'>

                <h1 class="page-header">Welcome <?= $user['name'] ?><br></h1>
            <h4>List of children</h4>
            <?php if(isset($child)) { 
                foreach($child as $childs) { ?>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                            <?= $childs['name'] ?>'s <?= $childs['category'] ?>
                        </div>
                    </div>
                <?php } ?>
            <?php  } ?>

            <form method="post" action="/main/reset" role='form' class="form-group col-sm-4 col-sm-offset-8">
                <input type="submit" value="log out" class="btn btn-success btn-lg form-control">
            </form>

            </div>
        </div>


        <div class="row">

            <ul class="nav navbar-nav col-sm-6">
                <?php if(isset($child)) { 
                    foreach($child as $childs) { ?>
                        <li><a href="/main/select_child/<?= $childs['id'] ?>"><?= $childs['name'] ?></a></li>
                    <?php } ?>
                <?php  } ?>
            </ul>

        <!-- <div id="faces"> 
            <div><img id="child_1" src="../assets/img/happy.jpg" alt="happy"></div>
            <div><img id="child_2" src="../assets/img/neutral.jpg" alt="neutral"></div>
            <div><img id="child_3" src="../assets/img/sad.png" alt="sad"></div>
            <div><img id="child_4" src="../assets/img/neutral2.jpg" alt="neutral2"></div>
        </div>
 -->
        <div class="jumbotron"><?php echo "<h2 id='date'>" . date("M d h:i a") . "</h2>"; ?></div>

        <div role='form' class="form-group col-md-2">
            <form method="post" action="/main/add_child" role='form'>
                <input type="submit" value="Add child" class="btn btn-info btn-lg form-control">
            </form>
        </div>


        <div role='form' class="form-group col-md-2">
            <form method="post" action="/main/map" role='form'>
                <input type="submit" value="Find a hospital near you" class="btn btn-link btn-lg form-control"> 
            </form>
        </div>

    </div>

</body>

</html>