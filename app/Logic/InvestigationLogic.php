<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2/3/2020
 * Time: 11:34 PM
 */

namespace App\Logic;


use App\Model\Investigation;
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
            $q->with('options')->orderBy('sort','desc');
        }])
            ->where('user_id',Auth::id())
            ->orderBy('id','desc')
            ->orderBy('status','desc')
            ->findOrFail($investigationId);
        return $myInvestigation;
    }
}