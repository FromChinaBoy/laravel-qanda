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
                                            <div class="sub" data-type="form" data-tid="30534" id="30534">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30534" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190917/fe830247f8a634ec0f2203abba80b724.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>通讯录收集表</span>
                                                </div>
                                                <div class="subitem-subtitle">
                                                    12-17 | 19:34
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section" id="10">
                                            <div class="section-title">
                                                本周推荐
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30534" id="30534">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30534" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190917/fe830247f8a634ec0f2203abba80b724.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>通讯录收集表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30538" id="30538">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30538" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190918/d18eba44dcc8dc8ba704ba79e45e54d1.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>学生信息收集表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30558" id="30558">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30558" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190923/034a2d5349704b5abb40fdaac8b7c6db.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>会议报名表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30559" id="30559">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30559" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190923/8ae2d18f1a111f76d0993b82cd5dc8f0.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>活动报名表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30560" id="30560">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30560" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190923/ce51e7a40f818f7f785eae654a3030e9.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>活动签到表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30561" id="30561">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30561" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190923/6c4de191b7224c8fec5fde8036c4eaaf.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>客户拜访表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30562" id="30562">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30562" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190923/f0d3caabc8392e09593cb0f0ee87ab23.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>订单统计表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30563" id="30563">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30563" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190923/86bddb7fa142499b5c15b553a44f105a.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>意见反馈表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30566" id="30566">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30566" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190923/4f114d3d9c554cafbb11555407c8b4da.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>工作日报</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30564" id="30564">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30564" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190923/e9584ec29baa948020e924e5b3b0ca29.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>工作周报</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30565" id="30565">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30565" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190923/f6c1c1724a8274771669cadce5ec81f9.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>团建活动投票</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30386" id="30386">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30386" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190801/e95b27a2a9aa01fe174d1be3c0a34074.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>运动签到打卡</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section" id="41">
                                            <div class="section-title">
                                                信息登记
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30320" id="30320">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30320" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/782adec91b42b9d440957e1fdb34529b.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>家长信息收集表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30321" id="30321">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30321" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/fc62f64578975db207b4328b93921fd4.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>员工信息收集表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30322" id="30322">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30322" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/8c74dc805ded0ce559106532927db49a.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>客户资料登记表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30323" id="30323">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30323" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/906298810833dc284bee069e98bb9da1.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>会员信息登记表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30363" id="30363">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30363" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/502a2663608a21850779688d7f1461be.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>简历登记表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30364" id="30364">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30364" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/dd1e3df38a43d4947c471622dac3ed5f.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>服装尺码登记表</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section" id="44">
                                            <div class="section-title">
                                                活动报名
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30365" id="30365">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30365" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/abc98ac3338d0582581ea897cb0be297.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>社团报名表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30367" id="30367">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30367" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/9ba82cae2660a97dadcca9d0a935e998.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>培训报名表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30371" id="30371">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30371" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/c57359c94ad32772bf31d5b6c3db53b6.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>讲座报名表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30372" id="30372">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30372" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/e916568b44cf4619fb9998f2b18445a1.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>线上预约</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30373" id="30373">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30373" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/93e82d6190e82f2d21345969b932ff4f.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>志愿者报名</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30374" id="30374">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30374" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/f17dad6d30616d30afd01dd27f5af0e3.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>聚会邀请</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section" id="45">
                                            <div class="section-title">
                                                教育培训
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30375" id="30375">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30375" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/18f6b3d53efbebf6e20bb0151784195a.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>培训需求调查</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30376" id="30376">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30376" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/606cd3b066aaf28f8280a682d28eab0b.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>培训签到表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30377" id="30377">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30377" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/9d2d833eb1e5aa2ddee8c8c1ab3227f9.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>培训结果反馈表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30378" id="30378">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30378" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/f8a8aff5d660030ebd296cb16d439def.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>课程意见反馈表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30379" id="30379">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30379" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190718/6e8c2ecac1ffb121b4192068d6b0149b.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>招生报名登记表</span>
                                                </div>
                                            </div>
                                            <div class="sub" data-type="form" data-tid="30380" id="30380">
                                                <div class="thumb-wrapper">
                                                    <div class="thumb-shadow">
                                                        <img id="thumb-30380" class="thumb-base" src="//pub.idqqimg.com/pc/misc/files/20190717/8dad95e4ab821a2042f9ea681146ea82.png" />
                                                    </div>
                                                </div>
                                                <div class="subitem-title">
                                                    <span>住校情况登记表</span>
                                                </div>
                                            </div>
                                        </div>
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
