<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style-login.css">
    <title>Login</title>
    <script>
    
        function limpa_formulário_cep() {
                //Limpa valores do formulário de cep.
                document.getElementById('rua').value=("");
                document.getElementById('bairro').value=("");
                document.getElementById('cidade').value=("");
                document.getElementById('uf').value=("");
        }
    
        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value=(conteudo.logradouro);
                document.getElementById('bairro').value=(conteudo.bairro);
                document.getElementById('cidade').value=(conteudo.localidade);
                document.getElementById('uf').value=(conteudo.uf);

            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }
            
        function pesquisacep(valor) {
    
            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');
    
            //Verifica se campo cep possui valor informado.
            if (cep != "") {
    
                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;
    
                //Valida o formato do CEP.
                if(validacep.test(cep)) {
    
                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value="...";
                    document.getElementById('bairro').value="...";
                    document.getElementById('cidade').value="...";
                    document.getElementById('uf').value="...";
    
                    //Cria um elemento javascript.
                    var script = document.createElement('script');
    
                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
    
                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
    
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };
    
        </script>
</head>
<body>
    <div class="main-login">
        <div class="left-login">
            <h1>Entre<br/> e faça parte da comunidade</h1>
            <img class="left-login-image"src="image/Screenshot_191-semfundo.png" alt="">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <div class="textfield">
                    <label for="usuario">Usuário</label>
                    <input type="text" name="usuario" placeholder="Usuário">
                </div>
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>
                <a href="pginicial.html">
                    <button name="adiciona" type="submit"
                    value="adiciona" class="btn-login">Entrar</button>
                </a>
                <div class="col-12 centralizar"> 
                    <a href="#" class="link-primary"><p class="text-center">Esqueceu a senha?</p></a>
                </div>                                             
                <div class="col-6 centralizar">                          
                    <button type="button" class="btn btn-success btn-xl col-12 btn-criarconta" data-bs-toggle="modal" data-bs-target="#exampleModal">Criar Conta</button> 
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <form action="index.php" method="post" class="row g-3">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label"></label>
                        <input type="nome" class="form-control" id="inputEmail4" placeholder="Nome">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label"></label>
                        <input type="sobrenome" class="form-control" id="inputPassword4" placeholder="Sobrenome">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label"></label>
                        <input type="email" class="form-control" id="inputAddress" placeholder="email@gmail.com.br">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label"></label>
                        <input type="password" class="form-control" id="inputAddress2" placeholder="Senha">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label"></label>
                        <input type="password" class="form-control" id="inputAddress2" placeholder="Confirme sua senha">
                        </div>
                    <div class="col-md-3">
                        <label for="inputZip" class="form-label"></label>
                        <input type="text" class="form-control" id="cep" placeholder="CEP" onblur="pesquisacep(this.value);">
                    </div>
                    <div class="col-md-5">
                        <label for="inputCity" class="form-label"></label>
                        <input type="text" class="form-control" id="cidade" placeholder="Cidade">
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label"></label>
                        <input type="text" class="form-control" id="uf" placeholder="UF">
                    </div>
                    <div class="col-md-5">
                        <label for="inputCity" class="form-label"></label>
                        <input type="text" class="form-control" id="rua" placeholder="Rua">
                    </div>
                    <div class="col-md-3">
                        <label for="inputZip" class="form-label"></label>
                        <input type="text" class="form-control" id="numero" placeholder="Nº">
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label"></label>
                        <input type="text" class="form-control" id="bairro" placeholder="Bairro">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Concordo com nossos Termos, Política de Privacidade e Política de Cookies.
                        </label>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    <button name="adiciona" type="submit"
                    value="adiciona" class="btn btn-primary" data-bs-dismiss="modal">Criar Conta</button>
      
                    </form>
            </div>
        </div>
        </div>
    </div>
</body>
</html>
<?php include "config.php"; ?>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
<?php
if(isset($_POST['adiciona'])){
    $usuario=$_POST['usuario'];
    $senha=$_POST['senha'];
    $adiciona=$conn->prepare('INSERT INTO 
    `cadastro` (`id_cad`, `email_cad`, `senha_cad`) 
    VALUES (NULL, :usuario, :senha);');
    $adiciona->bindValue(':usuario',$usuario);
    $adiciona->bindValue(':senha',$senha);
    echo "Gravado com Sucesso!";
}
?>