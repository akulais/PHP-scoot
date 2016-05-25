<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
            <title>Map</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/stylesheet_add_child.css">
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    </head>

    <body class="container-fluid">

        <div class="row">
            <h2 id="add_child_body_h2">Choose an Avatar</h2>
        </div>
    
        <form method="post" action="/main/new_child" role='form'>
            <div id="avatars" class="form-group row">

                <label>
                    <input class="avatar" name="image" type='radio' value="1" class="form-control">
                        <img class="avatar" src="../assets/img/stk_img-1.png">
                            </label>

                <label>
                    <input class="avatar" name="image" type='radio' value="2" class="form-control">
                        <img class="avatar" src="../assets/img/stk_img-2.png">
                            </label>

                <label>
                    <input class="avatar" name="image" type='radio' value="3" class="form-control">
                        <img class="avatar" src="../assets/img/stk_img-3.png">
                            </label>

                <label>
                    <input class="avatar" name="image" type='radio' value="4" class="form-control">
                        <img class="avatar" src="../assets/img/stk_img-4.png">
                            </label>

                <label>
                    <input class="avatar" name="image" type='radio' value="5" class="form-control">
                        <img class="avatar" src="../assets/img/stk_img-5.png">
                            </label>

                <label>
                    <input class="avatar" name="image" type='radio' value="6" class="form-control">
                        <img class="avatar" src="../assets/img/medical_icon.png">
                            </label>

                <label>
                    <input class="avatar" name="image" type='radio' value="7" class="form-control">
                        <img class="avatar" src="../assets/img/stk_img-7.png">
                            </label>

                <label>
                    <input class="avatar" name="image" type='radio' value="8" class="form-control">
                        <img class="avatar" src="../assets/img/stk_img-8.png">
                            </label>
            </div>
  

        <div class="row">
            <div class="category" class="form-group">

                <div class="form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label for="name">Name:</label>
                    </div>

                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label for="age">Date of Birth:</label>
                    </div>

                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <input type="date" name="age" id="age" placeholder="Age" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label for="allergies">Allergies:</label>
                    </div>

                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <input type="text" name="allergies" id="allergies" placeholder="Allergies" class="form-control">
                    </div>
                </div>    
                    
                <div class="form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label for="foods_likes">Food Likes:</label>
                    </div>

                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <input type="text" name="foods_likes" id="foods_likes" placeholder="Food likes" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label for="foods_dislikes">Food Dislikes:</label>
                    </div>

                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <input type="text" name="foods_dislikes" id="foods_dislikes" placeholder="Food likes" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label for="dr_name">Dr's name:</label>
                    </div>

                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <input type="text" name="dr_name" id="dr_name" placeholder="Doctor's name" class="form-control">
                    </div>
                </div>
                    
                <div class="form-group">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <label for="dr_contact_info">Dr's contact info:</label>
                    </div>

                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <input type="text" name="dr_contact_info" id="dr_contact_info" placeholder="Dr.'s contact info" class="form-control">
                    </div>
                </div>

                <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-xs-offset-9 col-sm-offset-9 col-md-offset-9 col-lg-offset-9">
                            <form method="post" action="/main/add_child" role='form'>
                                <input type="submit" value="Add child" class="btn buttons btn-lg form-control">
                            </form>
                        </div>
                    </div>
                </div>
           
            </div>
        </div>

        </form>

<a class="btn btn-lg go_back" href="/main/users_profiles">Go Back</a>
    
        </div>

	</body>
    
</html>