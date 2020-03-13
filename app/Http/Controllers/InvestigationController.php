<?php
/**
 * Created by PhpStorm.
 * User: zzhpeng
 * Date: 2020/1/17
 * Time: 3:48 PM
 */

namespace App\Http\Controllers;


use App\Logic\ExportLogic;
use App\Logic\InvestigationLogic;
use App\Model\Investigation;
use App\Model\InvestigationQuestion;
use App\Model\InvestigationQuestionAnswer;
use App\Model\InvestigationQuestionAnswerDetail;
use App\Model\InvestigationQuestionOption;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $myInvestigation = [];
        if ($id > 0) {
            $investigationLogic = InvestigationLogic::getInvestigationDetail($id);
            $myInvestigation = $investigationLogic->toArray();
        }

        return view('edit', ['my_investigation' => json_encode($myInvestigation)]);
    }

    //保存与更新
    public function save(Request $request)
    {
        try {
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
                throw new \Exception('data' . $validator->getMessageBag());
            }
            foreach ($questions as $question) {
                $validator = Validator::make($question, [
                    'name' => 'required',
                    'type' => 'required|In:radio,checkbox,textarea',
                    'is_must' => 'required|In:0,1',
                ]);
                if ($validator->fails()) {
                    throw new \Exception('questions' . $validator->getMessageBag());
                }
                //type check and validation
                if ($question['type'] != InvestigationQuestion::TEXTAREA_TYPE) {
                    foreach ($question['options'] as $option) {
                        $validator = Validator::make($option, [
                            'name' => 'required',
                            'score' => 'required|Between:0,100',
                        ]);
                        if ($validator->fails()) {
                            throw new \Exception('option' . $validator->getMessageBag());
                        }
                    }
                }
            }
            $investigationId = DB::transaction(function () use ($all, $questions, $id) {
                if (empty($id)) {
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
                    foreach ($questions as $question) {
                        //add InvestigationQuestion
                        $investigationQuestion = new InvestigationQuestion();
                        $investigationQuestion->investigation_id = $investigation->id;
                        $investigationQuestion->name = $question['name'];
                        $investigationQuestion->type = $question['type'];
                        $investigationQuestion->is_must = $question['is_must'];
                        $investigationQuestion->sort = $question['sort'];
                        $investigationQuestion->saveOrFail();
                        //add Option
                        if ($question['type'] != InvestigationQuestion::TEXTAREA_TYPE) {
                            foreach ($question['options'] as $option) {
                                $investigationQuestionOption = new InvestigationQuestionOption();
                                $investigationQuestionOption->investigation_question_id = $investigationQuestion->id;
                                $investigationQuestionOption->name = $option['name'];
                                $investigationQuestionOption->score = $option['score'];
                                $investigationQuestionOption->saveOrFail();
                            }
                        }
                    }
                } else {
                    //edit
                    //edit Investigation
                    $investigationModel = new Investigation;
                    $investigation = $investigationModel->findOrFail($id);
                    $investigation->user_id = Auth::id();
                    $investigation->name = $all['name'];
                    $investigation->desc = $all['desc'];
                    $investigation->status = $all['status'];
                    $investigation->effective_time = $all['effective_time'];
                    $investigation->saveOrFail();
                    //edit InvestigationQuestion and Option

                    //删除InvestigationQuestion
                    $newIds = array_column($questions, 'id');
                    $investigationQuestionModel = new InvestigationQuestion();
                    $oldIds = $investigationQuestionModel->where('investigation_id', $id)->pluck('id')->toArray();
                    $delIds = array_diff($oldIds, $newIds);
                    if ($delIds) {
                        $investigationQuestionModel->whereIn('id', $delIds)->delete();
                        //删除InvestigationQuestionOption
                        $investigationQuestionOptionModel = new InvestigationQuestionOption();
                        $investigationQuestionOptionModel->whereIn('investigation_question_id', $delIds)->delete();
                    }

                    foreach ($questions as $question) {
                        //判断、添加、更新 InvestigationQuestion
                        //edit InvestigationQuestion
                        $investigationQuestionModel = new InvestigationQuestion();

                        $investigationQuestion = $investigationQuestionModel->find($question['id']);
                        if ($investigationQuestion) {
                            //更新
                            $investigationQuestion->investigation_id = $investigation->id;
                            $investigationQuestion->name = $question['name'];
                            $investigationQuestion->type = $question['type'];
                            $investigationQuestion->is_must = $question['is_must'];
                            $investigationQuestion->sort = $question['sort'];
                            $investigationQuestion->saveOrFail();
                            //删除InvestigationQuestion
                            $investigationQuestionOptionModel = new InvestigationQuestionOption();
                            $oldIds = $investigationQuestionOptionModel->where('investigation_question_id', $investigationQuestion->id)->pluck('id')->toArray();
                            //edit Option
                            if ($question['type'] != InvestigationQuestion::TEXTAREA_TYPE) {
                                //删除InvestigationQuestion
                                $newIds = array_column($question['options'], 'id');
                                InvestigationLogic::delInvestigationOptionWithIds($oldIds, $newIds);
                                foreach ($question['options'] as $option) {
                                    $investigationQuestionOptionModel = new InvestigationQuestionOption();
                                    //添加、更新 InvestigationQuestion
                                    $investigationQuestionOption = $investigationQuestionOptionModel->find($option['id']);
                                    if ($investigationQuestionOption) {
                                        //更新
                                        $investigationQuestionOption->investigation_question_id = $investigationQuestion->id;
                                        $investigationQuestionOption->name = $option['name'];
                                        $investigationQuestionOption->score = $option['score'];
                                        $investigationQuestionOption->saveOrFail();
                                    } else {
                                        //添加
                                        $investigationQuestionOptionModel->investigation_question_id = $investigationQuestion->id;
                                        $investigationQuestionOptionModel->name = $option['name'];
                                        $investigationQuestionOptionModel->score = $option['score'];
                                        $investigationQuestionOptionModel->saveOrFail();
                                    }
                                }
                            } else {
                                //如果改为InvestigationQuestion::TEXTAREA_TYPE ，删除option
                                if ($oldIds) {
                                    InvestigationLogic::delInvestigationOptionWithIds($oldIds);
                                }
                            }
                        } else {
                            //添加
                            $investigationQuestionModel->investigation_id = $investigation->id;
                            $investigationQuestionModel->name = $question['name'];
                            $investigationQuestionModel->type = $question['type'];
                            $investigationQuestionModel->is_must = $question['is_must'];
                            $investigationQuestionModel->sort = $question['sort'];
                            $investigationQuestionModel->saveOrFail();
                            //add Option
                            if ($question['type'] != InvestigationQuestion::TEXTAREA_TYPE) {
                                foreach ($question['options'] as $option) {
                                    $investigationQuestionOptionModel = new InvestigationQuestionOption();
                                    $investigationQuestionOptionModel->investigation_question_id = $investigationQuestionModel->id;
                                    $investigationQuestionOptionModel->name = $option['name'];
                                    $investigationQuestionOptionModel->score = $option['score'];
                                    $investigationQuestionOptionModel->saveOrFail();
                                }
                            }
                        }
                    }
                }
                return $investigation->id;
            });
            $investigationLogic = InvestigationLogic::getInvestigationDetail($investigationId);

            return $this->success($investigationLogic->toArray());
        } catch (\Exception $e) {
            throw $e;
            return $this->error($e->getMessage());
        }
    }

    /**
     * 删除
     * @author: zzhpeng
     * Date: 10/3/2020
     *
     * @param Request $request
     *
     * @return mixed
     */
    function del(Request $request)
    {
        try {
            $id = $request->input('id');
            $investigationModel = new Investigation();
            $investigation = $investigationModel->where('id', $id)->where('user_id', Auth::id())->first();
            if (empty($investigation->id)) {
                throw new \Exception('不存在该数据');
            }
            $investigation->delete();
            return $this->success();
        } catch (\Exception $exception) {
            return $this->error($exception->getMessage());
        }
    }

    /**
     * @author: zzhpeng
     * Date: 12/3/2020
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function fill($id)
    {
        $myInvestigation = [];
        if ($id > 0) {
            $investigationLogic = InvestigationLogic::getInvestigationDetail($id);
            $myInvestigation = $investigationLogic->toArray();
        }

        return view('fill', ['my_investigation' => json_encode($myInvestigation)]);
    }

    function fillSubmit(Request $request)
    {
        try {
            //获取数据
            $answer = $request->input('answer');
            $id = $request->input('id');

            //有效时间验证
            $investigation = (new Investigation())->findOrFail($id);
            if ($investigation->status != Investigation::enableStatus()) {
                throw new \Exception('表单未激活状态，不能填写');
            }
            if ($investigation->effective_time < date('Y-m-d')) {
                throw new \Exception('表单已过有效期');
            }

            //数据验证
            $investigationQuestions = InvestigationQuestion::whereIn('id', array_keys($answer))->get();
            if ($investigationQuestions->count() != count(array_keys($answer))) {
                throw new \Exception('提交数据有误');
            }

            //一个问题，限制一个ip提交一次
            // debug false
            if (!env('APP_DEBUG')) {
                $investigationQuestionAnswerCount = InvestigationQuestionAnswer::where('investigation_id', $investigationQuestions[0]->investigation_id)
                    ->where('ip', $request->getClientIp())
                    ->where('user_id', Auth::id())
                    ->count();
                if ($investigationQuestionAnswerCount) {
                    throw new \Exception('你已经提交过了');
                }
            }

            Db::transaction(function () use ($answer, $investigationQuestions, $request) {
                $investigationQuestionAnswerModel = new InvestigationQuestionAnswer();
                $investigationQuestionAnswerModel->investigation_id = $investigationQuestions[0]->investigation_id;
                $investigationQuestionAnswerModel->user_id = Auth::id();
                $investigationQuestionAnswerModel->score = 0;
                $investigationQuestionAnswerModel->ip = $request->getClientIp();
                $investigationQuestionAnswerModel->saveOrFail();
                foreach ($answer as $key => $val) {
                    $investigationQuestionAnswerDetailModel = new InvestigationQuestionAnswerDetail();
                    $investigationQuestionAnswerDetailModel->investigation_question_answer_id = $investigationQuestionAnswerModel->id;
                    $investigationQuestionAnswerDetailModel->investigation_question_id = $key;
                    $investigationQuestionAnswerDetailModel->score = 0;
                    $investigationQuestionAnswerDetailModel->content = is_array($val) ? implode(',', $val) : $val;
                    $investigationQuestionAnswerDetailModel->saveOrFail();
                }
            });

            return $this->success();
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * @author: zzhpeng
     * Date: 12/3/2020
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    function data($id)
    {
        try {
            $myInvestigation = [];
            if ($id > 0) {
                $investigationLogic = InvestigationLogic::getInvestigationDetail($id);
                $myInvestigation = $investigationLogic->toArray();
            }

            return view('data', ['my_investigation' => json_encode($myInvestigation)]);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * 导出
     * @author: zzhpeng
     * Date: 12/3/2020
     *
     * @param $id
     *
     * @return mixed
     */
    public function export($id)
    {
        try {
            $data = InvestigationLogic::exportData($id);
            $filename = date('Ymd') . 'investigation';
            ExportLogic::investigation($data->toArray(), $filename);
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }
    }
}