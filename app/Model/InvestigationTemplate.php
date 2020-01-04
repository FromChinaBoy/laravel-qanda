<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:26 PM
 */

namespace App\Model;

/**
 * Class InvestigationTemplate
 * @package App\Model
 * @Author  zzhpeng
 * @property    integer $user_id
 * @property    integer $type_id           调查分类id
 * @property    string  $name              模板名字
 * @property    string  $desc              简要描述
 * @property    int     $status            状态 1:启用 0:禁用
 * @property    string  $create_time       添加时间
 * @property    string  $update_time       添加时间
 * @property    string  $delete_time       删除时间
 */
class InvestigationTemplate extends BaseModel
{
    use SimpleStatus;

    protected $table = 'investigation_template';
}