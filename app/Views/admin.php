<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OportuNet - Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Tint&family=Lilita+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center">
    <div style="position: fixed; top: 10px; right: 10px; z-index: 1000;">
        <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm">Logout</a>
    </div>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h1 class="text-center title mb-4 welcome-banner">Currículos Cadastrados</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Pretensão Salarial</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?= esc($usuario['nome']) ?></td>
                                <td><?= esc($usuario['email']) ?></td>
                                <td style="color: <?= $usuario['pretensao_salarial'] >= 4000 ? 'blue' : 'green' ?>;">
                                    R$ <?= number_format($usuario['pretensao_salarial'], 2, ',', '.') ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('cvs/' . basename($usuario['caminho_cv'])) ?>" class="btn btn-primary btn-sm">
                                        Baixar CV
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php
                    $total = array_sum(array_column($usuarios, 'pretensao_salarial'));
                    $media = count($usuarios) ? $total / count($usuarios) : 0;
                ?>

                <div class="mt-4">
                    <h2 class="title">Relatório de Pretensão Salarial</h2>
                    <p><strong>Soma Total:</strong> R$ <?= number_format($total, 2, ',', '.') ?></p>
                    <p><strong>Média Salarial:</strong> R$ <?= number_format($media, 2, ',', '.') ?></p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>