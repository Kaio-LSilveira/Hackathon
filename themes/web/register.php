<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="<?= url('assets/web/css/cadastro.css')?>">
    <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>

</head>

<body style="background-image: url(http://www.localhost/acme-manha/assets/web/images/rio2.avif);" >
    <div class="container">
        <div class="buttonsForm">
            <div class="btnColor"></div>
            <button id="btnSignin">Cadastro</button>

        </div>

        <form id="signin">
            <input type="email" placeholder="Email" name="email" id="email" required />
            <i class="fas fa-envelope iEmail"></i>
            <input type="password" placeholder="Senha" name="password" id="signinPassword" required />
            <i class="fas fa-lock iPassword"></i>
            <input type="password" placeholder="Repita sua senha" name="rptPassword" id="signinPassword" required />
            <i class="fas fa-lock iPassword2"></i>

            <button type="submit">Cadastro</button> Já tem uma conta? <a href="<?= url("login")?>">Entrar </a> <br>
            <a href="<?= url(""); ?>"  >Voltar</a>
            <div class="col-12" id="message">
                <!--mensagem-->
            </div>
        </form>


    </div>

    <script type="text/javascript" async>
        const form = document.querySelector("#signin");
        const message = document.querySelector("#message");
        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const dataUser = new FormData(form);
            const data = await fetch("<?= url("cadastrar"); ?>",{
                method: "POST",
                body: dataUser,
            });
            const user = await data.json();
            console.log(user);
            if(user) {
                message.innerHTML = user.message;
                message.classList.add("message");
                message.classList.remove("success", "warning", "error");
                message.classList.add(`${user.type}`);
            }
        });
    </script>


    <script src="/js/login.js"></script>
</body>

</html>