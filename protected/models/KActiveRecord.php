<?php
class KActiveRecord extends CActiveRecord
{
    public $encodeAttributes;

    public function defaultScope()
    {
        $this->setTableAlias($this->tableName());

        $criteria = new CDbCriteria;
        $criteria->alias = $this->tableName();
        $criteria->condition = $this->tableName().".status!='0'";
        return $criteria;
    }

    // public function recently($limit=5)
    // {
    //     $this->getDbCriteria()->mergeWith(array(
    //         'order'=>'create_time DESC',
    //         'limit'=>$limit,
    //     ));
    //     return $this;
    // }

    public function beforeSave() {
        $time = time();

        if ($this->isNewRecord) {
            if(property_exists($this, 'user_id'))
               $this->user_id = Yii::app()->user ? Yii::app()->user->id : 0;
            if (! isset($this->create_time))
                $this->create_time = $time;
             $this->status = 1;
        } else {
            $this->modify_time = $time;
        }

        return parent::beforeSave();
    }



    public function afterSave() {
        return parent::afterSave();
    }



    public function afterFind() {
        if($this->encodeAttributes===false){
            parent::afterFind();
            return;
        }
        if(is_array($this->encodeAttributes)){
            foreach ($encodeAttribute as $key => $attribute) {
                $this->$attribute = CHtml::encode($this->$attribute);
            }
        }else{
            $schemas = $this::model()->getMetaData()->columns;

            foreach ($schemas as $key => $schema) {
                if($schema->type == 'string'){
                    $name = $schema->name;
                    $this->$name = CHtml::encode($this->$name);
                }
            }  
        }
        return parent::afterFind();
    }



    public function destroy()
    {
        return parent::delete();
    }



    public function delete()
    {
        if(!$this->getIsNewRecord())
        {
            Yii::trace(get_class($this).'.delete()','system.db.ar.CActiveRecord');
            if($this->beforeDelete())
            {
                $this->status = 0;
                $result = $this->save();
                $this->afterDelete();
                return $result;
            }
            else
                return false;
        }
        else
            throw new CDbException(Yii::t('yii','The active record cannot be deleted because it is new.'));
    }

}