<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .el-header, .el-footer {
            text-align: center;
        }

        .el-aside {
            background-color: #D3DCE6;
            color: #333;
            text-align: center;
            line-height: 200px;
        }

        .el-main {
            background-color: #E9EEF3;
            color: #333;
            text-align: center;
            line-height: 160px;
        }

        body > .el-container {
            margin-bottom: 40px;
        }

        .el-container:nth-child(5) .el-aside,
        .el-container:nth-child(6) .el-aside {
            line-height: 260px;
        }

        .el-container:nth-child(7) .el-aside {
            line-height: 320px;
        }

        .el-row {
            margin-bottom: 20px;
        &:last-child {
             margin-bottom: 0;
         }
        }
        .el-col {
            border-radius: 4px;
        }
        .bg-purple-dark {
            background: #99a9bf;
        }
        .bg-purple {
            background: #d3dce6;
        }
        .bg-purple-light {
            background: #e5e9f2;
        }
        .grid-content {
            border-radius: 4px;
            min-height: 36px;
        }
        .row-bg {
            padding: 10px 0;
            background-color: #f9fafc;
        }

        /*div*/
        .template-table-wrapper .form .form-introduce-wrap {
            margin: 0 auto;
            text-align: right;
            line-height: 22px;
        }

        .template-table-wrapper .form .form-introduce-wrap .form-introduce-content {
            display: -webkit-inline-box;
            display: inline-flex;
            font-size: 16px;
            color: #333333;
            margin-right: 20px;
            padding: 2px;
            cursor: pointer;
            background-repeat: no-repeat;
            background-position: left;
            background-size: 22px;
            background-image: url(//docs.idqqimg.com/tim/docs/desktop/img/packages/desktop/src/img/form-introduce-image@2x-ab9d0c.png);
        }

        .template-table-wrapper .form .form-introduce-wrap .form-introduce-text {
            margin-left: 26px;
        }

        .template-table-wrapper .form .section {
            margin: 0 auto;
            max-width: 1260px;
        }

        @media (max-width: 419px) and (min-width: 210px){
            .template-table-wrapper
            .form .section {
                width: 210px;
            }
        }


        .template-table-wrapper .form .section-title {
            width: auto;
            height: auto;
            line-height: 33px;
            text-align: left;
            margin-left: 15px;
            margin-bottom: -4px;
            margin-top: 20px;
            font-size: 20px;
            color: #000000;
        }

        .template-table-wrapper .form .sub {
            position: relative;
            display: inline-block;
            margin: 18px 14px 17px 14px;
            vertical-align: top;
        }



        .template-table-wrapper .form .thumb-wrapper {
            width: 182px;
            height: 248px;
            display: inline-block;
            -webkit-user-select: none;
            -moz-user-select: none;
            margin-bottom: 5px;
            cursor: pointer;
        }

        .template-table-wrapper .form .thumb-wrapper .thumb-base {
            width: 182px;
            height: 246px;
            text-align: center;
            max-width: 100%;
            max-height: 100%;
            border-style: solid;
            border-width: 1px;
            border-color: rgba(150, 150, 150, 0.29);
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            background-color: white;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.04);
        }

        .template-table-wrapper .doc .subitem-title, .template-table-wrapper .sheet .subitem-title, .template-table-wrapper .slide .subitem-title, .template-table-wrapper .form .subitem-title, .template-table-wrapper .my-template .subitem-title {
            display: -webkit-box;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
        }

        .subitem-title {
            height: auto;
            width: auto;
            font-size: 16px;
            line-height: 25px;
            cursor: pointer;
            color: black;
            word-break: keep-all;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .template-table-wrapper .form .subitem-title span {
            max-width: 130px;
            display: inline-block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .template-table-wrapper .form .subitem-white-subtitle {
            color: #f8f8f8;
            margin-left: 10px;
            margin-top: 23px;
            font-size: 12px;
            text-align: center;
            line-height: 20px;
        }

        .form-result {
            padding: 50px 50px 0;
            background-color: #fff;
        }

        .form-result-empty {
            font-size: 28px;
            line-height: 40px;
        }

        .form-result-wrap-head {
            min-height: 40px;
            line-height: 40px;
            font-size: 28px;
            text-align: left;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .form-result-wrap-head-count {
            min-width: 385px;
        }

        .form-result-wrap-button-wrap {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
            min-width: 280px;
            -webkit-box-pack: end;
            -webkit-justify-content: flex-end;
            justify-content: flex-end;
        }

        .dropdown-select {
            height: 30px;
            position: relative;
        }

        .form-result-wrap-head-stop, .form-result-wrap-head-stop-hidden {
            float: right;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            border: 1px solid rgba(0,0,0,.16);
            width: 84px;
            height: 30px;
            margin-top: 5px;
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            pointer-events: auto;
        }

        .form-result-wrap-head-stop-hidden>div, .form-result-wrap-head-stop>div {
            font-size: 14px;
            line-height: 20px;
        }

        .unsubmit-wrap {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            font-size: 14px;
            margin-top: 22px;
            margin-bottom: 20px;
        }

        .form-result-empty-line {
            height: 1px;
            margin-top: 39px;
            background-image: url(//docs.idqqimg.com/tim/docs/forms/img/img/form-edit-dotted-line-762acd.png);
        }

        .unsubmit-wrap .result-write-member {
            margin-right: 15px;
        }

        .unsubmit-wrap span {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
        }

        .unsubmit-wrap span {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
        }

        .inumber {
            font-family: inumber!important;
            font-size: 16px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .is-new-form .form-result-empty-tips-icon {
            background-image: url(//docs.idqqimg.com/tim/docs/forms/img/img/invalid-name-6edfb4.png);
        }

        .form-result-empty-tips-icon {
            height: 160px;
            width: 160px;
            background-image: url(//docs.idqqimg.com/tim/docs/forms/img/img/form-edit-empty-collect-7d6cf1.png);
        }

        .form-result-empty-tips-word {
            font-size: 18px;
            color: rgba(0,0,0,.64);
            line-height: 25px;
            margin-top: 24px;
        }

        .dropdown-select-inner, .dropdown-select-outer-text {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        .dropdown-select-outer-text {
            padding: 4px 8px;
            font-size: 14px;
            line-height: 20px;
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
        }

        .dropdown-select-outer-icon {
            width: 16px;
            height: 16px;
            margin-right: 4px;
            background-image: url(//docs.idqqimg.com/tim/docs/forms/img/img/form-edit-collect-preview-59e05a.png);
        }

        .dropdown-select-outer {
            height: 100%;
            -webkit-border-radius: 2px;
            border-radius: 2px;
            border: 1px solid rgba(0,0,0,.16);
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
        }

        /*table*/
        .form-scroll, .form-scroll-header-hide {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
            overflow: auto;
            -webkit-transition: margin-top .3s;
            transition: margin-top .3s;
            -webkit-overflow-scrolling: touch;
        }
        .form-scroll {
            z-index: 3;
            margin-top: 0;
        }
        .form-edit-wrap {
            width: 770px;
            margin: 17px auto;
            -webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,.06);
            box-shadow: 0 0 10px 0 rgba(0,0,0,.06);
            position: relative;
        }
        .form-edit-toast-container {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            position: fixed;
            left: 0;
            right: 0;
            z-index: 10001;
            width: 100%;
        }

        .form-edit-body {
            position: relative;
            background: #fff;
            padding-bottom: 18px;
        }

        .is-new-form .theme-default .form-edit-info-card {
            background: #fff;
            padding: 36px 48px;
        }

        .is-new-form .form-edit-info-card {
            min-height: 194px;
        }

        .theme-default .form-edit-info-card {
            background-color: #f79724;
            background-image: url(//docs.idqqimg.com/tim/docs/forms/img/img/form-edit-header-bg2@2x-fc5c94.png);
        }

        .form-edit-info-card {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            min-height: 180px;
            padding: 44px 50px 42px;
            background-repeat: no-repeat;
            -webkit-background-size: 100% 100%;
            background-size: 100%;
        }

        .is-new-form .form-edit-info-title {
            color: #000;
            font-weight: 500;
        }

        .theme-default .form-edit-info-title {
            color: #fff;
            max-width: 620px;
        }

        .form-edit-info-title {
            font-size: 38px;
            line-height: 52px;
            height: 58px;
            border: 0;
            resize: none;
            padding: 0;
            padding-bottom: 4px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            background: transparent;
            overflow: hidden;
        }

        .form-edit-info-card {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            justify-content: space-between;
            min-height: 180px;
            padding: 44px 50px 42px;
            background-repeat: no-repeat;
            -webkit-background-size: 100% 100%;
            background-size: 100%;
        }

        .is-new-form .form-edit-decs-wrap>span {
            display: inline-block;
            -webkit-background-size: cover;
            background-size: cover;
            width: 22px;
            height: 22px;
            margin-right: 16px;
            margin-top: 12px;
        }

        .form-edit-decs-wrap>div {
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            flex: 1;
        }

        .is-new-form .form-edit-decs-wrap .form-edit-info-desc {
            color: rgba(0,0,0,.48);
        }

        .is-new-form .form-edit-info-desc {
            color: rgba(0,0,0,.72);
            line-height: 180%;
        }

        .theme-default .form-edit-info-desc {
            color: hsla(0,0%,100%,.4);
        }

        .form-edit-decs-wrap>div textarea {
            width: 100%;
        }

        .form-edit-info-desc {
            margin-top: 12px;
            padding: 0;
            font-size: 14px;
            line-height: 20px;
            border: 0;
            resize: none;
            background: transparent;
            overflow: hidden;
            padding-bottom: 4px;
        }

        .form-edit-question-root {
            background: #f5f5f5;
        }

        .smooth-dnd-container {
            position: relative;
        }

        .form-edit-question-root .smooth-dnd-container.vertical>.smooth-dnd-draggable-wrapper {
            overflow: visible;
        }

        .form-edit-question-root .form-item-focus {
            -webkit-box-shadow: 0 -2px 2px 0 rgba(0,0,0,.16), 0 3px 16px 0 rgba(0,0,0,.16);
            box-shadow: 0 -2px 2px 0 rgba(0,0,0,.16), 0 3px 16px 0 rgba(0,0,0,.16);
            z-index: 1;
        }

        .form-edit-question-root .question-drag-handle {
            width: 770px;
            height: 25px;
            display: block;
            padding-top: 9px;
            cursor: move;
            -webkit-touch-callout: none;
        }

        .form-edit-question-root .question-drag {
            background-image: url(//docs.idqqimg.com/tim/docs/forms/img/css/sprites/icons_pc-17d5b5.png);
            background-position: -769px -67px;
            -webkit-background-size: 913px auto;
            background-size: 913px auto;
            width: 20px;
            height: 6px;
            margin: auto;
            display: none;
        }

        .smooth-dnd-container * {
            box-sizing: border-box;
        }

        .form-edit-question-root .form-item-title {
            display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            height: 50px;
            font-size: 20px;
            color: rgba(0,0,0,.32);
            border-bottom: 1px solid rgba(0,0,0,.04);
            margin-left: 50px;
            margin-right: 50px;
        }

        .form-edit-question-root .form-edit-question-root-height {
            height: 50px;
            background: #fff;
        }




    </style>
</head>
<body>
    <div id="app">
        @include('layouts._header')

        <main class="py-4">
            @yield('content')
        </main>

        @include('layouts._footer')
    </div>
</body>
</html>
