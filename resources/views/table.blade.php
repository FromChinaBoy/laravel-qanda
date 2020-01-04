@extends('layouts.app')

@section('content')
<div class="container">
    <div>

    </div>
    <div class="row justify-content-center">
        <div class="card" style="width: 1400px;">
            <div class="card-body">
                <form method="POST" action="#">
                    @csrf
                    <div class="form-scroll">
                        <div class="form-edit-wrap theme-default no-in-edit">
                            <div id="form-edit-toast-container" class="form-edit-toast-container"></div>
                            <div class="tab-wrap rc-tabs-nav-container tab-edit-wrap">
                                <div class="tab-nav-wrap">
                                    <div class="tab-nav-item active">
                                        问题
                                    </div>
                                    <div class="tab-nav-item">
                                        收集结果
                                    </div>
                                    <div class="tab-wrap-mask"></div>
                                    <div class="tab-wrap-bg-mask"></div>
                                </div>
                                <div class="select-ink-bar" style="width: 62px; display: block; transform: translate3d(292px, 0px, 0px);"></div>
                            </div>
                            <div>
                                <div class="form-edit-body">
                                    <div class="form-edit-info-card">
                                        <textarea placeholder="添加收集的主题" rows="1" class="form-edit-info-title null" style="height: 58px;"></textarea>
                                        <div class="form-edit-decs-wrap">
                                            <span></span>
                                            <div>
                                                <textarea placeholder="添加收集表说明" rows="1" class="form-edit-info-desc" style="height: 31px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="form-edit-question-root">
                                            <div class="smooth-dnd-container vertical" style="position: relative;">
                                                <div class="smooth-dnd-draggable-wrapper">
                                                    <div data-id="blank-1" class="form-item form-item-focus" style="margin-top: 20px;">
           <span class="question-drag-handle">
            <div class="question-drag"></div></span>
                                                        <div>
                                                            <div class="form-item-title ">
                                                                <q><span class="icon-number" data-number="01" style="position: relative; display: inline-block; width: 20px;"><i class="inumber icon-n0" style="position: relative; left: 0px; font-size: inherit;"></i><i class="inumber icon-n1" style="position: relative; left: -10px; font-size: inherit;"></i></span></q>
                                                                <input type="text" class="form-item-title-input" placeholder="输入问题，例如“你的姓名”" value="" />
                                                                <div class="form-item-title-select rc-select rc-select-enabled">
                                                                    <div class="rc-select-selection
            rc-select-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0">
                                                                        <div class="rc-select-selection__rendered">
                                                                            <div class="rc-select-selection-selected-value" title="单行文本" style="display: block; opacity: 1;">
                                                                                单行文本
                                                                            </div>
                                                                        </div>
                                                                        <span class="rc-select-arrow" unselectable="on" style="user-select: none;"><b></b></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-item-title-bottom">
                                                                <div class="form-item-title-bottom-border"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-edit-question-simple">
                                                            <div class="form-edit-question-simple-text-describe-wrapper">
                                                                <input class="form-edit-question-simple-text-describe" type="text" disabled="" placeholder="待填写者输入" />
                                                            </div>
                                                        </div>
                                                        <div class="form-item-bottom">
                                                            <div class="form-edit-required">
                                                                <div class="form-edit-required-checkbox"></div>
                                                                <span class="form-edit-required-text">必填</span>
                                                            </div>
                                                            <div class="form-item-bottom-separator"></div>
                                                            <div class="form-item-bottom-delete"></div>
                                                            <div class="form-item-bottom-copy"></div>
                                                            <div class="form-item-bottom-separator"></div>
                                                            <div class="form-item-bottom-more"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="smooth-dnd-draggable-wrapper" style="">
                                                    <div data-id="RADIO1577708009103k4sem2z5" class="form-item">
           <span class="question-drag-handle">
            <div class="question-drag"></div></span>
                                                        <div>
                                                            <div class="form-item-title ">
                                                                <q><span class="icon-number" data-number="02" style="position: relative; display: inline-block; width: 20px;"><i class="inumber icon-n0" style="position: relative; left: 0px; font-size: inherit;"></i><i class="inumber icon-n2" style="position: relative; left: -10px; font-size: inherit;"></i></span></q>
                                                                <input type="text" class="form-item-title-input" placeholder="输入问题" value="" />
                                                                <div class="form-item-title-select rc-select rc-select-enabled">
                                                                    <div class="rc-select-selection
            rc-select-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0">
                                                                        <div class="rc-select-selection__rendered">
                                                                            <div class="rc-select-selection-selected-value" title="单选" style="display: block; opacity: 1;">
                                                                                单选
                                                                            </div>
                                                                        </div>
                                                                        <span class="rc-select-arrow" unselectable="on" style="user-select: none;"><b></b></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-item-title-bottom">
                                                                <div class="form-item-title-bottom-border"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-edit-radio">
                                                            <div class="smooth-dnd-container vertical">
                                                                <div class="smooth-dnd-draggable-wrapper">
                                                                    <div>
                                                                        <div class="option-cell">
                <span class="option-drag-handle">
                 <div class="option-drag"></div></span>
                                                                            <div class="option-cell-type-box-radio"></div>
                                                                            <input type="text" class="option-cell-text" value="选项 1" />
                                                                            <span src="" class="option-cell-del-btn" value="删除" alt=""></span>
                                                                            <div class="option-cell-separator"></div>
                                                                            <div class="option-cell-bottom-border"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="smooth-dnd-draggable-wrapper">
                                                                    <div>
                                                                        <div class="option-cell">
                <span class="option-drag-handle">
                 <div class="option-drag"></div></span>
                                                                            <div class="option-cell-type-box-radio"></div>
                                                                            <input type="text" class="option-cell-text" value="选项 2" />
                                                                            <span src="" class="option-cell-del-btn" value="删除" alt=""></span>
                                                                            <div class="option-cell-separator"></div>
                                                                            <div class="option-cell-bottom-border"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-edit-radio-add-option">
                                                                <span class="form-edit-radio-add-option-add">添加选项</span>
                                                                <span><span class="form-edit-radio-add-option-or">&nbsp;|&nbsp;</span><span class="form-edit-radio-add-option-other">添加&quot;其他&quot;项</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-item-bottom">
                                                            <div class="form-edit-required">
                                                                <div class="form-edit-required-checkbox"></div>
                                                                <span class="form-edit-required-text">必填</span>
                                                            </div>
                                                            <div class="form-item-bottom-separator"></div>
                                                            <div class="form-item-bottom-delete"></div>
                                                            <div class="form-item-bottom-copy"></div>
                                                            <div class="form-item-bottom-separator"></div>
                                                            <div class="form-item-bottom-more"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="smooth-dnd-draggable-wrapper" style="">
                                                    <div data-id="RADIO1577708015444k4sem7v9" class="form-item">
           <span class="question-drag-handle">
            <div class="question-drag"></div></span>
                                                        <div>
                                                            <div class="form-item-title ">
                                                                <q><span class="icon-number" data-number="03" style="position: relative; display: inline-block; width: 20px;"><i class="inumber icon-n0" style="position: relative; left: 0px; font-size: inherit;"></i><i class="inumber icon-n3" style="position: relative; left: -10px; font-size: inherit;"></i></span></q>
                                                                <input type="text" class="form-item-title-input" placeholder="输入问题" value="" />
                                                                <div class="form-item-title-select rc-select rc-select-enabled">
                                                                    <div class="rc-select-selection
            rc-select-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0">
                                                                        <div class="rc-select-selection__rendered">
                                                                            <div class="rc-select-selection-selected-value" title="单选" style="display: block; opacity: 1;">
                                                                                单选
                                                                            </div>
                                                                        </div>
                                                                        <span class="rc-select-arrow" unselectable="on" style="user-select: none;"><b></b></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-item-title-bottom">
                                                                <div class="form-item-title-bottom-border"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-edit-radio">
                                                            <div class="smooth-dnd-container vertical">
                                                                <div class="smooth-dnd-draggable-wrapper">
                                                                    <div>
                                                                        <div class="option-cell">
                <span class="option-drag-handle">
                 <div class="option-drag"></div></span>
                                                                            <div class="option-cell-type-box-radio"></div>
                                                                            <input type="text" class="option-cell-text" value="选项 1" />
                                                                            <span src="" class="option-cell-del-btn" value="删除" alt=""></span>
                                                                            <div class="option-cell-separator"></div>
                                                                            <div class="option-cell-bottom-border"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="smooth-dnd-draggable-wrapper">
                                                                    <div>
                                                                        <div class="option-cell">
                <span class="option-drag-handle">
                 <div class="option-drag"></div></span>
                                                                            <div class="option-cell-type-box-radio"></div>
                                                                            <input type="text" class="option-cell-text" value="选项 2" />
                                                                            <span src="" class="option-cell-del-btn" value="删除" alt=""></span>
                                                                            <div class="option-cell-separator"></div>
                                                                            <div class="option-cell-bottom-border"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-edit-radio-add-option">
                                                                <span class="form-edit-radio-add-option-add">添加选项</span>
                                                                <span><span class="form-edit-radio-add-option-or">&nbsp;|&nbsp;</span><span class="form-edit-radio-add-option-other">添加&quot;其他&quot;项</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-item-bottom">
                                                            <div class="form-edit-required">
                                                                <div class="form-edit-required-checkbox"></div>
                                                                <span class="form-edit-required-text">必填</span>
                                                            </div>
                                                            <div class="form-item-bottom-separator"></div>
                                                            <div class="form-item-bottom-delete"></div>
                                                            <div class="form-item-bottom-copy"></div>
                                                            <div class="form-item-bottom-separator"></div>
                                                            <div class="form-item-bottom-more"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="smooth-dnd-draggable-wrapper" style="">
                                                    <div data-id="blank-2" class="form-item">
           <span class="question-drag-handle">
            <div class="question-drag"></div></span>
                                                        <div>
                                                            <div class="form-item-title ">
                                                                <q><span class="icon-number" data-number="04" style="position: relative; display: inline-block; width: 20px;"><i class="inumber icon-n0" style="position: relative; left: 0px; font-size: inherit;"></i><i class="inumber icon-n4" style="position: relative; left: -10px; font-size: inherit;"></i></span></q>
                                                                <input type="text" class="form-item-title-input" placeholder="输入问题，例如“你的性别”" value="" />
                                                                <div class="form-item-title-select rc-select rc-select-enabled">
                                                                    <div class="rc-select-selection
            rc-select-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0">
                                                                        <div class="rc-select-selection__rendered">
                                                                            <div class="rc-select-selection-selected-value" title="单选" style="display: block; opacity: 1;">
                                                                                单选
                                                                            </div>
                                                                        </div>
                                                                        <span class="rc-select-arrow" unselectable="on" style="user-select: none;"><b></b></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-item-title-bottom">
                                                                <div class="form-item-title-bottom-border"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-edit-radio">
                                                            <div class="smooth-dnd-container vertical">
                                                                <div class="smooth-dnd-draggable-wrapper">
                                                                    <div>
                                                                        <div class="option-cell">
                <span class="option-drag-handle">
                 <div class="option-drag"></div></span>
                                                                            <div class="option-cell-type-box-radio"></div>
                                                                            <input type="text" class="option-cell-text" value="选项 1" />
                                                                            <span src="" class="option-cell-del-btn" value="删除" alt=""></span>
                                                                            <div class="option-cell-separator"></div>
                                                                            <div class="option-cell-bottom-border"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="smooth-dnd-draggable-wrapper">
                                                                    <div>
                                                                        <div class="option-cell">
                <span class="option-drag-handle">
                 <div class="option-drag"></div></span>
                                                                            <div class="option-cell-type-box-radio"></div>
                                                                            <input type="text" class="option-cell-text" value="选项 2" />
                                                                            <span src="" class="option-cell-del-btn" value="删除" alt=""></span>
                                                                            <div class="option-cell-separator"></div>
                                                                            <div class="option-cell-bottom-border"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-edit-radio-add-option">
                                                                <span class="form-edit-radio-add-option-add">添加选项</span>
                                                                <span><span class="form-edit-radio-add-option-or">&nbsp;|&nbsp;</span><span class="form-edit-radio-add-option-other">添加&quot;其他&quot;项</span></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-item-bottom">
                                                            <div class="form-edit-required">
                                                                <div class="form-edit-required-checkbox"></div>
                                                                <span class="form-edit-required-text">必填</span>
                                                            </div>
                                                            <div class="form-item-bottom-separator"></div>
                                                            <div class="form-item-bottom-delete"></div>
                                                            <div class="form-item-bottom-copy"></div>
                                                            <div class="form-item-bottom-separator"></div>
                                                            <div class="form-item-bottom-more"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-edit-question-root-height"></div>
                                        </div>
                                        <div class="form-edit-right-bar" style="top: 362px;">
                                            <div class="form-edit-right-bar-left" style="width: 56px;"></div>
                                            <div class="form-edit-right-bar-right"></div>
                                        </div>
                                    </div>
                                    <div class="form-edit-fix-seat"></div>
                                    <div class="form-edit-fix-bar fixed">
                                        <div class="form-edit-fix-bar-wrap">
                                            <button type="button" data-key="done" class="form-edit-fix-bar-wrap-btn primary">
                                                <div class="button-icon"></div>发布</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="position: absolute; top: 0px; left: 0px; width: 100%;">
                                <div>
                                    <div class="rc-select-dropdown rc-select-dropdown--single   rc-select-dropdown-hidden" style="left: 539px; top: 480.5px;">
                                        <div style="overflow: auto;">
                                            <ul role="listbox" class="rc-select-dropdown-menu  rc-select-dropdown-menu-root rc-select-dropdown-menu-vertical" tabindex="0">
                                                <li class=" rc-select-dropdown-menu-item-group">
                                                    <div class="rc-select-dropdown-menu-item-group-title" title="0">
                                                        0
                                                    </div>
                                                    <ul class="rc-select-dropdown-menu-item-group-list">
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">单行文本</li>
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">多行文本</li>
                                                    </ul></li>
                                                <li class=" rc-select-dropdown-menu-item-group">
                                                    <div class="rc-select-dropdown-menu-item-group-title" title="1">
                                                        1
                                                    </div>
                                                    <ul class="rc-select-dropdown-menu-item-group-list">
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item rc-select-dropdown-menu-item-active rc-select-dropdown-menu-item-selected" aria-selected="true" style="user-select: none;">单选</li>
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">多选</li>
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">下拉选择</li>
                                                    </ul></li>
                                                <li class=" rc-select-dropdown-menu-item-group">
                                                    <div class="rc-select-dropdown-menu-item-group-title" title="2">
                                                        2
                                                    </div>
                                                    <ul class="rc-select-dropdown-menu-item-group-list">
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">日期</li>
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">时间</li>
                                                    </ul></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="position: absolute; top: 0px; left: 0px; width: 100%;">
                                <div>
                                    <div class="rc-select-dropdown rc-select-dropdown--single   rc-select-dropdown-hidden" style="width: 144px; left: 539px; top: 334.5px;">
                                        <div style="overflow: auto;">
                                            <ul role="listbox" class="rc-select-dropdown-menu  rc-select-dropdown-menu-root rc-select-dropdown-menu-vertical" tabindex="0">
                                                <li class=" rc-select-dropdown-menu-item-group">
                                                    <div class="rc-select-dropdown-menu-item-group-title" title="0">
                                                        0
                                                    </div>
                                                    <ul class="rc-select-dropdown-menu-item-group-list">
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item rc-select-dropdown-menu-item-selected" aria-selected="true" style="user-select: none;">单行文本</li>
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">多行文本</li>
                                                    </ul></li>
                                                <li class=" rc-select-dropdown-menu-item-group">
                                                    <div class="rc-select-dropdown-menu-item-group-title" title="1">
                                                        1
                                                    </div>
                                                    <ul class="rc-select-dropdown-menu-item-group-list">
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">单选</li>
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">多选</li>
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">下拉选择</li>
                                                    </ul></li>
                                                <li class=" rc-select-dropdown-menu-item-group">
                                                    <div class="rc-select-dropdown-menu-item-group-title" title="2">
                                                        2
                                                    </div>
                                                    <ul class="rc-select-dropdown-menu-item-group-list">
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">日期</li>
                                                        <li role="option" unselectable="on" class="rc-select-dropdown-menu-item" aria-selected="false" style="user-select: none;">时间</li>
                                                    </ul></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <template>
                        <el-tabs v-model="activeName" @tab-click="handleClick">
                            <el-tab-pane label="问题" name="first">
                                <el-main>
                                    <el-form ref="form" :model="form" label-width="80px">
                                        <el-form-item label="输入问题">
                                            <el-input v-model="form.name"></el-input>
                                        </el-form-item>
                                        <el-form-item label="输入问题">
                                            <el-select v-model="form.region" placeholder="请选择活动区域">
                                                <el-option label="选项 1" value="shanghai"></el-option>
                                                <el-option label="选项 2" value="beijing"></el-option>
                                            </el-select>
                                        </el-form-item>
                                        <el-form-item label="输入问题">
                                            <el-col :span="11">
                                                <el-date-picker type="date" placeholder="选择日期" v-model="form.date1" style="width: 100%;"></el-date-picker>
                                            </el-col>
                                        </el-form-item>
                                        <el-form-item label="输入问题">
                                            <el-col :span="11">
                                                <el-time-picker placeholder="选择时间" v-model="form.date2" style="width: 100%;"></el-time-picker>
                                            </el-col>
                                        </el-form-item>

                                        <el-form-item label="输入问题">
                                            <el-checkbox-group v-model="form.type">
                                                <el-checkbox label="选项 1" name="type"></el-checkbox>
                                                <el-checkbox label="选项 2" name="type"></el-checkbox>
                                                <el-checkbox label="选项 3" name="type"></el-checkbox>
                                                <el-checkbox label="选项 4" name="type"></el-checkbox>
                                            </el-checkbox-group>
                                        </el-form-item>
                                        <el-form-item label="输入问题">
                                            <el-radio-group v-model="form.resource">
                                                <el-radio label="选项 1"></el-radio>
                                                <el-radio label="选项 2"></el-radio>
                                            </el-radio-group>
                                        </el-form-item>
                                        <el-form-item label="输入问题">
                                            <el-input type="textarea" v-model="form.desc"></el-input>
                                        </el-form-item>
                                        <el-form-item>
                                            <el-button type="primary" @click="onSubmit">发布</el-button>
                                        </el-form-item>
                                    </el-form>
                                </el-main>
                            </el-tab-pane>
                            <el-tab-pane label="收集结果" name="second">
                                <div class="form-result">
                                    <div>
                                        <div class="form-result-empty">
                                            <div>
                                                <div class="form-result-wrap-head">
                                                    <div class="form-result-wrap-head-count">
                                                        暂时无人填写。
                                                    </div>
                                                    <div class="form-result-wrap-button-wrap">
                                                        <div class="dropdown-select " style="margin-top: 5px; margin-right: 12px; width: 154px;">
                                                            <div class="dropdown-select-outer">
                                                                <div class="dropdown-select-outer-text">
                                                                    <div class="dropdown-select-outer-icon"></div>将结果汇总到表格
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-result-wrap-head-stop-hidden">
                                                            <div>
                                                                停止收集
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="unsubmit-wrap">
                                                    <div>
                                                        <span class="result-write-member"><span class="icon-number" data-number="0" style="position: relative; display: inline-block; width: 13px; left: -10px;"><i class="inumber icon-n0" style="position: relative; left: 0px; font-size: 26px;"></i></span>人填写</span>
                                                        <span class="result-write-num"><span class="icon-number" data-number="0" style="position: relative; display: inline-block; width: 13px; left: -10px;"><i class="inumber icon-n0" style="position: relative; left: 0px; font-size: 26px;"></i></span>份结果</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-result-empty-line"></div>
                                            <div class="form-result-empty-tips">
                                                <div class="form-result-empty-tips-icon"></div>
                                                <div class="form-result-empty-tips-word">
                                                    暂时没有提交记录
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </el-tab-pane>
                        </el-tabs>
                    </template>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
