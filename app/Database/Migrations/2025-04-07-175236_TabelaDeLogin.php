<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriarTabelaUsuariosLogin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nome' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'unique'     => true,
            ],
            'senha' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'cpf' => [
                'type'       => 'VARCHAR',
                'constraint' => 14,
                'unique'     => true,
            ],
            'tipo_conta' => [
                'type'       => 'ENUM',
                'constraint' => ['Candidato', 'Administrador'],
                'default'    => 'Candidato',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('usuarios_login');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios_login');
    }
}
