<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   
  </head>
  <body>
  <div style='display:block; margin-left:450px; margin-right:auto; margin-top:100px;'>
    <div class='container'  >
        <div class='row'>
            <div class='col-md-5'>
                <div class= 'card' style='width:250px; display:block; margin-left:auto; margin-right:auto;'>
                    <div class='card-body' style='width:200px; display:block;margin-left:auto; margin-right:auto;'>
                        <img class='card-img-top'src='img/login.png'>
                    </div>
                </div>
                <form action='valida_login.php' method='post'>
                    <div class='form-group'>
                        <label for='login'>Login</label>
                        <input class='form-control' id='login' placehold='login' name='user'>

                    </div>
                    <div class='form-group'>
                        <label for='password'>password</label>
                        <input class='form-control' id='password' placehold='login' name='password'>
                    </div>
                        <?php if(isset($_GET['login']) && $_GET['login']=='erro2'){  
                            echo "<div class='text-danger'>Faça Login antes de acessar as páginas protegidas</div>"; 
                        } ?>
                        <?php if(isset($_GET['login']) && $_GET['login']=='erro'){  
                             echo "<div class='text-danger'>Usuario ou senha inválidos(s)</div>"; 
                         } ?>
                    <button type='submit' class='btn btn-primary ' style="display:block; margin-left:auto; margin-right:auto" >Entrar</button>
                <form>
            </div>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>