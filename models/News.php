<?php

namespace app\models;

use Yii;
use yii\web\Link;
use yii\web\Linkable;
use yii\helpers\Url;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $name
 */
class News extends \yii\db\ActiveRecord implements Linkable
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['news/view', 'id' => $this->id], true),
        ];
    }

    public function fields()
    {
        return [
            // 字段名和属性名相同
            'id','name'
        ];
    }

    public function extraFields()
    {
        return ['access_token'];
    }

    /*public function fields()
    {
        $fields = parent::fields();

        // 删除一些包含敏感信息的字段
        unset($fields['name']);

        return $fields;
    }*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
