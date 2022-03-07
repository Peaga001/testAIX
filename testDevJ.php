<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php session_start();//Iniciando uma sessão para armazenar os dados?>

    <style>

    body{

        width: 100%;
        background-color:#13293d;
        font-family: 'Quicksand', sans-serif;

    }

    .container{

        position: relative;
        width: 50%;
        height: 350px;
        text-align: left;
        background-color: #006494;
        border-radius: 3px;
        padding: 10px;
        left:25%;
        margin-top: 5%;

    }

    .container form{

        width: 75%;
        margin-left: 12%;
        margin-top: 5%;
    }

    .container label{

        line-height: 50px;
        width: 100%;
        font-size: 30px;
        color: white;
    }

    .container input{

        margin-top: 2.5%;
        width: 70%;
        float: right;
        height: 20px;
        font-size: 18px;
    }

    #bt_enviar{

        width:100%;
        height: auto;
        border: none;
        border:1px solid white;
        border-radius: 5px;
        font-size: 50px;
        background-color: #247BA0;
        color: white;
        font-family: 'Quicksand', sans-serif;
        cursor: pointer;

       
    }

    .mensagem_de_erro {

        background-color: #CF0E0E;
        margin-top: 15%;
        height: auto;
        text-align: center;
        color:white;
        border-radius: 3px;
        
    }

    .resultado {

        background-color: #03bb85;
        margin-top: 15%;
        height: auto;
        text-align: center;
        font-size: 20px;
        color:white;
        border-radius: 3px;

    }





    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TesteEstagio</title>
</head>
<body>

    <div class="container">

    <form method="POST" action="#">

        <label for="nome">Nome:</label>
            <input type="text" class="nome" name="nome" id="nome" minlength="3" required> <br>
        
        
        <label for="idade">Idade:</label>
            <input type="number" class="idade" name="idade" id="idade" minlength="1" maxlength="3" required><br>
        
        
        <label for="senha">Senha:</label>
            <input type="password" class="senha" name="senha" id="senha" required><br>
        

        <input type="submit" name="bt_enviar" value="Enviar" id="bt_enviar">

    </form>

    <?php 
    
    if (!empty($_POST['bt_enviar'])){ //Condição para só iniciar o php após usuário clicar no submit
        
        $nome  = $_POST['nome']; // Recebendo variáveis pelo metodo post
        $idade = $_POST['idade'];
        $senha = $_POST['senha'];

        if ($senha!="total") {// Condição para verificar se a senha está correta 
        
        ?>
    
            <div class="mensagem_de_erro">
                <h2>Senha incorreta! Favor verificar</h2>
            </div>
            </div>
    
        <?php 
    
        }

        else{

            //Verificação caso seja a primeira passagem dos dados - Maior Idade
            if(empty($_SESSION['maiorIdade'])){
                $_SESSION['maiorIdade'] = "$idade";
                $_SESSION['nome_maior_idade'] = $nome;
            }
            else if ($idade>$_SESSION['maiorIdade']) {//Condição que verifica se a idade atual é menor que a armazenada
                $_SESSION['maiorIdade'] = $idade;
                $_SESSION['nome_maior_idade'] = $nome;
            }

            //Verificação caso seja a primeira passagem dos dados - Menor Idade
            if(empty($_SESSION['menorIdade'])){
                $_SESSION['menorIdade'] = "$idade";
                $_SESSION['nome_menor_idade'] = $nome;
            }
            else if ($idade<$_SESSION['menorIdade']) {//Condição que verifica se a idade atual é menor que a armazenada
                $_SESSION['menorIdade'] = $idade;
                $_SESSION['nome_menor_idade'] = $nome;
            }
                
            $nMaiorIdade = $_SESSION['nome_maior_idade'];//Trazendo o nome da pessoa mais velha
            $nMenorIdade = $_SESSION['nome_menor_idade'];//Trazendo o nome da pessoa mais nova
            $menorIdade  = $_SESSION['menorIdade'];//Trazendo a menor idade 
            $maiorIdade  = $_SESSION['maiorIdade'];//Trazendo a maior idade 

        }

        ?><div class="resultado">
            <p>Menor Idade: <?php echo $nMenorIdade." - ".$menorIdade." anos";?><br>
             Maior Idade: <?php echo $nMaiorIdade." - ".$maiorIdade." anos";?></p>

        </div>

        <?php

        

    }
    
    
    
    ?>

   
    
</body>
</html>