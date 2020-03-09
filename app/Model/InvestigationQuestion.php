<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:26 PM
 */

namespace App\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InvestigationQuestion
 * @package App\Model
 * @Author  zzhpeng
 * @property    int $investigation_id              调查id
 * @property    string $name              问题名
 * @property    string  $type              问题类型
 * @property    string  $is_must            是否必须
 * @property    integer  $sort           排序
 * @property    string  $create_time          添加时间
 * @property    string  $update_time          添加时间
 * @property    string  $delete_time          删除时间
 */
class InvestigationQuestion extends BaseModel
{
    use SoftDeletes;

    protected $table = 'investigation_question';

    const RADIO_TYPE = 'radio';
    const CHECKBOX_TYPE = 'checkbox';
    const TEXTAREA_TYPE = 'textarea';

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