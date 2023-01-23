

//VALIDAR LOGIN
function ValidacaoLogin(tipo, login, senha) {

// Verificando Browser
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        req = new ActiveXObject("Microsoft.XMLHTTP");
    }

// Arquivo PHP juntamento com a id da noticia (método GET)
    var url = "Action/retornarhome.php?tipo=" + tipo +"&login=" + login +"&senha=" + senha;

// Chamada do método open para processar a requisição
    req.open("Get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
    req.onreadystatechange = function () {

        // Exibe a mensagem "Aguarde..." enquanto carrega
        if (req.readyState == 1) {
            document.getElementById('validacaologin').innerHTML = '...';
        }

        // Verifica se o Ajax realizou todas as operações corretamente
        if (req.readyState == 4 && req.status == 200) {

            // Resposta retornada pelo exibir.php
            var resposta = req.responseText;

            // Abaixo colocamos a resposta na div conteudo
            document.getElementById('validacaologin').innerHTML = resposta;



        }
    }
    req.send(null);

}

function buscarClientes(tipo, param, valor) {

    // Verificando Browser
        if (window.XMLHttpRequest) {
            req = new XMLHttpRequest();
        } else if (window.ActiveXObject) {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        }
    
    // Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var url = "Action/retornarclientes.php?tipo=" + tipo + "&param=" + param + "&valor=" + valor;
    
    // Chamada do método open para processar a requisição
        req.open("Get", url, true);
    
    // Quando o objeto recebe o retorno, chamamos a seguinte função;
        req.onreadystatechange = function () {
    
            // Exibe a mensagem "Buscando Noticias..." enquanto carrega
            if (req.readyState == 1) {
                document.getElementById('ListaPedidosTodos').innerHTML = 'Buscando Clientes...';
            }
    
            // Verifica se o Ajax realizou todas as operações corretamente
            if (req.readyState == 4 && req.status == 200) {
    
                // Resposta retornada pelo busca.php
                var resposta = req.responseText;
    
                // Abaixo colocamos a(s) resposta(s) na div resultado
                document.getElementById('ListaPedidosTodos').innerHTML = resposta;
                $("#ListaPedidosTodos").show();
                $("#painelClientes").hide();
    
            }
        }
        req.send(null);
    }
    