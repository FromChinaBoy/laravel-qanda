<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:27 PM
 */

namespace App\Model;

/**
 * Class InvestigationOptionRelation
 * @package App\Model
 * @Author  zzhpeng
 * @property    integer $user_id                          用户id
 * @property    integer $investigation_id                 调查id
 * @property    integer $investigation_option_id          选项
 * @property    integer $sort                             排序
 * @property    string  $create_time                      添加时间
 * @property    string  $update_time                      添加时间
 * @property    string  $delete_time                      删除时间
 */
class InvestigationQuestionRelation extends BaseModel
{
    protected $table = 'investigation_question_relation';

    /**
     * @author: zzhpeng
     * Date: 2020/1/9
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question(){
        return $this->belongsTo('App\Model\InvestigationQuestion','investigation_question_id','id');
    }
}