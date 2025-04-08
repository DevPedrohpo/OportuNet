<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OportuNet - Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Tint&family=Lilita+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center">
    <!-- Botão de Logout -->
    <div style="position: fixed; top: 10px; right: 10px; z-index: 1000;">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm">Logout</a>
    </div>

    <div id="alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; width: 300px;">
        <?php if (session()->getFlashdata('erro')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('erro') ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="form-container d-flex rounded shadow-lg">
        <div class="card shadow">
            <div class="card-body p-2">
                <h1 class="text-center title mb-4 welcome-banner">Bem-vindo(a), <?= $usuario['nome'] ?>!</h1>
                <div class="row">

                    <!-- Formulário Currículo -->
                    <div class="col-md-12">
                        <h2 class="title">Informações do Currículo</h2>
                        <form id="form-curriculo" action="<?= base_url('home/salvar_curriculo') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?= $_GET['id'] ?>">
                            <!-- Dados Pessoais -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome Completo</label>
                                    <input type="text" name="nome" id="nome" class="form-control" value="<?= $usuario['nome'] ?? '' ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $usuario['email'] ?? '' ?>" required readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control" value="<?= $usuario['cpf'] ?? '' ?>" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="<?= $usuario['data_nascimento'] ?? '' ?>">
                                </div>
                            </div>
                            <!-- Outros Campos -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="sexo">Sexo</label>
                                    <select name="sexo" id="sexo" class="form-control">
                                        <option value="Masculino" <?= ($usuario['sexo'] ?? '') == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                                        <option value="Feminino" <?= ($usuario['sexo'] ?? '') == 'Feminino' ? 'selected' : '' ?>>Feminino</option>
                                        <option value="Outro" <?= ($usuario['sexo'] ?? '') == 'Outro' ? 'selected' : '' ?>>Outro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="estado_civil">Estado Civil</label>
                                    <input type="text" name="estado_civil" id="estado_civil" class="form-control" value="<?= $usuario['estado_civil'] ?? '' ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="escolaridade">Escolaridade</label>
                                    <input type="text" name="escolaridade" id="escolaridade" class="form-control" value="<?= $usuario['escolaridade'] ?? '' ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pretensao_salarial">Pretensão Salarial</label>
                                    <input type="number" name="pretensao_salarial" id="pretensao_salarial" class="form-control" value="<?= $usuario['pretensao_salarial'] ?? '' ?>">
                                </div>
                            </div>
                            <!-- TextAreas -->
                            <div class="form-group">
                                <label for="cursos_especializacoes">Cursos/Especializações</label>
                                <textarea name="cursos_especializacoes" id="cursos_especializacoes" class="form-control"><?= $usuario['cursos_especializacoes'] ?? '' ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="experiencia_profissional">Experiência Profissional</label>
                                <textarea name="experiencia_profissional" id="experiencia_profissional" class="form-control"><?= $usuario['experiencia_profissional'] ?? '' ?></textarea>
                            </div>

                            <!-- Uploads -->
                            <div class="form-group">
                                <label for="arquivo_cv">Currículo (PDF ou TXT)</label>
                                
                                <?php if (!empty($usuario['caminho_cv'])): ?>
                                        Já existe um currículo salvo no seu perfil: 
                                        <strong><?= basename($usuario['caminho_cv']) ?></strong>
                                <?php endif; ?>
                                
                                <input type="file" name="arquivo_cv" id="arquivo_cv" class="form-control-file" accept=".pdf,.txt">
                                <button type="submit" class="btn btn-primary btn-sm my-2">Salvar Currículo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('form-curriculo').addEventListener('submit', async function(e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            try {
                const response = await fetch('<?= site_url('home/salvar_curriculo') ?>', {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                showAlert(result.message, result.success ? 'success' : 'danger');

                if (result.success) {
                    location.reload();
                }
            } catch (error) {
                showAlert('Erro ao salvar o currículo. Tente novamente.', 'danger');
                console.error(error);
            }
        });

        window.onload = function () {
            const cpfInput = document.getElementById('cpf');
            let value = cpfInput.value.replace(/\D/g, '');
            if (value.length === 11) {
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                cpfInput.value = value;
            }
        }

        function showAlert(message, type = 'success') {
            const alertContainer = document.getElementById('alert-container');
            alertContainer.innerHTML = '';
            const alert = document.createElement('div');
            alert.className = `alert alert-${type} alert-dismissible fade show`;
            alert.role = 'alert';
            alert.innerHTML = `
                ${message}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            `;
            alertContainer.appendChild(alert);

            setTimeout(() => {
                alert.classList.remove('show');
                alert.classList.add('hide');
                alert.addEventListener('transitionend', () => alert.remove());
            }, 40000);
        }

    </script>
</body>
</html>