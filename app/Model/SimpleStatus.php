<?php

namespace App\Model;

/**
 * Trait SimpleStatus
 * @package App\Model
 */
trait SimpleStatus
{
    //显示状态
    public static $enableStatus = 1;//记录启用状态
    public static $disableStatus = 0;//记录禁用显示

    /**
     * @author: zzhpeng
     * Date: 2019/12/29
     * @return int
     */
    public static function enableStatus()
    {
        return self::$enableStatus;
    }

    /**
     * @author: zzhpeng
     * Date: 2019/12/29
     * @return int
     */
    public static function disableStatus()
    {
        return self::$disableStatus;
    }

    public static function enableWhere()
    {
        return self::where('status', '=', self::enableStatus());
    }

    public static function disableWhere()
    {
        return self::where('status', '=', self::enableStatus());
    }

}