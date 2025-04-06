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
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="text-center title mb-4 welcome-banner">Bem-vindo(a), <?= $usuario['nome'] ?>!</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="title">Informações do Currículo</h2>
                        <form action="<?= base_url('home/salvar_curriculo') ?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nome">Nome Completo</label>
                                    <input type="text" name="nome" id="nome" class="form-control" value="<?= $usuario['nome'] ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $usuario['email'] ?>" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="cpf">CPF</label>
                                    <input type="text" name="cpf" id="cpf" class="form-control" value="<?= $usuario['cpf'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="data_nascimento">Data de Nascimento</label>
                                    <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="<?= $usuario['data_nascimento'] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="sexo">Sexo</label>
                                    <select name="sexo" id="sexo" class="form-control">
                                        <option value="Masculino" <?= ($usuario['sexo'] == 'Masculino') ? 'selected' : '' ?>>Masculino</option>
                                        <option value="Feminino" <?= ($usuario['sexo'] == 'Feminino') ? 'selected' : '' ?>>Feminino</option>
                                        <option value="Outro" <?= ($usuario['sexo'] == 'Outro') ? 'selected' : '' ?>>Outro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="estado_civil">Estado Civil</label>
                                    <input type="text" name="estado_civil" id="estado_civil" class="form-control" value="<?= $usuario['estado_civil'] ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="escolaridade">Escolaridade</label>
                                    <input type="text" name="escolaridade" id="escolaridade" class="form-control" value="<?= $usuario['escolaridade'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pretensao_salarial">Pretensão Salarial</label>
                                    <input type="number" name="pretensao_salarial" id="pretensao_salarial" class="form-control" value="<?= $usuario['pretensao_salarial'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cursos_especializacoes">Cursos/Especializações</label>
                                <textarea name="cursos_especializacoes" id="cursos_especializacoes" class="form-control"><?= $usuario['cursos_especializacoes'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="experiencia_profissional">Experiência Profissional</label>
                                <textarea name="experiencia_profissional" id="experiencia_profissional" class="form-control"><?= $usuario['experiencia_profissional'] ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Salvar Currículo</button>
                            <button type="submit" class="btn btn-secondary btn-sm">Editar Currículo</button>
                            <button type="submit" class="btn btn-danger btn-sm">Excluir Currículo</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2 class="title">Upload de arquivos</h2>
                        <form action="<?= base_url('home/upload_cv') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="arquivo_cv">Currículo (PDF ou TXT)</label>
                                <input type="file" name="arquivo_cv" id="arquivo_cv" class="form-control-file" accept=".pdf,.txt" required>
                            </div>
                            <div class="form-group">
                                <label for="arquivo_carta">Carta de Apresentação (PDF ou TXT)</label>
                                <input type="file" name="arquivo_carta" id="arquivo_carta" class="form-control-file" accept=".pdf,.txt">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function removerArquivoCv() {
            alert('Arquivo de currículo removido!');
            document.getElementById('preview-arquivo-cv').innerHTML = '<p class="mt-2 text-muted">Nenhum arquivo enviado.</p>';
        }
    </script>
</body>
</html>