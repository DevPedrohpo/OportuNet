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
                        <tr>
                            <td>João da Silva</td>
                            <td>joao@email.com</td>
                            <td style="color: green;">R$ 3.000,00</td>
                            <td><a href="/cvs/joao_da_silva.pdf" class="btn btn-primary btn-sm" download>Baixar CV</a></td>
                        </tr>
                        <tr>
                            <td>Maria Oliveira</td>
                            <td>maria@email.com</td>
                            <td style="color: blue;">R$ 5.000,00</td>
                            <td><a href="/cvs/maria_oliveira.pdf" class="btn btn-primary btn-sm" download>Baixar CV</a></td>
                        </tr>
                        <tr>
                            <td>Carlos Pereira</td>
                            <td>carlos@email.com</td>
                            <td style="color: green;">R$ 2.500,00</td>
                            <td><a href="/cvs/carlos_pereira.pdf" class="btn btn-primary btn-sm" download>Baixar CV</a></td>
                        </tr>
                        <tr>
                            <td>Ana Souza</td>
                            <td>ana@email.com</td>
                            <td style="color: blue;">R$ 4.000,00</td>
                            <td><a href="/cvs/ana_souza.pdf" class="btn btn-primary btn-sm" download>Baixar CV</a></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-4">
                    <h2 class="title">Relatório de Pretensão Salarial</h2>
                    <p><strong>Soma Total:</strong> R$ 14.500,00</p>
                    <p><strong>Média Salarial:</strong> R$ 3.625,00</p>
                    <div class="mt-3">
                        <a href="/export/report.csv" class="btn btn-primary btn-sm">Exportar como CSV</a>
                        <a href="/export/report.pdf" class="btn btn-primary btn-sm">Exportar como PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>