@extends('layouts.app')

@section('content')
<div class="container">
    <div>

    </div>
    <div class="row justify-content-center">
        <div class="card" style="width: 1400px;">
            <div class="card-body">
                @csrf
                <template>
                    <el-tabs v-model="activeName" @tab-click="handleClick">
                        <el-tab-pane label="问卷列表" name="first">
                            <qs-list></qs-list>
                        </el-tab-pane>
                    </el-tabs>
                </template>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    var investigations = {!!$my_investigations!!};
    console.log(investigations);

</script>