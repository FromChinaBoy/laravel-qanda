<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2019/12/2
 * Time: 9:03 PM
 */

namespace App\Http\Controllers;


use App\Model\Investigation;
use App\Model\InvestigationTemplate;
use App\Model\InvestigationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * 首页
     * @author: zzhpeng
     * Date: 2019/12/24
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome(){
        $myInvestigations = [];
        if(Auth::id()){
            $myInvestigations = (new Investigation())->where('user_id',Auth::id())->get()->toArray();
        }

        return view('welcome', ['my_investigations'=>json_encode($myInvestigations)]);
    }

    /**
     * 表格
     * @author: zzhpeng
     * Date: 2019/12/29
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function table(){
        return view('table');
    }

    /**
     *  编辑页面
     * @author: zzhpeng
     * Date: 2020/1/10
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $myInvestigation = [];
        if($id>0){
            $myInvestigation = (new Investigation())->with('questionRelation.question.options')
                ->where('user_id',Auth::id())
                ->findOrFail($id);
        }

        return view('edit', ['my_investigation'=>json_encode($myInvestigation->toArray())]);

    }

    /**
     * 获取问卷列表
     * @author: zzhpeng
     * Date: 2019/12/29
     */
    public function questions(){
        $type = InvestigationType::with(['investigations'=>function($q){
            return $q->where('status',Investigation::enableStatus());
        },'investigationTemplates'=>function($q){
            return $q->where('status',InvestigationTemplate::enableStatus());
        }])->get()->toArray();

        return response($type, 200, array('Content-Type' => 'text/json'));
    }
}
