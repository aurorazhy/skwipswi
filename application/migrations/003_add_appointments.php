<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_appointments extends CI_Migration
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
			'admin_id' => array(
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
			'meet_date' => array(
				'type' => 'DATE',
			),
			'meet_time' => array(
				'type' => 'TIME',
			),
			'status' => array(
				'type' => 'ENUM("SUCCESS", "CANCEL")',
				'default' => 'SUCCESS'
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('car_id', 'cars', 'id', 'CASCADE', 'CASCADE');
		$this->dbforge->add_key('admin_id', 'admins', 'id', 'CASCADE', 'CASCADE');
		$this->dbforge->create_table('appointments');
	}

	public function down()
	{
		$this->dbforge->drop_table('appointments');
	}
}
