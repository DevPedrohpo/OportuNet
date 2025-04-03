<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpornuNet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Tint&family=Lilita+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center">
    
    <!-- /* main container */ -->
    <div class="form-container d-flex flex-column flex-md-row rounded shadow-lg">

    <!-- /* Square Animation */ -->
        <div class="squareAnimation d-flex justify-content-center align-items-center">
            <div class="square text-center container">
                <h1 class="welcome-title">
                    <span class="highlight">Bem-vindo! Aqui você irá encontrar sua vaga de emprego ideal.</span><br>
                </h1>
            </div>
        </div>
    <!-- /* End of Square Animation */ -->

    <!-- /* Login and Register Forms */ -->
        <div class="login-section d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-center title mb-4">Entre com seus dados</h2>

            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>

            <?php if (isset($error)) : ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form action="<?= base_url('/') ?>" method="post" class="w-100 px-3">
                
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= set_value('email') ?>" required>
                </div>
                <div class="form-group">
                <label for="senha">Senha</label>
                    <div class="position-relative">
                        <input type="password" name="senha" id="senha" class="form-control pr-5" required>
                        <span class="position-absolute toggle-password" style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                            <img src="/icons/eye-closed.svg" class="eye-icon" style="width: 20px; height: 20px;">
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </form>
            <p class="mt-3 text-center">Não tem uma conta? <a href="#" id="register-link">Registre-se</a></p>
            <p class="mt-3 text-center">Não lembra da senha? <a href="#" id="forgot-password">Esqueci a senha</a></p>
        </div>
        <!-- /* End of Login Section */ -->

        <!-- /* Register Section */ -->
        <div class="register-section d-flex flex-column justify-content-center align-items-center">
            <h2 class="text-center mb-4">Crie sua conta</h2>
            <form action="<?= base_url('auth/register') ?>" method="post" class="w-100 px-3">

            <div class="form-group text-center">
                    <div class="role-container position-relative d-flex justify-content-center align-items-center">
                        <div class="role-square position-absolute"></div>
                        <span class="role-option admin-option">Admin</span>
                        <span class="role-option candidate-option">Candidato</span>
                    </div>
                    <input type="hidden" id="roleInput" name="role" value="admin">
                </div>

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="senha">Senha</label>
                    <div class="position-relative">
                        <input type="password" name="senha" id="senha" class="form-control pr-5" required>
                        <span class="position-absolute toggle-password" style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                            <img src="/icons/eye-closed.svg" class="eye-icon" style="width: 20px; height: 20px;">
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
            </form>
            <p class="mt-3 text-center">Já tem uma conta? <a href="#" id="login-link">Entrar</a></p>
        </div>
    <!-- /* End of Register Section */ -->

    </div>
    <!-- /* End of Main Container */ -->

    <!-- /* Animations */ -->
    <script>
        const registerLink = document.getElementById('register-link');
        const loginLink = document.getElementById('login-link');
        const squareAnimation = document.querySelector('.squareAnimation');
        const loginSection = document.querySelector('.login-section');
        const registerSection = document.querySelector('.register-section');
        const squareText = document.querySelector('.square h1.welcome-title .highlight');

        function changeTextWithFade(newText) {
            if (window.innerWidth > 768) { // Only apply text change for larger screens
                squareText.classList.add('fade-out');
                setTimeout(() => {
                    squareText.textContent = newText;
                    squareText.classList.remove('fade-out');
                    squareText.classList.add('fade-in');
                    setTimeout(() => squareText.classList.remove('fade-in'), 500);
                }, 500);
            }
        }

        registerLink.addEventListener('click', (event) => {
            event.preventDefault();
            if (window.innerWidth > 768) {
                squareAnimation.classList.add('move-left');
            } else {
                loginSection.classList.add('hide');
                registerSection.classList.remove('hide');
            }
            changeTextWithFade("Crie sua conta agora mesmo, rápido e fácil.");
        });

        loginLink.addEventListener('click', (event) => {
            event.preventDefault();
            if (window.innerWidth > 768) {
                squareAnimation.classList.remove('move-left');
            } else {
                registerSection.classList.add('hide');
                loginSection.classList.remove('hide');
            }
            changeTextWithFade("Bem-vindo! Aqui você irá encontrar sua vaga de emprego ideal.");
        });

        document.querySelectorAll('.toggle-password').forEach(item => {
            item.addEventListener('click', function () {
                const input = this.previousElementSibling; // Corrigido para pegar o input corretamente
                const icon = this.querySelector('img');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.src = "/icons/eye.svg"; // Ícone de olho aberto
                } else {
                    input.type = 'password';
                    icon.src = "/icons/eye-closed.svg"; // Ícone de olho fechado
                }
            });
        });

        const roleSquare = document.querySelector('.role-square');
        const roleInput = document.getElementById('roleInput');
        const adminOption = document.querySelector('.admin-option');
        const candidateOption = document.querySelector('.candidate-option');

        document.querySelector('.role-container').addEventListener('click', () => {
            if (roleInput.value === 'admin') {
                roleSquare.style.transform = 'translateX(100%)'; // Move para a direita
                roleInput.value = 'candidate';
                adminOption.style.color = '#000';
                candidateOption.style.color = '#fff';
            } else {
                roleSquare.style.transform = 'translateX(0)'; // Move para a esquerda
                roleInput.value = 'admin';
                adminOption.style.color = '#fff';
                candidateOption.style.color = '#000';
            }
        });
    </script>
    <!-- /* End of Animations */ -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>