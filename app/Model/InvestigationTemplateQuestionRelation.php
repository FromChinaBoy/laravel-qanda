<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:28 PM
 */

namespace App\Model;

/**
 * Class InvestigationTemplateOptionRelation
 * @package App\Model
 * @Author  zzhpeng
 * @property    integer $investigation_template_id
 * @property    integer $investigation_option_id
 * @property    int     $sort
 * @property    string  $create_time       添加时间
 * @property    string  $update_time       添加时间
 * @property    string  $delete_time       删除时间
 */
class InvestigationTemplateQuestionRelation extends BaseModel
{
    protected $table = 'investigation_template_option_relation';
}