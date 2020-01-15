<?php 

if($_POST){
    

    if(verificarLogin($_POST['inputUserencomendas'], $_POST['inputPalavrapassencomendas'])){
        $formMsg = "Sucesso!";
    }else{
        $formMsg = "Dados incorretos!";
    }

    
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Inicio de sessão - <?php echo $SYSTEM_NAME;?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <form class="form-signin" action="" method="POST">
        <div class="mb-5"><?php echo isset($formMsg) ? $formMsg : ""; ?></div>
        <h1 class="h3 mb-1 font-weight-normal">Encomendas</h1>
        <h4 class="h4 mb-5 font-weight-light">Inicie sessão</h2>
        <label for="inputUserencomendas" class="sr-only">Nome de utilizador</label>
        <input type="text" id="inputUserencomendas" name="inputUserencomendas" class="form-control" placeholder="Nome de utilizador" required autofocus>
        <label for="inputPalavrapassencomendas" class="sr-only">Palavra-passe</label>
        <input type="password" id="inputPalavrapassencomendas" name="inputPalavrapassencomendas" class="form-control" placeholder="Palavra-passe" required>

        <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
</body>

</html>