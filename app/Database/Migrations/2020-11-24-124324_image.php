<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Image extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'image_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			],
			'image_name' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			]
		]);
		$this->forge->addKey('image_id', TRUE);
		$this->forge->createTable('image');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
