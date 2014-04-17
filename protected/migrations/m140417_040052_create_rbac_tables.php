<?php

class m140417_040052_create_rbac_tables extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable( 'tbl_auth_item', array(
		   "name"             => "varchar(64) not null",
		   "type"             => "integer not null",
		   "description"      => "text",
		   "bizrule"          => "text",
		   "data"             => "text",
		   "primary key (name)",
		));

		$this->createTable("tbl_auth_item_child", array(
   		"parent"  => " varchar(64) not null",
		"child"  => " varchar(64) not null",
   		"primary key (parent,child)",
		));

		$this->createTable("tbl_auth_assignment",array(
   		"itemname" => "varchar(64) not null",
   		"userid"   => "varchar(64) not null",
   		"bizrule"  => "text",
   		"data"	   => "text",
   		"primary key (itemname,userid)",
		));

		$this->addForeignKey('fk_auth_item_child_parent','tbl_auth_item_child','parent','tbl_auth_item','name','CASCADE','CASCADE');
		$this->addForeignKey('fk_auth_assignment_itemname','tbl_auth_assignment','itemname','tbl_auth_item','name');
		$this->addForeignKey('fk_auth_assignment_userid','tbl_auth_assignment','userid','tbl_user','id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('fk_auth_item_child_parent','tbl_auth_item_child');
		$this->dropForeignKey('fk_auth_assignment_itemname','tbl_auth_assignment');
		$this->dropForeignKey('fk_auth_assignment_userid','tbl_auth_assignment');
		$this->dropTable('tbl_auth_item');
		$this->dropTable('tbl_auth_item_child');
		$this->dropTable('tbl_auth_assignment');

	}

}
