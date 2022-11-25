<?php include ("./cabecalho.php");?>

<?php
include "conexao.php";

if(isset ($_POST) && !empty($_POST)){
    $pergunta = $_POST["pergunta"];
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $d = $_POST["d"];
    $e = $_POST["e"];
    $correta = $_POST["correta"];

    $query = "insert into questoes (pergunta,a,b,c,d,e,correta) "; 
    $query = $query." values('$pergunta','$a','$b','$c','$d','$e','$correta')";
    $resultado = mysqli_query($conexao,$query);
}
?>

<form action= "./index.php" method= "post">

<br><br>
<button type="submit" class="m-4 btn btn-success">Enviar Questionario</button>

</form>

<?php
    $query = "select * from questoes order by rand() limit 5";  // pegar sempre da ultima questão pra baixo, desc decrecente
    $resultado = mysqli_query($conexao, $query);
  

    while($linha = mysqli_fetch_array($resultado)){ 
        ?>


            <div style="width: 100%; border:1px solid;"> 
                <h1><?php echo $linha["pergunta"]; ?></h1>

             
                <h3>    
                    <label> A) </label>
                    <input type="radio" name="correta" value="A" />
                    <?php echo $linha["a"]; ?>
                </h3>
                


                <h3>
                    <label> B) </label>
                    <input type="radio" name="correta" value="B" />
                    <?php echo $linha["b"]; ?>
                </h3>


            
                <h3>
                    <label> C) </label>
                    <input type="radio" name="correta" value="B" />
                    <?php echo $linha["c"]; ?>
                
                </h3>


                <h3>
                    <label> D) </label>
                    <input type="radio" name="correta" value="B" />
                    <?php echo $linha["d"]; ?>
                </h3>


                <h3>
                    <label> E) </label>
                    <input type="radio" name="correta" value="B" />
                    <?php echo $linha["e"]; ?>
                </h3>   

                <br>

                
            </div>


        <?php
    }
?>