<?php
    require('../config/conexao.php');
    require_once('../Repositories/UsuarioRepository.php');

    $usuarioRepository = new UsuarioRepository($conexao);

    if(isset($_GET['nome'])){

        $nome = $_GET['nome'];

        $usuarios = $usuarioRepository->buscarNome($nome);
        $pesquisa = $nome;

    }else{
        
        $usuarios = $usuarioRepository->listar();
        $pesquisa = null;
    }

    if(isset($_GET['resultado'])){

        $resultado = $_GET['resultado'];

        switch ($resultado) {
            case 'sucesso':

                $mensagem = "Casdatro realizado com sucesso!";
                $tipoDeMensagem = "success";

                break;
            
            case 'erro':

                $mensagem = "Não foi possivel fazer o cadastro!";            
                $tipoDeMensagem = "danger";

                break;

            default:

                $mensagem = "ocorreu um erro desconhecido!";            
                $tipoDeMensagem = "danger";

                break;
        }
    }
    require('../includes/header.php');
?>

    <div>
        <a href="cadastrar.php" class="btn btn-outline-secondary">+ Cadastrar usuário</a>
        <h1 class="text-center">Lista de Usuários</h1>

    </div>

<?php if(isset($mensagem)):?>
    
    <div class="alert alert-<?=$tipoDeMensagem?>" role="alert"><?= $mensagem ?></div>

<?php endif;?>
    
    <form method="GET" action="listar.php">
        <div class="input-group mb-3">
            <input type="text" value="<?=$pesquisa?>" name="nome" class="form-control" placeholder="Pesquisar Usuário...">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">pesquisar</button>
        </div>
    </form>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($usuarios as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['nome'] ?></td>
                <td><?= $user['idade'] ?></td>
                <td>
                    <a class="btn btn-outline-warning" href="editar.php?id=<?= $user['id']; ?>">editar</a> | 
                    <a class="btn btn-outline-danger" href="deletar.php?id=<?= $user['id']; ?>">apagar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php require('../includes/footer.php'); ?>

    
