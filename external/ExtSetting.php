<?php
/**
 * File Name: ExtSetting.php
 * ©2020 All right reserved Qiaotongtianxia Network Technology Co., Ltd.
 * @author: hyunsu
 * @date: 2021/5/23 7:54 下午
 * @email: hyunsu@foxmail.com
 * @description:
 * @version: 1.0.0
 * ============================= 版本修正历史记录 ==========================
 * 版 本:          修改时间:          修改人:
 * 修改内容:
 *      //
 */

namespace qh4module\setting\external;


use qttx\web\External;

class ExtSetting extends External
{
    /**
     * @return string 设置表
     */
    public function settingTableName()
    {
        return '{{%setting}}';
    }

    /**
     * @return string 用户表
     */
    public function userInfoTableName()
    {
        return '{{bk_user_info}}';
    }

}