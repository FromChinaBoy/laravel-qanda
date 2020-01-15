<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:25 PM
 */

namespace App\Model;

/**
 * Class Investigation
 * @package App\Model
 * @Author  zzhpeng
 * @property    integer $user_id              用户id
 * @property    string  $name                 调查名
 * @property    string  $desc                 描述
 * @property    integer $status               状态 1:启用 0:禁用
 * @property    string  $create_time          添加时间
 * @property    string  $update_time          添加时间
 * @property    string  $delete_time          删除时间
 */
class Investigation extends BaseModel
{
    use SimpleStatus;

    protected $table = 'investigation';

    /**
     * @author: zzhpeng
     * Date: 2020/1/9
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questionRelation(){
        return $this->hasMany('App\Model\InvestigationQuestionRelation','investigation_id','id');
    }
}