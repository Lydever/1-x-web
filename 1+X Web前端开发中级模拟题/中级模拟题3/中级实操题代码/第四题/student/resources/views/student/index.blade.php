@extends('common.layout')
@section('content')
    
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading" style="line-height: 50px;">学生列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>性别</th>
                <th width="160">操作</th>
            </tr>
            </thead>
            <tbody>
                ____(8)_____($students as $student)
                <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{$student->name}}</td>
                    <td>{{$student->age}}</td>
                    <td>{{$student->sex}}</td>
                    <td>
                        <a href="#">详情</a>
                        <a href="#">修改</a>
                        <a href="#">删除</a>
                    </td>
                </tr>
                ___(9)______
            </tbody>

        </table>
    </div>

    <!-- 分页  -->
    <div>
        <div class="pull-right">
            _____(10)______
        </div>
    </div>
@stop