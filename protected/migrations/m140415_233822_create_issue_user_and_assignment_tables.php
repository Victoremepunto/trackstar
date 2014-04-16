<?php

class m140415_233822_create_issue_user_and_assignment_tables extends CDbMigration
{
/*
	public function up()
	{
	}

	public function down()
	{
		echo "m140415_233822_create_issue_user_and_assignment_tables does not support migration down.\n";
		return false;
	}
*/


	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{

	  $this->createTable('tbl_issue',array(
	    'id' => 'pk',
            'name' => 'string NOT NULL',
            'description' => 'text',
            'project_id' => 'int DEFAULT NULL',
            'type_id' => 'int DEFAULT NULL',
            'status_id' => 'int DEFAULT NULL',
            'owner_id' => 'int DEFAULT NULL',
            'requester_id' => 'int DEFAULT NULL',
            'create_time' => 'datetime DEFAULT NULL',
            'create_user_id' => 'int DEFAULT NULL',
            'update_time' => 'datetime DEFAULT NULL',
            'update_user_id' => 'int DEFAULT NULL',
	  ));

	  $this->createTable('tbl_user',array(
	    'id' => 'pk',
            'username' => 'string NOT NULL',
            'email' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'last_login_time' => 'datetime DEFAULT NULL',
            'create_time' => 'datetime DEFAULT NULL',
            'create_user_id' => 'int DEFAULT NULL',
            'update_time' => 'datetime DEFAULT NULL',
            'update_user_id' => 'int DEFAULT NULL',
	  ));

	  $this->createTable('tbl_project_user_assignment',array(
	    'project_id' => 'int NOT NULL',
	    'user_id' => 'int NOT NULL',
	    'PRIMARY KEY( user_id , project_id )'
	  ));

	  // fk_table_refcolumn
	  $this->addForeignkey('fk_issue_project','tbl_issue','project_id','tbl_project','id','CASCADE','RESTRICT');
	  $this->addForeignkey('fk_issue_owner','tbl_issue','owner_id','tbl_user','id','CASCADE','RESTRICT');
	  $this->addForeignkey('fk_issue_requester','tbl_issue','requester_id','tbl_user','id','CASCADE','RESTRICT');
	  $this->addForeignkey('fk_project_user','tbl_project_user_assignment','project_id','tbl_project','id','CASCADE','RESTRICT');
	  $this->addForeignkey('fk_user_project','tbl_project_user_assignment','user_id','tbl_user','id','CASCADE','RESTRICT');

	}

	public function safeDown()
	{
	  
	  $this->dropForeignKey('fk_issue_project','tbl_issue');
	  $this->dropForeignKey('fk_issue_owner','tbl_issue');
	  $this->dropForeignKey('fk_issue_requester','tbl_issue');
	  $this->dropForeignKey('fk_project_user','tbl_project_user_assignment');
	  $this->dropForeignKey('fk_user_project','tbl_project_user_assignment');
	  $this->truncateTable('tbl_project_user_assignment');
	  $this->truncateTable('tbl_issue');
	  $this->truncateTable('tbl_user');
	  $this->dropTable('tbl_project_user_assignment');
	  $this->dropTable('tbl_issue');
	  $this->dropTable('tbl_user');
	}

}
