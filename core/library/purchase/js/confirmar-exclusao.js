function confirmarExclusao(link) {
    // Utiliza a função confirm do JavaScript para exibir uma caixa de diálogo
    var confirmacao = confirm("Deseja excluir?");

    // Se o usuário clicar em "OK", redireciona para o link de exclusão
    if (confirmacao) {
        window.location.href = link;
    }
    // Se o usuário clicar em "Cancelar", não faz nada
}