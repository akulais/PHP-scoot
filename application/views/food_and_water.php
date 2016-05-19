<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
            <title>Food and Water</title>

	    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" type="text/css" href="../../assets/css/stylesheet_food_and_water.css"> -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>

    <body id="food_and_water_body">
<!-- TOP ROW DIV WITH STATISTICAL INFORMATION	 -->
        <div id="top_row">
            <img id="child_img" src="../assets/img/user_stock_image.png" alt="user">

                <div id="likes_dislikes">
                    <h2 class="bio">Name: <?= $child['name'] ?></h2>
                    <h2 class="bio">Age: <?= date("Y") - date("Y", strtotime($child['age'])) ?></h2>
				    <h3 class="top_row">Likes: <?= $child['foods_likes'] ?></h3>
				    <h3 class="top_row">Dislikes: <?= $child['foods_dislikes'] ?></h3>
				    <h3 class="top_row">Allergies: <?= $child['allergies'] ?></h3>
                </div>
        </div>

<!-- BOTTOM ROW DIV WITH DATA ENTRY -->
        <div id="bottom_row">
            <div id="entries">

                <div class="food_row">
                    <form method="post" action="/main/add_event/<?= $child['id'] ?>" role='form'>
                    <label>Food:</label>
                        <input type="hidden" value='food' name="category" class="form-control">
                    <input type="text" name="description" id="description" placeholder="description" class="form-control">

                    <label>Amount:</label>
                        <select name="amount" class="form-control">
                            <option value="all" name='all'>all</option>
                            <option value="some" name='some'>some</option>
                            <option value="none" name='none'>none</option>   
                        </select>
        
                    <label>Comments:</label>
                        <input type="text" name="comments" class="comments" id="comments" placeholder="comments" class="form-control">
            
                        <input id="reg_btn" type="submit" value="Add Food" class="form-control">
                    </form>

                </div>


                <div class="fluids_row">
                    
                    <form method="post" action="/main/add_event/<?= $child['id'] ?>">
                        
                        <label>Drink:</label>
                            <input type="hidden" value='fluids' name="category">
                            <input type="text" name="description" id="description" placeholder="description">
                        
                        <label>Amount:</label>
                            <select name="amount">
                                <option value="all" name='all'>all</option>
                                <option value="some" name='some'>some</option>
                                <option value="none" name='none'>none</option>   
                            </select>
                        
                        <label>Comments:</label>
                            <input type="text" name="comments" class="comments" id="comments" placeholder="comments">
      
                        <input id="reg_btn" type="submit" value="Add Drink">
                    </form>

                </div>

            </div>

        </div>

<a href="/main/map">Find a hospital near you</a>
<a id="go_back" href="/main/select_child/<?= $child['id'] ?>">Go Back</a>

	</body>
    
</html>