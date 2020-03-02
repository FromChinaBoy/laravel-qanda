<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:28 PM
 */

namespace App\Model;

/**
 * Class InvestigationQuestionOption
 * @package App\Model
 * @Author  zzhpeng
 * @property    int $investigation_question_id              调查问题id
 * @property    string $name             选项名
 * @property    int  $score              分数
 * @property    string  $create_time          添加时间
 * @property    string  $update_time          添加时间
 * @property    string  $delete_time          删除时间
 */
class InvestigationQuestionOption extends BaseModel
{
    protected $table = 'investigation_question_option';
}