<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2020/1/17
 * Time: 3:48 PM
 */

namespace App\Http\Controllers;


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
            $myInvestigations = (new Investigation())->with(['questions'=>function($q){
                $q->with('options')->orderBy('sort','desc');
            }])
            ->where('user_id',Auth::id())
            ->findOrFail($id);
            $myInvestigation = $myInvestigations->toArray();

            var_dump($myInvestigation);exit;
        }

        return view('edit', ['my_investigation1'=>json_encode($myInvestigation)]);
    }

    //保存与更新
    public function save(Request $request){
        try{
            //获取数据
            $all = $request->all();
            $questions = $request->input('question');
            $id = $request->input('id');
            //验证数据
            $validator = Validator::make($all, [
                'name' => 'required',
                'desc' => 'required',
                'status' => 'required|In:0,1',
                'question' => 'required|Array',
            ]);
            if ($validator->fails()) {
                throw new \Exception('data'.$validator->getMessageBag());
            }
            foreach ($questions as $question){
                $validator = Validator::make($question, [
                    'name' => 'required',
                    'type' => 'required|In:radio,checkbox,textarea',
                    'is_must' => 'required|In:0,1',
                    'options' => 'required|Array',
                ]);
                if ($validator->fails()) {
                    throw new \Exception('question'.$validator->getMessageBag());
                }
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
            DB::transaction(function() use($all,$questions,$id){
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
                        $investigationQuestion->saveOrFail();
                        //add Option
                        foreach ($question['options'] as $option){
                            $investigationQuestionOption = new InvestigationQuestionOption();
                            $investigationQuestionOption->investigation_question_id = $investigationQuestion->id;
                            $investigationQuestionOption->name = $option['name'];
                            $investigationQuestionOption->score = $option['score'];
                            $investigationQuestionOption->saveOrFail();
                        }

                    }
                }else{
                //edit

                }
            });

            return $this->success('你好');
        }catch (\Exception $e){
            return $this->error($e->getMessage());
        }

    }
}