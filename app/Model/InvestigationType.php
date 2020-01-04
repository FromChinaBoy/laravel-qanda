<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/16
 * Time: 10:25 PM
 */

namespace App\Model;

/**
 * Class InvestigationType
 * @package App\Model
 * @Author  zzhpeng
 * @property    integer $user_id
 * @property    string  $name              分类名
 * @property    int     $sort              排序
 * @property    int     $status            状态 1:启用 0:禁用
 * @property    string  $create_time       添加时间
 * @property    string  $update_time       添加时间
 * @property    string  $delete_time       删除时间
 */
class InvestigationType extends BaseModel
{
    protected $table = 'investigation_type';

    /**
     * 调查模板表
     * @author: zzhpeng
     * Date: 2019/12/30
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function investigationTemplates()
    {
        return $this->hasMany('App\Model\InvestigationTemplate', 'type_id','id');
    }
}