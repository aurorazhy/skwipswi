<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_models extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'brand_id' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'code' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('brand_id', 'brands', 'id', 'CASCADE', 'CASCADE');
		$this->dbforge->create_table('models');
	}

	public function down()
	{
		$this->dbforge->drop_table('models');
	}
}
