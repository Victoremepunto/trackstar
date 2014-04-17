<?php

  Yii::import('zii.behaviors.CTimestampBehavior');

  class MyCTimestampBehavior extends CTimestampBehavior{

    public function beforeSave($event) {

      // FIX for date format in PostgreSQL
      $this->timestampExpression = "date('Y-m-d H:i:s',time())";

      $id = (null !== Yii::app()->user) ? Yii::app()->user->id : 1;

      if ($this->owner->isNewRecord)
	$this->owner->create_user_id=$id;

      $this->owner->update_user_id=$id;

      parent::beforeSave($event);
    }
}
