<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:28 PM
 */

namespace App\Model;

/**
 * Class InvestigationQuestionAnswer
 * @package App\Model
 * @Author  zzhpeng
 * @property    int $investigation_id
 * @property    int  $user_id           回答用户id
 * @property    string  $ip           回答ip
 * @property    integer  $score          总分数
 * @property    string  $create_time          添加时间
 * @property    string  $update_time          添加时间
 * @property    string  $delete_time          删除时间
 */
class InvestigationQuestionAnswer extends BaseModel
{
    protected $table = 'investigation_question_answer';

    /**
     * 详情
     * @author: zzhpeng
     * Date: 12/3/2020
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details(){
        return $this->hasMany('App\Model\InvestigationQuestionAnswerDetail','investigation_question_answer_id','id');
    }
}