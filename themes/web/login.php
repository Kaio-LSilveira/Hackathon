<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= url("assets/web/css/"); ?>login.css">
</head>

<body style="background-image: url(http://www.localhost/acme-manha/assets/web/images/rio2.avif)">
    <div class="container">
        <div class="buttonsForm">
            <div class="btnColor"></div>
            <button id="btnSignin">Login</button>

        </div>

        <form id="signin">
            <input type="email" placeholder="email" name="email" id="email" required />
            <i class="fas fa-envelope iEmail"></i>
            <input type="password" placeholder="Senha" name="password" id="signinPassword" required />
            <i class="fas fa-lock iPassword"></i>
            <div class="divCheck">
                <input type="checkbox" />
                <span>Lembre Sua Senha</span>
            </div>
            <button type="submit">Login</button>
           <p> Não tem uma conta?<a href="<?= url("cadastrar"); ?>"> Cadastre-se</a></p>
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
            const data = await fetch("<?= url("login"); ?>",{
                method: "POST",
                body: dataUser,
            });
            const user = await data.json();
            console.log(user);
            if(user) {
                if(user.type === "success"){
                    window.location.href = "http://www.localhost/acme-manha/app";
                } else {
                    console.log(user);
                    message.innerHTML = user.message;
                    message.classList.add("message");
                    message.classList.remove("success", "warning", "error");
                    message.classList.add(`${user.type}`);
                }
            }
        });
    </script>


</body>

</html>