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
                    <template>
                        <el-tabs v-model="activeName" @tab-click="handleClick">
                            <el-tab-pane label="问卷列表" name="first">
                                <div class="template-table-wrapper">
                                    <div id="template-table-form" data-type="form" class="template-table form">
                                        <div class="form-introduce-wrap">
                                            <div class="form-introduce-content">
                                                <div class="form-introduce-text">
                                                    收集表说明
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section" id="-1">
                                            <div class="section-title">
                                                常用
                                            </div>
                                            <div class="sub" data-type="form" data-tid="25000" id="25000">
                                                <a href="/table">
                                                    <div class="thumb-wrapper" >
                                                        <div class="thumb-shadow">
                                                            <div class="thumb-shadow">
                                                                <img id="thumb-25000" class="thumb-base" src="//docs.idqqimg.com/tim/docs/desktop/img/packages/desktop/src/img/black_doc_template@2x-3a21f0.png" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="subitem-title">
                                                    <span>空白</span>
                                                </div>
                                                <div class="subitem-white-subtitle">
                                                    f
                                                </div>
                                            </div>
                                            @foreach ($my_investigations as $my_investigation)
                                                <div class="sub" data-type="form" data-tid="{$my_investigation.id}" id="{$my_investigation.id}">
                                                    <div class="thumb-wrapper">
                                                        <div class="thumb-shadow">
                                                            <img id="thumb-30534" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190917/fe830247f8a634ec0f2203abba80b724.png" />
                                                        </div>
                                                    </div>
                                                    <div class="subitem-title">
                                                        <span>{{$my_investigation->name}}}</span>
                                                    </div>
                                                    <div class="subitem-subtitle">
                                                        12-17 | 19:34
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="section" id="10">
                                            <div class="section-title">
                                                本周推荐
                                            </div>
                                            @foreach ($recommends as $recommend)
                                            <div class="sub" data-type="form" data-tid="{{$recommend->id}}" id="{{$recommend->id}}">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30534" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190917/fe830247f8a634ec0f2203abba80b724.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>{{$recommend->name}}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @foreach ($type as $item)
                                        <div class="section" id="{{$item['id']}}">
                                            <div class="section-title">
                                                {{$item['name']}}
                                            </div>
                                            @foreach ($item['investigation_templates'] as $template)
                                            <div class="sub" data-type="form" data-tid="{{$template['id']}}" id="{{$template['id']}}">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30320" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/782adec91b42b9d440957e1fdb34529b.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>{{$template['name']}}</span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
                                    <div style="display: none;">
                                        <div class="eeui-spinner list-my-spinner"></div>
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
