<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2020/1/17
 * Time: 3:48 PM
 */

namespace App\Http\Controllers;


use App\Logic\InvestigationLogic;
use App\Model\Investigation;
use App\Model\InvestigationQuestion;
use App\Model\InvestigationQuestionOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InvestigationController extends Controller
{
    public function index(Request $request)
    {

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
            $investigationLogic = InvestigationLogic::getInvestigationDetail($id);
            $myInvestigation = $investigationLogic->toArray();
        }

        return view('edit', ['my_investigation1'=>json_encode($myInvestigation)]);
    }

    //保存与更新
    public function save(Request $request){
        try{
            throw new \Exception('ss');
            //获取数据
            $all = $request->all();
            $questions = $request->input('questions');
            $id = $request->input('id');
            //验证数据
            $validator = Validator::make($all, [
                'name' => 'required',
                'desc' => 'required',
                'status' => 'required|In:0,1',
                'questions' => 'required|Array',
            ]);
            if ($validator->fails()) {
                throw new \Exception('data'.$validator->getMessageBag());
            }
            foreach ($questions as $question){
                $validator = Validator::make($question, [
                    'name' => 'required',
                    'type' => 'required|In:radio,checkbox,textarea',
                    'is_must' => 'required|In:0,1',
                ]);
                if ($validator->fails()) {
                    throw new \Exception('questions'.$validator->getMessageBag());
                }
                //type check and validation
                if($question['type'] != InvestigationQuestion::TEXTAREA_TYPE){
                    foreach($question['options'] as $option){
                        $validator = Validator::make($option, [
                            'name' => 'required',
                            'score' => 'required|Between:0,100',
                        ]);
                        if ($validator->fails()) {
                            throw new \Exception('option'.$validator->getMessageBag());
                        }
                    }
                }
            }
            $investigationId = DB::transaction(function() use($all,$questions,$id){
                if(empty($id)){
                    //add
                    //add Investigation
                    $investigation = new Investigation;
                    $investigation->user_id = Auth::id();
                    $investigation->name = $all['name'];
                    $investigation->desc = $all['desc'];
                    $investigation->status = $all['status'];
                    $investigation->effective_time = $all['effective_time'];
                    $investigation->saveOrFail();
                    //add InvestigationQuestion and Option
                    foreach ($questions as $question){
                        //add InvestigationQuestion
                        $investigationQuestion = new InvestigationQuestion();
                        $investigationQuestion->investigation_id = $investigation->id;
                        $investigationQuestion->name = $question['name'];
                        $investigationQuestion->type =   $question['type'];
                        $investigationQuestion->is_must = $question['is_must'];
                        $investigationQuestion->sort = $question['sort'];
                        $investigationQuestion->saveOrFail();
                        //add Option
                        if($question['type'] != InvestigationQuestion::TEXTAREA_TYPE) {
                            foreach ($question['options'] as $option) {
                                $investigationQuestionOption = new InvestigationQuestionOption();
                                $investigationQuestionOption->investigation_question_id = $investigationQuestion->id;
                                $investigationQuestionOption->name = $option['name'];
                                $investigationQuestionOption->score = $option['score'];
                                $investigationQuestionOption->saveOrFail();
                            }
                        }
                    }
                }else{
                //edit

                }
                return $investigation->id;
            });
            $investigationLogic = InvestigationLogic::getInvestigationDetail($investigationId);

            return $this->success( $investigationLogic->toArray());
        }catch (\Exception $e){
            return $this->error($e->getMessage());
        }

    }

    function del(Request $request){
        try{
            $id = $request->input('id');
            $investigationModel = new Investigation();
            $investigation = $investigationModel->where('id',$id)->where('user_id',Auth::id())->first();
            if(empty($investigation->id)){
                throw new \Exception('不存在该数据');
            }
            $investigation->delete();
            return $this->success();
        }catch (\Exception $exception){
            return $this->error($exception->getMessage());
        }

    }
}