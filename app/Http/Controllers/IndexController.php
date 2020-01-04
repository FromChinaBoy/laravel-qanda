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
        $recommends = (new InvestigationTemplate())->where('is_recommend',Investigation::enableStatus())->get();
        $myInvestigations = (new Investigation())->where('user_id',Auth::id())->get();
        $type = InvestigationType::with(['investigationTemplates'=>function($q){
            return $q->where('status',InvestigationTemplate::enableStatus());
        }])->get()->toArray();

        return view('welcome', ['type' => $type,'recommends'=>$recommends,'my_investigations'=>$myInvestigations]);
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
