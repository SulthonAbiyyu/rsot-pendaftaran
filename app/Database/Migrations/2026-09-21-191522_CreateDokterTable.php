<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDokterTable extends Migration
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
            'id_poli' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'comment'           => 'Relasi ke tabel poli',
            ],
            'nama' => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],
            'no_sip' => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
                'unique'            => true,
                'comment'            => 'Surat Izin Praktik, wajib unik per dokter',
            ],
            'status' => [
                'type'              => 'ENUM',
                'constraint'        => ['aktif', 'nonaktif'],
                'default'           => 'aktif',
            ],
            'created_at'            => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
            'updated_at'            => [
                'type'              => 'DATETIME',
                'null'              => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_poli', 'poli', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('dokter');
    }

    public function down()
    {
        $this->forge->dropForeignKey('dokter', 'dokter_id_poli_foreign');
        $this->forge->dropTable('dokter');
    }
}
