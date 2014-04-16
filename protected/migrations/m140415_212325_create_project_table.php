<?php

class m140415_212325_create_project_table extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m140415_212325_create_project_table does not support migration down.\n";
		return false;
	}
	*/


	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('tbl_project', array(
		  'id' => 'pk',
		  'name' => 'string NOT NULL',
		  'description' => 'text NOT NULL',
		  'create_time' => 'datetime DEFAULT NULL',
		  'create_user_id' => 'int DEFAULT NULL',
		  'update_time' => 'datetime DEFAULT NULL',
		  'update_user_id' => 'int DEFAULT NULL',
		));
	}

	public function safeDown()
	{
	  $this->dropTable('tbl_project');
	}

}
