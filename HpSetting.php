<?php
/**
 * File Name: HpSetting.php
 * ©2020 All right reserved Qiaotongtianxia Network Technology Co., Ltd.
 * @author: hyunsu
 * @date: 2021/5/23 10:14 下午
 * @email: hyunsu@foxmail.com
 * @description:
 * @version: 1.0.0
 * ============================= 版本修正历史记录 ==========================
 * 版 本:          修改时间:          修改人:
 * 修改内容:
 *      //
 */

namespace qh4module\setting;

use qh4module\setting\external\ExtSetting;

/**
 * Class HpSetting
 * @package qh4module\setting
 */
class HpSetting
{
    /**
     * 获取一条设置
     * @param string $key KEY值,也支持.形式,表示group.key
     * @param bool $effective 是否有效才返回
     * @param bool $only_value 是否只返回值(value字段)
     * @param ExtSetting|null $external
     * @return array|mixed|null
     */
    public static function getOne($key, $effective = false, $only_value = true,ExtSetting $external=null)
    {
        if(is_null($external)) $external = new ExtSetting();

        $ary_key = explode('.', $key);
        if (sizeof($ary_key) > 1) {
            $where = [
                'group' => $ary_key[0],
                'key' => $ary_key[1],
            ];
        } else {
            $where = [
                'key' => $ary_key[0]
            ];
        }

        $sql = $external->getDb()
            ->select('*')
            ->from($external->settingTableName())
            ->whereArray($where);
        if ($effective) {
            $t = time();
            $sql->where('is_effective=1 and effective_start_time >= :t1 and effective_end_time <= :t2')
                ->bindValues(['t1' => $t, 't2' => $t]);
        }
        $result = $sql->where('del_time=0')
            ->row();

        if ($only_value) {
            return $result ? $result['value'] : null;
        }else{
            return $result;
        }
    }
}