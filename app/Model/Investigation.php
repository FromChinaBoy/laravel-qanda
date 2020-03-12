<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:25 PM
 */

namespace App\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Investigation
 * @package App\Model
 * @Author  zzhpeng
 * @property    integer $id
 * @property    integer $user_id              用户id
 * @property    string  $name                 调查名
 * @property    string  $desc                 描述
 * @property    integer $status               状态 1:启用 0:禁用
 * @property    string  $effective_time       有效期
 * @property    string  $create_time          添加时间
 * @property    string  $update_time          添加时间
 * @property    string  $delete_time          删除时间
 */
class Investigation extends BaseModel
{
    use SimpleStatus;
    use SoftDeletes;

    protected $table = 'investigation';

    /**
     * @author: zzhpeng
     * Date: 2020/1/9
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions(){
        return $this->hasMany( 'App\Model\InvestigationQuestion','investigation_id','id');
    }

    /**
     * 选项答案
     * @author: zzhpeng
     * Date: 2020/1/13
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers(){
        return $this->hasMany('App\Model\InvestigationQuestionAnswer','investigation_id','id');
    }
}