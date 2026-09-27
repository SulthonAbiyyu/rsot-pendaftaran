<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePoliTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'autro_increment'   => true,
            ],

            'kode_poli' => [
                'type'              => 'VARCHAR',
                'constraint'        => '10',
                'unique'            => true,
                'comment'           => 'kode poli',
            ],

            'nama_poli' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],

            'status' => [     
                'type'              => 'ENUM',
                'constraint'        => ['aktif', 'nonaktif'],
                'default'           => 'aktif',
                'comment'           => 'poli bisa di nonaktifkan sementara tanpa di hapus datanya',
            ],

            'created_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],

            'update_at' => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('poli');
    }

    public function down()
    {
        $this->forge->dropTable('poli');
    }
}
