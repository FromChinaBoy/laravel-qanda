<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:26 PM
 */

namespace App\Model;


class InvestigationQuestion extends BaseModel
{
    protected $table = 'investigation_question';

    /**
     * 选项
     * @author: zzhpeng
     * Date: 2020/1/13
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options(){
        return $this->hasMany('App\Model\InvestigationQuestionOption','investigation_question_id','id');
    }
}