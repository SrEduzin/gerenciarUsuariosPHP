<?php require('../includes/header.php');?>
    <h1>Cadastrar</h1>
    <form action="salvar.php" method="post">
        <label for="nome">Nome</label>
        <input name="nome" id="nome" type="text" placeholder="Digite seu nome" >
        <label for="idade">Idade</label>
        <input name="idade" id="idade" type="number" placeholder="Digite sua idade" >
        <button type="submit">Cadastrar</button>
    </form>

    <a href="listar.php">lista de Usuários</a>
<?php require('../includes/footer.php');?>
