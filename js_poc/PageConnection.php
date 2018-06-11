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
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"  />
            <p id="profile-name" class="profile-name-card"></p>

            <!--  formulaire  -->
            <form class="form-signin" action="connection.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="username" class="form-control" placeholder="Pseudo" required autofocus>
                <input type="password" id="password" class="form-control" placeholder="Mot de passe" required>
                <div id="remember" class="checkbox">
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Connexion</button>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
    </div><!-- /container -->