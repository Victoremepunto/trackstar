<?php

class m140417_031257_alter_column_ids_to_varchar extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->dropForeignKey('fk_issue_project','tbl_issue');
		$this->dropForeignKey('fk_issue_owner','tbl_issue');
		$this->dropForeignKey('fk_issue_requester','tbl_issue');
		$this->dropForeignKey('fk_user_project','tbl_project_user_assignment');
		$this->dropForeignKey('fk_project_user','tbl_project_user_assignment');

		$this->alterColumn('tbl_user','id','varchar(64)');
		$this->alterColumn('tbl_user','create_user_id','varchar(64)');
		$this->alterColumn('tbl_user','update_user_id','varchar(64)');
		$this->alterColumn('tbl_issue','id','varchar(64)');
		$this->alterColumn('tbl_issue','create_user_id','varchar(64)');
		$this->alterColumn('tbl_issue','update_user_id','varchar(64)');
		$this->alterColumn('tbl_issue','project_id','varchar(64)');
		$this->alterColumn('tbl_issue','status_id','varchar(64)');
		$this->alterColumn('tbl_issue','owner_id','varchar(64)');
		$this->alterColumn('tbl_issue','requester_id','varchar(64)');
		$this->alterColumn('tbl_project','id','varchar(64)');
		$this->alterColumn('tbl_project','create_user_id','varchar(64)');
		$this->alterColumn('tbl_project','update_user_id','varchar(64)');
		$this->alterColumn('tbl_project_user_assignment','project_id','varchar(64)');
		$this->alterColumn('tbl_project_user_assignment','user_id','varchar(64)');



	  $this->addForeignkey('fk_issue_project','tbl_issue','project_id','tbl_project','id','CASCADE','RESTRICT');
	  $this->addForeignkey('fk_issue_owner','tbl_issue','owner_id','tbl_user','id','CASCADE','RESTRICT');
	  $this->addForeignkey('fk_issue_requester','tbl_issue','requester_id','tbl_user','id','CASCADE','RESTRICT');
	  $this->addForeignkey('fk_project_user','tbl_project_user_assignment','project_id','tbl_project','id','CASCADE','RESTRICT');
	  $this->addForeignkey('fk_user_project','tbl_project_user_assignment','user_id','tbl_user','id','CASCADE','RESTRICT');
	}

	public function safeDown()
	{
	}
}
