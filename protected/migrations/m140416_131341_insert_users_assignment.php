<?php

class m140416_131341_insert_users_assignment extends CDbMigration
{
	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{

	  $this->insert('tbl_project',array(
	    'name' => 'Test Project',
	    'description' => 'test project description',
	  ));

	  $this->insert('tbl_user', array(
	    'email'    => 'test1@notanaddress.com',
	    'username' => 'User One',
	    'password' => MD5('test1'), 
	  ));
	  $this->insert('tbl_user', array(
	    'email'    => 'test2@notanaddress.com',
	    'username' => 'User Two',
	    'password' => MD5('test2'), 
	  ));

	  $this->insert('tbl_project_user_assignment', array(
	    'project_id' => 1,
	    'user_id'    => 1,
	  ));

	  $this->insert('tbl_project_user_assignment', array(
	    'project_id' => 1,
	    'user_id'    => 2,
	  ));

	}

	public function safeDown()
	{
	  $this->delete('tbl_user',"username='User One'");
	  $this->delete('tbl_user',"username='User Two'");
	  $this->delete('tbl_project_user_assignment','project_id=1 and user_id=1');
	  $this->delete('tbl_project_user_assignment','project_id=1 and user_id=2');
	}

}
