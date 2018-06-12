@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            @include('common.errors')
                {!! Form::open(['url' => 'task', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    {!! echo Form::token(); !!}
                    <div class="form-group">
                        {!! echo Form::label('email', "{{ trans('messages.task') }}", ['class' => 'col-sm-3 control-label']); !!}  
                        <div class="col-sm-6">
                            {!! echo Form::text('name', ['class' => 'form-control','id' => 'task-name']); !!}      
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            {!! echo Form::submit("{{ trans('messages.add') }}", ['class' => 'btn btn-default']); !!}  
                        </div>
                    </div>
                {!! Form::close() !!}
        </div>
    </div>
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ trans('messages.currenttasks') }}
            </div>
            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>{{ trans('messages.task') }}</th>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td>
                                    {!! Form::open(['url' => "task/{{ $task->id }}", 'method' => 'DELETE']) !!}
                                        {!! echo Form::token(); !!}
                                        {!! echo Form::submit("{{ trans('messages.delete') }}", ['class' => 'btn btn-danger']); !!}  
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
