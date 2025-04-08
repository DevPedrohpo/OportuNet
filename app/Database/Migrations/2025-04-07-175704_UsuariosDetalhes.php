<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CriarTabelaUsuariosDetalhes extends Migration
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
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'data_nascimento' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'sexo' => [
                'type'       => 'ENUM',
                'constraint' => ['Masculino', 'Feminino'],
                'null'       => true,
            ],
            'estado_civil' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'escolaridade' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'cursos_especializacoes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'experiencia_profissional' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'pretensao_salarial' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => true,
            ],
            'caminho_cv' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'usuarios_login', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('usuarios_detalhes');
    }

    public function down()
    {
        $this->forge->dropTable('usuarios_detalhes');
    }
}
