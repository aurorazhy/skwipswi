<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_sale_histories extends CI_Migration
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
			'car_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 36,
			),
			'payment_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 36,
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'phone' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'status' => array(
				'type' => 'ENUM("SUCCESS", "CANCEL")',
				'default' => 'SUCCESS'
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('car_id', 'cars', 'id', 'CASCADE', 'CASCADE');
		$this->dbforge->add_key('payment_id', 'payment_options', 'id', 'CASCADE', 'CASCADE');
		$this->dbforge->create_table('sale_histories');
	}

	public function down()
	{
		$this->dbforge->drop_table('sale_histories');
	}
}
