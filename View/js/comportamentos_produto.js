
window.onload = carregar_outras_funcoes;


function carregar_outras_funcoes()
{
    confirmar_exclusao();
}

function confirmar_exclusao()
{
    document.querySelector("#btn_excluir").onclick = function()
    {      
        if(!confirm("Tem certeza que deseja excluir?"))
            return false;
    }
}