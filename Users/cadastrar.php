<?php 

    
    if(isset($_GET["resultado"])){
        $resultado = $_GET['resultado'];

        switch ($resultado) {
            case 'erroCampo':
                $nomeErro = 'Todos os campos devem ser preenchidos!';
                break;
            case 'erroNomeVazio':
                $nomeErro = 'o nome não pode ser vazio!';
                break;
            case 'erroCaractere':
                $nomeErro = 'o nome deve conter mais de 3 caracteres!';
                break;
            case 'erroEspeciais':
                $nomeErro = 'o nome não pode conter caracteres especiais!';
                break;
            case 'erroVazioIdade':
                $nomeErro = 'a idade não pode está vazia!';
                break;
            case 'erroIdadeInvalida':
                $nomeErro = 'Idade inválida!';
                break;
    
            default:
                # code...
                break;
        }
    }

    require('../includes/header.php');
?>
    <h1>Cadastrar</h1>

    <?php if(isset($nomeErro)):?>

        <div class="alert alert-danger" role="alert"><?= $nomeErro ?></div>
    
    <?php endif;?>

    <form action="salvar.php" method="post">
        <label for="nome">Nome</label>
        <input name="nome" id="nome" type="text" placeholder="Digite seu nome" >
        <label for="idade">Idade</label>
        <input name="idade" id="idade" type="number" placeholder="Digite sua idade" >
        <button type="submit">Cadastrar</button>
    </form>

    <a href="listar.php">lista de Usuários</a>
<?php require('../includes/footer.php');?>
