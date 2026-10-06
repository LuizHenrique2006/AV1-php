<?php

$msg = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['criar_multipla'])) {

        $id = 1;

        if (file_exists("perguntas.txt")) {

            $arq = fopen("perguntas.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));

                $id = $dados[0] + 1;
            }

            fclose($arq);
        }



        $arq = fopen("perguntas.txt", "a");

        $linha = $id . ";M;" . $_POST["pergunta"] . "\n";

        fwrite($arq, $linha);

        fclose($arq);



        $arq = fopen("respostas.txt", "a");



        $correta = "0";

        if ($_POST["correta"] == "A") {
            $correta = "1";
        }

        $linha = $id . ";A;" . $_POST["respostaA"] . ";" . $correta . "\n";

        fwrite($arq, $linha);



        $correta = "0";

        if ($_POST["correta"] == "B") {
            $correta = "1";
        }

        $linha = $id . ";B;" . $_POST["respostaB"] . ";" . $correta . "\n";

        fwrite($arq, $linha);




        $correta = "0";

        if ($_POST["correta"] == "C") {
            $correta = "1";
        }

        $linha = $id . ";C;" . $_POST["respostaC"] . ";" . $correta . "\n";

        fwrite($arq, $linha);




        $correta = "0";

        if ($_POST["correta"] == "D") {
            $correta = "1";
        }

        $linha = $id . ";D;" . $_POST["respostaD"] . ";" . $correta . "\n";

        fwrite($arq, $linha);


        fclose($arq);


        $msg = "Pergunta e respostas de múltipla escolha criadas com sucesso!";
    }
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['criar_texto'])) {

        $id = 1;

        if (file_exists("perguntas.txt")) {

            $arq = fopen("perguntas.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));

                $id = $dados[0] + 1;
            }

            fclose($arq);
        }



        $arq = fopen("perguntas.txt", "a");

        $linha = $id . ";T;" . $_POST["perguntaTexto"] . "\n";

        fwrite($arq, $linha);

        fclose($arq);



        $arq = fopen("respostas.txt", "a");

        $linha = $id . ";T;" . $_POST["respostaTexto"] . "\n";

        fwrite($arq, $linha);

        fclose($arq);


        $msg = "Pergunta e resposta de texto criadas com sucesso!";
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['alterar_multipla'])) {

        $idAlterar = $_POST["id"];

        $perguntas = array();


        // Lê todas as perguntas

        if (file_exists("perguntas.txt")) {

            $arq = fopen("perguntas.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));

                $id = $dados[0];
                $tipo = $dados[1];
                $pergunta = $dados[2];


                if ($id == $idAlterar) {

                    $pergunta = $_POST["novaPergunta"];
                }


                $perguntas[] = $id . ";" . $tipo . ";" . $pergunta;
            }

            fclose($arq);
        }


        $arq = fopen("perguntas.txt", "w");

        foreach ($perguntas as $linha) {

            fwrite($arq, $linha . "\n");
        }

        fclose($arq);



        $respostas = array();


        if (file_exists("respostas.txt")) {

            $arq = fopen("respostas.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));

                $id = $dados[0];



                if ($id != $idAlterar) {

                    $respostas[] = trim($linha);
                }
            }

            fclose($arq);
        }


        $correta = "0";

        if ($_POST["novaCorreta"] == "A") {
            $correta = "1";
        }

        $respostas[] = $idAlterar . ";A;" . $_POST["novaRespostaA"] . ";" . $correta;


        $correta = "0";

        if ($_POST["novaCorreta"] == "B") {
            $correta = "1";
        }

        $respostas[] = $idAlterar . ";B;" . $_POST["novaRespostaB"] . ";" . $correta;


        $correta = "0";

        if ($_POST["novaCorreta"] == "C") {
            $correta = "1";
        }

        $respostas[] = $idAlterar . ";C;" . $_POST["novaRespostaC"] . ";" . $correta;


        $correta = "0";

        if ($_POST["novaCorreta"] == "D") {
            $correta = "1";
        }

        $respostas[] = $idAlterar . ";D;" . $_POST["novaRespostaD"] . ";" . $correta;



        $arq = fopen("respostas.txt", "w");

        foreach ($respostas as $linha) {

            fwrite($arq, $linha . "\n");
        }

        fclose($arq);


        $msg = "Pergunta e respostas alteradas com sucesso!";
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['alterar_texto'])) {

        $idAlterar = $_POST["id"];

        $perguntas = array();


        if (file_exists("perguntas.txt")) {

            $arq = fopen("perguntas.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));

                $id = $dados[0];
                $tipo = $dados[1];
                $pergunta = $dados[2];


                if ($id == $idAlterar) {

                    $pergunta = $_POST["novaPerguntaTexto"];
                }


                $perguntas[] = $id . ";" . $tipo . ";" . $pergunta;
            }

            fclose($arq);
        }



        $arq = fopen("perguntas.txt", "w");

        foreach ($perguntas as $linha) {

            fwrite($arq, $linha . "\n");
        }

        fclose($arq);



        $respostas = array();


        if (file_exists("respostas.txt")) {

            $arq = fopen("respostas.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));

                $id = $dados[0];


                if ($id != $idAlterar) {

                    $respostas[] = trim($linha);
                }
            }

            fclose($arq);
        }



        $respostas[] = $idAlterar . ";T;" . $_POST["novaRespostaTexto"];


     
        $arq = fopen("respostas.txt", "w");

        foreach ($respostas as $linha) {

            fwrite($arq, $linha . "\n");
        }

        fclose($arq);


        $msg = "Pergunta e resposta de texto alteradas com sucesso!";
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['excluir'])) {

        $idExcluir = $_POST["id"];

        $perguntas = array();



        if (file_exists("perguntas.txt")) {

            $arq = fopen("perguntas.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));

                $id = $dados[0];


                if ($id != $idExcluir) {

                    $perguntas[] = trim($linha);
                }
            }

            fclose($arq);
        }



        $arq = fopen("perguntas.txt", "w");

        foreach ($perguntas as $linha) {

            fwrite($arq, $linha . "\n");
        }

        fclose($arq);


        $respostas = array();


        if (file_exists("respostas.txt")) {

            $arq = fopen("respostas.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));

                $id = $dados[0];


                if ($id != $idExcluir) {

                    $respostas[] = trim($linha);
                }
            }

            fclose($arq);
        }



        $arq = fopen("respostas.txt", "w");

        foreach ($respostas as $linha) {

            fwrite($arq, $linha . "\n");
        }

        fclose($arq);


        $msg = "Pergunta e respostas excluídas com sucesso!";
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['criar_usuario'])) {

        $id = 1;


        if (file_exists("usuarios.txt")) {

            $arq = fopen("usuarios.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));

                $id = $dados[0] + 1;
            }

            fclose($arq);
        }


        $arq = fopen("usuarios.txt", "a");


        $linha = $id . ";" .
                 $_POST["nome"] . ";" .
                 $_POST["email"] . "\n";


        fwrite($arq, $linha);

        fclose($arq);


        $msg = "Usuário criado com sucesso!";
    }
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['alterar_usuario'])) {

        $usuarios = array();


        if (file_exists("usuarios.txt")) {

            $arq = fopen("usuarios.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));

                $id = $dados[0];


                if ($id == $_POST["idUsuario"]) {

                    $linha = $_POST["idUsuario"] . ";" .
                             $_POST["novoNome"] . ";" .
                             $_POST["novoEmail"];
                }


                $usuarios[] = trim($linha);
            }

            fclose($arq);
        }


        $arq = fopen("usuarios.txt", "w");


        foreach ($usuarios as $linha) {

            fwrite($arq, $linha . "\n");
        }


        fclose($arq);


        $msg = "Usuário alterado com sucesso!";
    }
}




if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['excluir_usuario'])) {

        $usuarios = array();


        if (file_exists("usuarios.txt")) {

            $arq = fopen("usuarios.txt", "r");

            while (!feof($arq)) {

                $linha = fgets($arq);

                if (trim($linha) == "") continue;

                $dados = explode(";", trim($linha));


                if ($dados[0] != $_POST["idExcluirUsuario"]) {

                    $usuarios[] = trim($linha);
                }
            }

            fclose($arq);
        }


        $arq = fopen("usuarios.txt", "w");


        foreach ($usuarios as $linha) {

            fwrite($arq, $linha . "\n");
        }


        fclose($arq);


        $msg = "Usuário excluído com sucesso!";
    }
}

?>


<!DOCTYPE html>

<html>

<head>

    <title>Sistema Sr. Water Falls</title>

</head>


<body>

<h1>Sistema de Jogo - Sr. Water Falls</h1>


<p>

<?php echo $msg; ?>

</p>


<hr>



<h2>1 - Criar Pergunta de Múltipla Escolha</h2>


<form action="index.php" method="POST">


    <label>Pergunta:</label>

    <br>

    <textarea
        name="pergunta"
        rows="4"
        cols="50"
        required></textarea>


    <br><br>


    <label>Resposta A:</label>

    <br>

    <input
        type="text"
        name="respostaA"
        required>


    <br><br>


    <label>Resposta B:</label>

    <br>

    <input
        type="text"
        name="respostaB"
        required>


    <br><br>


    <label>Resposta C:</label>

    <br>

    <input
        type="text"
        name="respostaC"
        required>


    <br><br>


    <label>Resposta D:</label>

    <br>

    <input
        type="text"
        name="respostaD"
        required>


    <br><br>


    <label>Resposta correta:</label>

    <br>


    <input
        type="radio"
        name="correta"
        value="A"
        required>

    A


    <input
        type="radio"
        name="correta"
        value="B">

    B


    <input
        type="radio"
        name="correta"
        value="C">

    C


    <input
        type="radio"
        name="correta"
        value="D">

    D


    <br><br>


    <input
        type="submit"
        name="criar_multipla"
        value="Criar Pergunta">


</form>


<hr>



<h2>2 - Criar Pergunta de Texto</h2>


<form action="index.php" method="POST">


    <label>Pergunta:</label>

    <br>

    <textarea
        name="perguntaTexto"
        rows="4"
        cols="50"
        required></textarea>


    <br><br>


    <label>Resposta:</label>

    <br>

    <textarea
        name="respostaTexto"
        rows="4"
        cols="50"
        required></textarea>


    <br><br>


    <input
        type="submit"
        name="criar_texto"
        value="Criar Pergunta">


</form>


<hr>



<h2>3 - Alterar Pergunta de Múltipla Escolha</h2>


<form action="index.php" method="POST">


    <label>ID da pergunta:</label>

    <br>

    <input
        type="number"
        name="id"
        required>


    <br><br>


    <label>Nova pergunta:</label>

    <br>

    <textarea
        name="novaPergunta"
        rows="4"
        cols="50"
        required></textarea>


    <br><br>


    <label>Nova resposta A:</label>

    <br>

    <input
        type="text"
        name="novaRespostaA"
        required>


    <br><br>


    <label>Nova resposta B:</label>

    <br>

    <input
        type="text"
        name="novaRespostaB"
        required>


    <br><br>


    <label>Nova resposta C:</label>

    <br>

    <input
        type="text"
        name="novaRespostaC"
        required>


    <br><br>


    <label>Nova resposta D:</label>

    <br>

    <input
        type="text"
        name="novaRespostaD"
        required>


    <br><br>


    <label>Nova resposta correta:</label>

    <br>


    <input
        type="radio"
        name="novaCorreta"
        value="A"
        required>

    A


    <input
        type="radio"
        name="novaCorreta"
        value="B">

    B


    <input
        type="radio"
        name="novaCorreta"
        value="C">

    C


    <input
        type="radio"
        name="novaCorreta"
        value="D">

    D


    <br><br>


    <input
        type="submit"
        name="alterar_multipla"
        value="Alterar Pergunta">


</form>


<hr>


<h2>4 - Alterar Pergunta de Texto</h2>


<form action="index.php" method="POST">


    <label>ID da pergunta:</label>

    <br>

    <input
        type="number"
        name="id"
        required>


    <br><br>


    <label>Nova pergunta:</label>

    <br>

    <textarea
        name="novaPerguntaTexto"
        rows="4"
        cols="50"
        required></textarea>


    <br><br>


    <label>Nova resposta:</label>

    <br>

    <textarea
        name="novaRespostaTexto"
        rows="4"
        cols="50"
        required></textarea>


    <br><br>


    <input
        type="submit"
        name="alterar_texto"
        value="Alterar Pergunta">


</form>


<hr>



<h2>5 - Listar Perguntas e Respostas</h2>


<?php


if (file_exists("perguntas.txt")) {


    $arq = fopen("perguntas.txt", "r");


    while (!feof($arq)) {


        $linha = fgets($arq);


        if (trim($linha) == "") continue;


        $dados = explode(";", trim($linha));


        $id = $dados[0];

        $tipo = $dados[1];

        $pergunta = $dados[2];


        echo "<strong>ID:</strong> " . $id . "<br>";

        echo "<strong>Pergunta:</strong> " . $pergunta . "<br>";


        if ($tipo == "M") {


            echo "<strong>Tipo:</strong> Múltipla escolha<br>";

            echo "<strong>Respostas:</strong><br>";


            if (file_exists("respostas.txt")) {


                $arq2 = fopen("respostas.txt", "r");


                while (!feof($arq2)) {


                    $linha2 = fgets($arq2);


                    if (trim($linha2) == "") continue;


                    $dados2 = explode(";", trim($linha2));


                    if ($dados2[0] == $id) {


                        echo $dados2[1] . " - " . $dados2[2];


                        if (isset($dados2[3])) {


                            if ($dados2[3] == "1") {

                                echo " (CORRETA)";
                            }
                        }


                        echo "<br>";
                    }
                }


                fclose($arq2);
            }


        } else {


            echo "<strong>Tipo:</strong> Texto<br>";


            if (file_exists("respostas.txt")) {


                $arq2 = fopen("respostas.txt", "r");


                while (!feof($arq2)) {


                    $linha2 = fgets($arq2);


                    if (trim($linha2) == "") continue;


                    $dados2 = explode(";", trim($linha2));


                    if ($dados2[0] == $id && $dados2[1] == "T") {


                        echo "<strong>Resposta:</strong> " . $dados2[2] . "<br>";
                    }
                }


                fclose($arq2);
            }
        }


        echo "<hr>";
    }


    fclose($arq);


} else {


    echo "Nenhuma pergunta cadastrada.";
}


?>


<hr>


<h2>6 - Listar uma Pergunta</h2>


<form action="index.php" method="POST">


    <label>ID da pergunta:</label>

    <input
        type="number"
        name="idBusca"
        required>


    <input
        type="submit"
        name="buscar"
        value="Buscar">


</form>


<br>


<?php


if (isset($_POST['buscar'])) {


    $idBusca = $_POST["idBusca"];

    $encontrou = false;


    if (file_exists("perguntas.txt")) {


        $arq = fopen("perguntas.txt", "r");


        while (!feof($arq)) {


            $linha = fgets($arq);


            if (trim($linha) == "") continue;


            $dados = explode(";", trim($linha));


            $id = $dados[0];

            $tipo = $dados[1];

            $pergunta = $dados[2];


            if ($id == $idBusca) {


                $encontrou = true;


                echo "<strong>ID:</strong> " . $id . "<br>";

                echo "<strong>Pergunta:</strong> " . $pergunta . "<br>";


                if ($tipo == "M") {


                    echo "<strong>Tipo:</strong> Múltipla escolha<br>";

                    echo "<strong>Respostas:</strong><br>";


                    $arq2 = fopen("respostas.txt", "r");


                    while (!feof($arq2)) {


                        $linha2 = fgets($arq2);


                        if (trim($linha2) == "") continue;


                        $dados2 = explode(";", trim($linha2));


                        if ($dados2[0] == $id) {


                            echo $dados2[1] . " - " . $dados2[2];


                            if ($dados2[3] == "1") {

                                echo " (CORRETA)";
                            }


                            echo "<br>";
                        }
                    }


                    fclose($arq2);


                } else {


                    echo "<strong>Tipo:</strong> Texto<br>";


                    $arq2 = fopen("respostas.txt", "r");


                    while (!feof($arq2)) {


                        $linha2 = fgets($arq2);


                        if (trim($linha2) == "") continue;


                        $dados2 = explode(";", trim($linha2));


                        if ($dados2[0] == $id && $dados2[1] == "T") {

                            echo "<strong>Resposta:</strong> " . $dados2[2] . "<br>";
                        }
                    }


                    fclose($arq2);
                }
            }
        }


        fclose($arq);


    }


    if ($encontrou == false) {

        echo "Pergunta não encontrada.";
    }
}


?>


<hr>



<h2>7 - Excluir Pergunta e Respostas</h2>


<form action="index.php" method="POST">


    <label>ID da pergunta:</label>

    <br>

    <input
        type="number"
        name="idExcluir"
        required>


    <br><br>


    <input
        type="submit"
        name="excluir"
        value="Excluir Pergunta">


</form>


<hr>


<h2>8 - CRUD de Usuários</h2>


<h3>Criar Usuário</h3>


<form action="index.php" method="POST">


    <label>Nome:</label>

    <br>

    <input
        type="text"
        name="nome"
        required>


    <br><br>


    <label>Email:</label>

    <br>

    <input
        type="email"
        name="email"
        required>


    <br><br>


    <input
        type="submit"
        name="criar_usuario"
        value="Criar Usuário">


</form>


<br>


<h3>Alterar Usuário</h3>


<form action="index.php" method="POST">


    <label>ID:</label>

    <br>

    <input
        type="number"
        name="idUsuario"
        required>


    <br><br>


    <label>Novo nome:</label>

    <br>

    <input
        type="text"
        name="novoNome"
        required>


    <br><br>


    <label>Novo email:</label>

    <br>

    <input
        type="email"
        name="novoEmail"
        required>


    <br><br>


    <input
        type="submit"
        name="alterar_usuario"
        value="Alterar Usuário">


</form>


<br>


<h3>Excluir Usuário</h3>


<form action="index.php" method="POST">


    <label>ID:</label>

    <br>

    <input
        type="number"
        name="idExcluirUsuario"
        required>


    <br><br>


    <input
        type="submit"
        name="excluir_usuario"
        value="Excluir Usuário">


</form>


<br>


<h3>Lista de Usuários</h3>


<?php


if (file_exists("usuarios.txt")) {


    $arq = fopen("usuarios.txt", "r");


    while (!feof($arq)) {


        $linha = fgets($arq);


        if (trim($linha) == "") continue;


        $dados = explode(";", trim($linha));


        echo "<strong>ID:</strong> " . $dados[0] . "<br>";

        echo "<strong>Nome:</strong> " . $dados[1] . "<br>";

        echo "<strong>Email:</strong> " . $dados[2] . "<br>";


        echo "<hr>";
    }


    fclose($arq);


} else {


    echo "Nenhum usuário cadastrado.";
}


?>


</body>

</html>