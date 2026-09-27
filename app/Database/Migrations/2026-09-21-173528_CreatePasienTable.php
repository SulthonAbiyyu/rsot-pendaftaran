<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePasienTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],

            'no_rm' => [
                'type'              => 'VARCHAR',
                'constraint'        => 20,
                'unique'            => true,
                'comment'           => 'Nomor rekam medis unik',
            ],

            'nik' => [
                'type'              => 'VARCHAR',
                'constraint'        => 16,
                'unique'            => true,
            ],

            'nama' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],

            'tgl_lahir' => [
                'type'              => 'DATE',
            ],

            'jenis_kelamin' => [
                'type'              => 'ENUM',
                'constraint'        => ['L', 'P'],
            ],

            'alamat' => [
                'type'              => 'TEXT',
            ],

            'no_hp' => [
                'type'              => 'VARCHAR',
                'constraint'        => 15,
                'null'              => true,
            ],

            'gol_darah' => [
                'type'              => 'ENUM',
                'constraint'        => ['A', 'B', 'AB', 'O', '-'],
                'null'              => true,
                'default'           => '-',
            ],

            'nama_kk' => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
                'null'              => true,
                'comment'           => 'Nama kepala keluarga',
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
        $this->forge->createTable('pasien');
    }

    public function down()
    {
        $this->forge->dropTable('pasien');
    }
}
