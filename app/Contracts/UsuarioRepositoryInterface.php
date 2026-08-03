<?php
    namespace Eduzin\Atlas\Contracts;
    use Eduzin\Atlas\Models\Usuario;

interface UsuarioRepositoryInterface
{
    public function salvar(Usuario $usuario);

    public function listar();

    public function buscarId($id);

    public function buscarNome($nome);

    public function atualizar(Usuario $usuario);

    public function apagar(Usuario $usuario);
}


?>