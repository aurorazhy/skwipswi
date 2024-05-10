<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_sell_request extends CI_Migration
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
			'model_id' => array(
				'type' => 'INT',
				'constraint' => 11,
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'phone' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'prod_year' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'status' => array(
				'type' => 'ENUM("SUCCESS", "CANCEL")',
				'default' => 'SUCCESS'
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('brand_id', 'brands', 'id', 'CASCADE', 'CASCADE');
		$this->dbforge->add_key('model_id', 'models', 'id', 'CASCADE', 'CASCADE');
		$this->dbforge->create_table('sell_request');
	}

	public function down()
	{
		$this->dbforge->drop_table('sell_request');
	}
}
