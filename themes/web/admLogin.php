<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://kit.fontawesome.com/cf6fa412bd.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?= url('assets/web/css/loginAdm.css')?>">
</head>

<body style="background-image: url(http://www.localhost/acme-manha/assets/web/images/rio.avif);">
    <div class="container">
        <div class="buttonsForm">
            <div class="btnColor"></div>
            <button id="btnSignin">Login</button>

        </div>

        <form id="signin">
            <input type="cpf" placeholder="Email" name="email" id="email" required />
            <i class="fas fa-envelope iEmail"></i>
            <input type="password" placeholder="Senha" name="password" id="signinPassword" required />
            <i class="fas fa-lock iPassword"></i>
            <div class="divCheck">
                <input type="checkbox" />
                <span>Lembre Sua Senha</span>
            </div>
            <button type="submit">Login</button>

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
            const data = await fetch("<?= url("login-adm"); ?>",{
                method: "POST",
                body: dataUser,
            });
            const adm = await data.json();
            console.log(adm);
            if(adm) {
                if(adm.type === "success"){
                    window.location.href = "http://www.localhost/acme-manha/admin/";
                } else {
                    console.log(adm);
                    message.innerHTML = adm.message;
                    message.classList.add("message");
                    message.classList.remove("success", "warning", "error");
                    message.classList.add(`${adm.type}`);
                }
            }
        });
    </script>


</body>

</html>