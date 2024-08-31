<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakeland</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

    <!--Inicio NavBar-->

    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="/img/jake.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Jakeland</a>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">História</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Curiosidades</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Hobbies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Personalidade</a>
              </li>
            </ul>
          </div>
          <div class="text-end">
            <a href="login.php"><button type="button" class="btn btn-success me-2">Login</button></a>
            <a href="cadastro.php"><button type="button" class="btn btn-danger">Cadastro</button></a>
                </div>
        </div>
      </nav>
   

    <!--Fim NavBar-->
    
<div class="container text-center">
    <div class="row justify-content-md-center">
       <div class="col-5">


    <main class="form-signin w-100 m-auto p-5">
        <form method="post">
          <img class="mb-4" src="/img/jakelogin.png" alt="" width="72" height="57" style=" border-radius: 200px;">
          <h1 class="h3 mb-3 fw-normal">Faça seu Login</h1>
      
          <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating">
            <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Senha</label>
          </div>
      
          <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Lembrar
            </label>
          </div>
          <input class="btn btn-primary w-100 py-2" type="submit" name="entrar" value="Entrar">
          <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
        </form>
      </main>

</div>
  </div>
    </div>


    <script src="./node_modules/bootstrap/dist/js/bootstrap.js"> </script>
</body>
</html>

<?php
error_reporting(0);

include('bd.php');
session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

if (isset($_POST['entrar'])){

  $sql = "SELECT * FROM usuarios WHERE email='$EMAIL' AND senha='$senha'";
  $result = mysqli_query($conn,$sql);
  $rows = mysqli_num_rows($result);

   if($rows==1){
    $_SESSION['email'] = $email;
    
    
    header("Location: portal.php");
   }else{

    echo "<script>
    alert(Não possivel entrar: Email ou senha estão errados,ou não existem!');
    window.location='login.php;
    </script>";
   }


}