<?php

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['criar'])) {

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

        $linha = $id . ";" . $_POST["pergunta"] . "\n";

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

        $msg = "Pergunta e respostas criadas com sucesso!";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Criar Pergunta</title>

</head>

<body>
    <h1>Criar Pergunta de Múltipla Escolha</h1>

    <form action="index.php" method="POST">

        <label>Pergunta:</label>

        <br>
        <textarea name="pergunta" rows="4" cols="50" required></textarea>
        <br>

        <br>
        <label>Resposta A:</label>
        <br>

        <input type="text"
               name="respostaA"
               required>


        <br>
        <br>

        <label>Resposta B:</label>

        <br>

        <input type="text"
               name="respostaB"
               required>


        <br>
        <br>

        <label>Resposta C:</label>

        <br>

        <input type="text"
               name="respostaC"
               required>


        <br>
        <br>

        <label>Resposta D:</label>

        <br>

        <input type="text"
               name="respostaD"
               required>


        <br>
        <br>

        <label>Resposta correta:</label>

        <br>

        <input type="radio"
               name="correta"
               value="A"
               required>

        <input type="radio"
               name="correta"
               value="B">

        <input type="radio"
               name="correta"
               value="C">

        <input type="radio"
               name="correta"
               value="D">

        <br>
        <br>

        <input type="submit"
               name="criar"
               value="Criar Pergunta">

    </form>

    <p>

        <?php echo $msg;?>

    </p>

</body>

</html>