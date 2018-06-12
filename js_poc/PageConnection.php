<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container" >

            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"  />
            <p id="profile-name" class="profile-name-card"></p>

            <form class="form-signin" action="connexion.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>

                <input id="username" name="username" class="form-control" placeholder="Pseudo" value="user" required autofocus>

                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" value="123" required>

                <div id="remember" class="checkbox">
                </div>

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Connexion</button>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
    </div><!-- /container -->