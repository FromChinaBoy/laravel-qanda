@extends('layouts.app')

@section('content')
    <div class="container">
        <div>

        </div>
        <div class="row justify-content-center">
            <div class="card" style="width: 1400px;">
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <template>
                            <el-tabs v-model="activeName" @tab-click="handleClick">
                                <el-tab-pane label="数据" name="first">
                                    <qs-data style="padding-bottom:200px"></qs-data>
                                </el-tab-pane>
                            </el-tabs>
                        </template>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var my_investigation = {!! $my_investigation !!};
    console.log(my_investigation)
</script>
