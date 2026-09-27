<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJadwalPraktikTable extends Migration
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

            'id_dokter' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],

            'hari' => [
                'type'              => 'ENUM',
                'constraint'        => ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            ],

            'jam_mulai' => [
                'type'              => 'TIME',
            ],

            'jam_selesai' => [
                'type'              => 'TIME',
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
        $this->forge->addForeignKey('id_dokter', 'dokter', 'id', 'CASCADE', 'RESTRICT');
        $this->forge->createTable('jadwal_praktik');
    }

    public function down()
    {
        $this->forge->dropForeignKey('jadwal_praktik', 'jadwal_praktik_id_dokter_foreign');
        $this->forge->dropTable('jadwal_praktik');
    }
}
