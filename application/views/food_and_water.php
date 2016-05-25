<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
            <title>Food and Water</title>

	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/css/stylesheet_food_and_water.css">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    </head>

    <body class="container-fluid">
<!-- TOP ROW DIV WITH STATISTICAL INFORMATION	 -->
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

            
                    <h1><?= $child['name'] ?></h1>
                    <h5><?= date("Y") - date("Y", strtotime($child['age'])) ?> yrs old</h5>
				    <h3 class="categories"><u>Likes:</u> <?= $child['foods_likes'] ?></h3>
				    <h3 class="categories"><u>Dislikes:</u> <?= $child['foods_dislikes'] ?></h3>
				    <h3 class="categories"><u>Allergies:</u> <?= $child['allergies'] ?></h3>
                
        </div>

<!-- BOTTOM ROW DIV WITH DATA ENTRY -->

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 column-d">
                
            <form method="post" action="/add_event/<?= $child['id'] ?>" role='form' class="form-horizontal">
                
                <div class="form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <label>Food:</label>
                                <input type="hidden" value='food' name="category" class="form-control">
                    </div> 

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="description" id="description" placeholder="description" class="form-control">  
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label>Amount:</label>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <select name="amount" class="form-control">
                            <option value="all" name='all'>all</option>
                            <option value="some" name='some'>some</option>
                            <option value="none" name='none'>none</option>   
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label>Comments:</label>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <input type="text" name="comments" id="comments" placeholder="comments" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <input class="buttons btn btn-sm" type="submit" value="Add Food" class="form-control">
                </div>

            </form>
        </div>
  

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 column-d">
                    
            <form method="post" action="/add_event/<?= $child['id'] ?>" role='form' class="form-horizontal">

                    <div class="form-group">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <label>Drink:</label>
                                <input type="hidden" value='drink' name="category" class="form-control">
                        </div> 

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" name="description" id="description" placeholder="description" class="form-control">  
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <label>Amount:</label>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <select name="amount" class="form-control">
                                <option value="all" name='all'>all</option>
                                <option value="some" name='some'>some</option>
                                <option value="none" name='none'>none</option>   
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                            <label>Comments:</label>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" name="comments" id="comments" placeholder="comments" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="buttons btn btn-sm" type="submit" value="Add Drink" class="form-control">
                    </div>

            </form>

        </div>
        
        <div class="find_row">
            <a class='btn btn-lg btn-success map' href="/map">Find a hospital near you</a>
            <a class="btn btn-lg btn-info go_back" href="/select_child/<?= $child['id'] ?>">Go Back</a>
        </div>


	</body>
    
</html>