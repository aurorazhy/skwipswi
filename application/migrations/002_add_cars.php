<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_cars extends CI_Migration
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
			'admin_id' => array(
				'type' => 'VARCHAR',
				'constraint' => 36,
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'brand' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'model' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'number_plate' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'transmission' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'fuel' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'tax_exp_date' => array(
				'type' => 'DATE',
			),
			'year' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'color' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'kilometers' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'registration_area' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'cc_engine' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'img_link' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'price' => array(
				'type' => 'VARCHAR',
				'constraint' => 100,
			),
			'is_sold' => array(
				'type' => 'BOOLEAN',
			),
			'description' => array(
				'type' => 'TEXT',
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->add_key('admin_id', 'admins', 'id', 'CASCADE', 'CASCADE');
		$this->dbforge->create_table('cars');
	}

	public function down()
	{
		$this->dbforge->drop_table('cars');
	}
}
