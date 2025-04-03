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
                            <div class="form-group">
                                <label for="nome">Nome Completo</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="<?= $usuario['nome'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?= $usuario['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" name="telefone" id="telefone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço</label>
                                <input type="text" name="endereco" id="endereco" class="form-control">
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
                                <label for="arquivo_cv">Curriculo (PDF ou TXT)</label>
                                <input type="file" name="arquivo_cv" id="arquivo_cv" class="form-control-file" accept=".pdf,.txt" required>
                                <div id="preview-arquivo-cv">
                                    <?php if (!empty($usuario['arquivo_cv'])) : ?>
                                        <p class="mt-2">Arquivo: <?= $usuario['arquivo_cv'] ?></p>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="removerArquivoCv()">Remover Arquivo</button>
                                    <?php else : ?>
                                        <p class="mt-2 text-muted">Nenhum arquivo enviado.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <label for="foto_perfil">Foto de Perfil (opcional)</label>
                            <input type="file" name="foto_perfil" id="foto_perfil" class="form-control-file" accept="image/*">
                            <div id="preview-foto-perfil">
                                <?php if (!empty($usuario['foto_perfil'])) : ?>
                                    <p class="mt-2">Foto: <?= $usuario['foto_perfil'] ?></p>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="removerFotoPerfil()">Remover Foto</button>
                                <?php else : ?>
                                    <p class="mt-2 text-muted">Nenhuma foto enviada.</p>
                                <?php endif; ?>
                            </div>
                        </div>
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
            // Lógica para remover o arquivo de currículo
            alert('Arquivo de currículo removido!');
            // Aqui você pode adicionar uma requisição AJAX para remover o arquivo no servidor
            document.getElementById('preview-arquivo-cv').innerHTML = '<p class="mt-2 text-muted">Nenhum arquivo enviado.</p>';
        }

        function removerFotoPerfil() {
            // Lógica para remover a foto de perfil
            alert('Foto de perfil removida!');
            // Aqui você pode adicionar uma requisição AJAX para remover o arquivo no servidor
            document.getElementById('preview-foto-perfil').innerHTML = '<p class="mt-2 text-muted">Nenhuma foto enviada.</p>';
        }
    </script>
</body>
</html>