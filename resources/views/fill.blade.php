@extends('layouts.app')

@section('content')
    <div class="container">
        <div>

        </div>
        <div class="row justify-content-center">
            <div class="card" style="width: 1400px;">
                <div class="card-body">
                    <form method="POST" action="#21121">
                        @csrf
                        <template>
                            <el-tabs v-model="activeName" @tab-click="handleClick">
                                <el-tab-pane label="调表" name="first">
                                    <qs-fill style="padding-bottom:200px"></qs-fill>
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
</script>