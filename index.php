<!doctype html>
<html lang="pt-br">
<!-- Para acessar o projeto, habilite o Apache no XAMPP.
Abra a URL http://localhost/login no navegador -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Sistema de Login</title>
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <style>
        #alerta,
        #caixaSenha,
        #caixaRegistro,
        #caixaNovo {
            display: none;
        }
    </style>
</head>

<body class="bg-dark ">
    <main class="container mt-4">
        <section class="row">
            <div class="col-lg-4 offset-lg-4" id="alerta">
                <div class="alert alert-success text-center">
                    <strong class="resultado">
                        ALOHAAAA TCHURMAAAAAAA!
                    </strong>
                </div>
            </div>
        </section>

        <!-- Formulário de Login -->
        <section class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaLogin">
                <h2 class="text-center mt-2">
                    Entrar no Sistema
                </h2>
                <form action="#" method="post" class="p-2" id="formLogin">

                    <div class="form-group">
                        <input type="text" name="nomeUsuario" id="nomeUsuario" placeholder="Nome de Usuário" class="form-control" required minlength="5" value="<?= isset($_COOKIE['nomeDoUsuario']) ? $_COOKIE['nomeDoUsuario'] : ""; ?>">
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhaUsuario" id="senhaUsuario" placeholder="Senha" class="form-control" required minlength="6" value="<?= isset($_COOKIE['senhaDoUsuario']) ? $_COOKIE['senhaDoUsuario'] : ""; ?>">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox mt-5">

                            <input type="checkbox" name="lembrar" id="lembrar" class="custom-control-input" <?= isset($_COOKIE['senhaDoUsuario']) ? " checked" : ""; ?>>
                            <label for="lembrar" class="custom-control-label">
                                Lembrar de mim.
                            </label>
                            <a href="#" class="float-right" id="btnEsqueci">
                                Esqueci a senha!
                            </a>

                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Entrar" name="btnEntrar" id="btnEntrar" class="btn btn-primary btn-block">
                    </div>

                    <div class="form-group">
                        <p class="text-center">
                            Novo usuário? <a href="#" id="btnRegistrarNovo">
                                Registre-se aqui!
                            </a>
                        </p>
                    </div>
                    <div class="form-group">
                        <p class="text-center">
                            <a href="#" id="btnMostrarMais">
                                Mostrar
                            </a>
                        </p>
                    </div>

                </form>
            </div>
        </section>
        <!-- Final da Seção de Login -->

        <!-- Formulário de Recuperação de Senha -->
        <section class="row mt-5">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaSenha">
                <h2 class="text-center mt-2">
                    Gerar Nova Senha
                </h2>
                <form action="#" method="post" id="formSenha" class="p-2">
                    <div class="form-group">
                        <small class="text-muted">
                            Para gerar uma nova senha, digite o seu e-mail. Clique no link gerado.
                        </small>
                    </div>

                    <div class="form-group">
                        <input type="email" name="emailGerarSenha" id="emailGerarSenha" class="form-control" placeholder="E-mail de recuperação de senha" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Gerar" name="btnGerar" id="btnGerar" class="btn btn-primary btn-block">
                    </div>

                    <div class="form-group">
                        <p class="text-center">
                            Já registrado? <a href="#" id="btnJaRegistrado">
                                Entrar por aqui!
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </section>
        <!-- Final da Seção de Recuperação de Senha -->
        <!-- Início do formulário de cadastro de novos usuários -->
        <section class="row mt-5">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaRegistro">
                <h2 class="text-center mt-2">
                    Registra-se aqui!
                </h2>
                <form action="#" method="post" class="p-2" id="formRegistro">

                    <div class="form-group">
                        <input type="text" name="nomeCompleto" id="nomeCompleto" class="form-control" placeholder="Nome Completo" required minlength="6">
                    </div>

                    <div class="form-group">
                        <input type="text" name="nomeDoUsuario" id="nomeDoUsuario" class="form-control" placeholder="Nome de Usuário" required minlength="5">
                    </div>

                    <div class="form-group">
                        <input type="email" name="emailUsuario" id="emailUsuario" class="form-control" placeholder="E-mail" required>
                    </div>

                    <div class="form-group">
                        <input type="url" name="urlPerfil" id="urlPerfil" class="form-control" placeholder="Url do perfil" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhaDoUsuario" id="senhaDoUsuario" class="form-control" placeholder="Senha" required minlength="6">
                    </div>

                    <div class="form-group">
                        <input type="password" name="senhaUsuarioConfirmar" id="senhaUsuarioConfirmar" class="form-control" placeholder="Confirmar a senha" required minlength="6">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox mt-4">
                            <input type="checkbox" name="concordar" id="concordar" class="custom-control-input">
                            <label for="concordar" class="custom-control-label">
                                Eu concordo com <a href="#">os termos e condições.</a>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Registrar" class="btn btn-primary btn-block" id="btnRegistrar" name="btnRegistrar">
                    </div>

                    <div class="form-group">
                        <p class="text-center">
                            Já registrado? <a href="#" id="btnJaRegistrado2">
                                Entrar por aqui!
                            </a>
                        </p>
                    </div>

                </form>
            </div>
        </section>
        <!-- Final do formulário de cadastro de novos usuários -->

        <!-- Formulário novo -->
        <section class="row">
            <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaNovo">
                <h2 class="text-center mt-2">
                    Novo formulario
                </h2>
                <form action="">
                    <div class="form-group">
                        <input type="text" name="nomeCompletoNovo" id="nomeCompletoNovo" class="form-control" placeholder="Nome completo Do usuário">
                    </div>
                    <div class="form-group">
                        <input type="email" name="emailNovo" id="emailNovo" class="form-control" placeholder="E-mail do Usuário">
                    </div>
                    <div class="form-group">
                        <label for="dataDeAniver">Data de Aniversário</label>
                        <input type="date" name="dataAniversário" id="dataDeAniver" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="url" name="redeSocial" id="redeSocial" class="form-control" placeholder="Url Rede Social">
                    </div>
                    <div class="form-group">
                        <input type="url" name="fotoImagem" id="fotoImagem" class="form-control" placeholder="Url de Imagem ">
                    </div>
                    <div class="form-group">
                        <label for="selectEstado">Estado</label>
                        <select name="selectEstado" id="selectEstado" class="form-control">
                            <option value="parana">Paraná</option>
                            <option value="santaCatarina">Santa Catarina</option>
                            <option value="rioGrandeDoSul">Rio Grande do Sul</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="selectCidade">Cidade</label>
                        <select name="selectCidade" id="selectCidade" class="form-control">
                            <option value="guabiruba">Brusque</option>
                            <option value="itajai">Itajaí</option>
                            <option value="blumenau">Blumenau</option>
                            <option value="novaTrento">Nova Trento</option>
                            <option value="gaspar">Gaspar</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="INOVAR!!!" class="btn btn-primary btn-block" id="btnEntrarNovo" name="btnEntrarNovo">
                    </div>
                    <div class="form-group">
                        <p class="text-center">
                            Já registrado? <a href="#" id="btnJaRegistrado3">
                                Entrar por aqui!
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </section>
        <!-- Final do formulário novo -->
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <!-- Código jQuery para mostrar e ocultar os formulários -->
    <script>
        $(function() {
            //Validação de Formulários
            jQuery.validator.setDefaults({
                success: "valid"
            });
            $("#formRegistro").validate({
                rules: {
                    senhaDoUsuario: "required",
                    senhaUsuarioConfirmar: {
                        equalTo: "#senhaDoUsuario"
                    }
                }
            });
            $("#formSenha").validate();
            $("#formLogin").validate();
            //Mostrar e Ocultar Formulários
            $("#btnEsqueci").click(function() {
                $("#caixaLogin").hide(); //Ocultar
                $("#caixaSenha").show(); //mostrar
            });
            $("#btnRegistrarNovo").click(function() {
                $("#caixaLogin").hide(); //Ocultar
                $("#caixaRegistro").show(); //mostrar
            });
            $("#btnJaRegistrado").click(function() {
                $("#caixaSenha").hide();
                $("#caixaLogin").show(); //mostrar
            });
            $("#btnJaRegistrado2").click(function() {
                $("#caixaRegistro").hide();
                $("#caixaLogin").show(); //mostrar
            });
            $("#btnMostrarMais").click(function() {
                $("#caixaLogin").hide();
                $("#caixaNovo").show(); //mostrar
            });
            $("#btnJaRegistrado3").click(function() {
                $("#caixaNovo").hide();
                $("#caixaLogin").show(); //mostrar
            });

            //Cadastro de novo usuário
            $("#btnRegistrar").click(function(e) {
                if (document
                    .querySelector("#formRegistro")
                    .checkValidity()) {
                    e.preventDefault(); //Não abrir outra págin
                    //Envio dos dados via Ajax
                    $.ajax({
                        url: 'recebe_dados.php',
                        method: 'post',
                        data: $("#formRegistro").serialize() + '&action=cadastro',
                        success: function(resposta) {
                            $("#alerta").show();
                            $(".resultado").html(resposta);
                        }
                    });
                }
                return true;
            });
            //Login
            $("#btnEntrar").click(function(e) {
                if (document
                    .querySelector("#formLogin")
                    .checkValidity()) {
                    e.preventDefault(); //Não abrir outra págin
                    //Envio dos dados via Ajax
                    $.ajax({
                        url: 'recebe_dados.php',
                        method: 'post',
                        data: $("#formLogin").serialize() + '&action=login',
                        success: function(resposta) {
                            $("#alerta").show();
                            if (resposta === "ok") {
                                window.location = "perfil.php";
                            } else {
                                $(".resultado").html(resposta);
                            }
                        }
                    });
                }
                return true;
            });
            //Recuperação de senha
            $("#btnGerar").click(function(e) {
                if (document
                    .querySelector("#formSenha")
                    .checkValidity()) {
                    e.preventDefault(); //Não abrir outra págin
                    //Envio dos dados via Ajax
                    $.ajax({
                        url: 'recebe_dados.php',
                        method: 'post',
                        data: $("#formSenha").serialize() + '&action=senha',
                        success: function(resposta) {
                            $("#alerta").show();
                            $(".resultado").html(resposta);
                        }
                    });
                }
                return true;
            });
        });
        /*
         * Translated default messages for the jQuery validation plugin.
         * Locale: PT_BR
         */
        jQuery.extend(jQuery.validator.messages, {
            required: "Este campo &eacute; requerido.",
            remote: "Por favor, corrija este campo.",
            email: "Por favor, forne&ccedil;a um endere&ccedil;o eletr&ocirc;nico v&aacute;lido.",
            url: "Por favor, forne&ccedil;a uma URL v&aacute;lida.",
            date: "Por favor, forne&ccedil;a uma data v&aacute;lida.",
            dateISO: "Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).",
            number: "Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido.",
            digits: "Por favor, forne&ccedil;a somente d&iacute;gitos.",
            creditcard: "Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.",
            equalTo: "Por favor, forne&ccedil;a o mesmo valor novamente.",
            accept: "Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
            maxlength: jQuery.validator.format("Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres."),
            minlength: jQuery.validator.format("Por favor, forne&ccedil;a ao menos {0} caracteres."),
            rangelength: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
            range: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1}."),
            max: jQuery.validator.format("Por favor, forne&ccedil;a um valor menor ou igual a {0}."),
            min: jQuery.validator.format("Por favor, forne&ccedil;a um valor maior ou igual a {0}.")
        });
    </script>
</body>

</html>