<!doctype html>
<html>
    <head>
        <meta charsert="utf-8">
        <title>Page de connexion</title>
        <link rel="stylesheet" href="public/css/bootstrap.min.css" >
    </head>

    <body  class="container">

        <h1>Connexion </h1>
        
        <em><mark><?php if (isset($message)) echo $message; ?></mark></em>
        
        <form action="index.php?action=traiterCo" method="post">
            <label for="inputNom">Login : </label>
            <input type="text" name="login" placeholder="saisissez votre login" class="form-control"><br>

            <label for="inputPrenom">Password : </label>
            <input type="password" name="pass" placeholder="saisissez votre mot de passe" class="form-control" > 
            <br>
            <button type="submit" class='btn btn-warning'>Valider</button>
        </form>

    </body>

</html>