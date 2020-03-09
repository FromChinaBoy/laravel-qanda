<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2/3/2020
 * Time: 11:34 PM
 */

namespace App\Logic;


use App\Model\Investigation;
use App\Model\InvestigationQuestionOption;
use Illuminate\Support\Facades\Auth;

class InvestigationLogic
{
    /**
     * 获取调查详情
     * @author: zzhpeng
     * Date: 3/3/2020
     * @param $investigationId
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public static function getInvestigationDetail($investigationId){
        $myInvestigation = (new Investigation())->with(['questions'=>function($q){
            $q->with('options')->orderBy('sort','asc');
        }])
            ->where('user_id',Auth::id())
            ->orderBy('id','desc')
            ->orderBy('status','desc')
            ->findOrFail($investigationId);
        return $myInvestigation;
    }

    /**
     * 通过ids删除
     * @author: zzhpeng
     * Date: 9/3/2020
     * @param       $ids
     * @param array $oldIds
     */
    public static function delInvestigationOptionWithIds($ids,$oldIds = []){
       $investigationQuestionModel = new InvestigationQuestionOption();
       if(!empty($oldIds)){
            $delIds = array_diff($oldIds,$ids);
       }else{
            $delIds = $ids;
        }
       $investigationQuestionModel->whereIn('id',$delIds)->delete();
    }
}