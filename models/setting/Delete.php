<?php
/**
 * File Name: Delete.php
 * Automatically generated by QGC tool
 * @date: 2021-05-23 19:52:49
 * @version: 4.0.4
 */

namespace qh4module\setting\models\setting;


use backend\models\SettingAd;
use backend\models\SettingMd;
use qh4module\setting\external\ExtSetting;
use QTTX;
use qttx\web\ServiceModel;

/**
 * Class Delete
 * 从tbl_setting表的删除数据
 * @package qh4module\setting\models\setting
 * @property ExtSetting $external
 */
class Delete extends ServiceModel
{
    /**
     * @var string[]|int[] 接收参数,必须：主键
     */
    public $ids;
    
    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            [['ids'],'required'],
            [['ids'], 'array', 'type' => function ($value) {
                return is_string($value) || is_numeric($value);
            }],
        ];
    }

    /**
     * @inheritDoc
     */
    public function run()
    {
        $this->external->getDb()
            ->update($this->external->settingTableName())
            ->col('del_time', time())
            ->whereIn('id', $this->ids)
            ->where('del_time=0')
            ->query();

        return true;
    }
}
