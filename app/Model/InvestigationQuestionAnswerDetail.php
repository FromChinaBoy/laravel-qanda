<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:28 PM
 */

namespace App\Model;

/**
 * Class InvestigationQuestionAnswerDetail
 * @package App\Model
 * @Author  zzhpeng
 * @property    int $investigation_question_id
 * @property    int $investigation_question_answer_id
 * @property    string  $content             回答内容
 * @property    int  $user_id           回答用户id
 * @property    integer  $score          分数
 * @property    string  $create_time          添加时间
 * @property    string  $update_time          添加时间
 * @property    string  $delete_time          删除时间
 */
class InvestigationQuestionAnswerDetail extends BaseModel
{
    protected $table = 'investigation_question_answer_detail';
}