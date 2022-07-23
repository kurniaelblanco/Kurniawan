<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orang extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],

		]);
		$this->forge->addKey('blog_id', true);
		$this->forge->createTable('blog');
	}

	public function down()
	{
		$this->forge->dropTable('blog');
	}
}
