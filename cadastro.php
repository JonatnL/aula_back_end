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
          <img class="mb-4" src="/img/jakecadastro.png" alt="" padding="100px" width="72" height="57" style=" border-radius: 200px;">
          <h1 class="h3 mb-3 fw-normal">Faça seu Cadastro</h1>
      
          <div class="form-floating">
            <input type="text" name="nome" class="form-control" id="floatingInput" placeholder="Informe o seu Nome">
            <label for="floatingInput">Nome</label>
          </div>

          <div class="form-floating">
            <input type="date" name="nascimento" class="form-control" id="floatingInput">
            <label for="floatingInput">Data de Nascimento</label>
          </div>

          <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
          </div>

          <div class="form-floating">
            <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Senha</label>
          </div>
      
          
          <input class="btn btn-primary w-100 py-2" type="submit" name="cadastrar" value="cadastrar">

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
//Verifica se o formulario foi enviado
if ($_SERVER["REQUEST_METHOD"] =="POST"){
  //obtem os dados do formulario
  $nome = $_POST['nome'];
  $nascimento = $_POST['nascimento'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
//conexao com o banco
include "bd.php";

if(isset($_POST['cadastrar'])){
//removes backslashes
  $query = "SELECT * FROM usuarios WHERE email='$email'";
  $result = mysqli_query($conn,$query);
  $rows = mysqli_num_rows($result);
  
  if($rows==0){

    //prepara e executa a consulta SQL
    $query = "INSERT INTO usuarios (id, nome, nascimento, email, senha)
    VALUES('NULL','$nome', '$nascimento', '$email', '$senha')";

    $query = mysqli_query($conn,$query);


    echo "<script>
    alert('Seu Cadastro soi realizado com sucesso!');
    window.location='login.php';
    </script>";

  } else {

    echo "<script>
    alert('Email já cadastrado!');
    window.location+'cadastro.php';
    </script>";
    
    
    
  }
}
}
?>