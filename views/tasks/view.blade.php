@extends('totem::layout')
@section('page-title')
    @parent
    - 任務
@stop
@section('title')
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <h5 class="uk-card-title uk-margin-remove">任務細節</h5>
        <status-button :data-task="{{ $task }}" :data-exists="{{ $task->exists ? 'true' : 'false' }}" activate-url="{{route('totem.task.activate')}}" deactivate-url="{{route('totem.task.deactivate', $task)}}"></status-button>
    </div>
@stop
@section('main-panel-content')
    <ul class="uk-list uk-list-striped">
        <li>
            <span class="uk-text-muted uk-float-right">描述</span>
            <span class="uk-float-left">{{Str::limit($task->description, 80)}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">命令</span>
            <span class="uk-float-left">{{$task->command}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">參數</span>
            <span class="uk-float-left">{{$task->parameters ?? "N/A"}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">Cron 表達式</span>
            <span class="uk-float-left">
                <span>{{$task->getCronExpression()}}</span>
            </span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">時區</span>
            <span class="uk-float-left">{{$task->timezone}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">創建於</span>
            <span class="uk-float-left">{{$task->created_at->toDateTimeString()}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">更新於</span>
            <span class="uk-float-left">{{$task->updated_at->toDateTimeString()}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">Email 通知</span>
            <span class="uk-float-left">{{$task->notification_email_address ?? 'N/A'}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">SMS 通知</span>
            <span class="uk-float-left">{{$task->notification_phone_number ?? 'N/A'}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">Slack 通知</span>
            <span class="uk-float-left">{{$task->notification_slack_webhook ?? 'N/A'}}</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">平均運行時間</span>
            <span class="uk-float-left">{{$task->results->count() > 0 ? number_format(  $task->results->sum('duration') / (1000 * $task->results->count()) , 2) : '0'}} seconds</span>
        </li>
        <li>
            <span class="uk-text-muted uk-float-right">下次運行時間</span>
            <span class="uk-float-left">{{$task->upcoming }}</span>
        </li>
        @if($task->dont_overlap)
            <li>
                <span class="uk-float-left">不要與此任務的其他實例一起執行</span>
            </li>
        @endif
        @if($task->run_in_maintenance)
            <li>
                <span class="uk-float-left">在維護模式中運行</span>
            </li>
        @endif
        @if($task->run_on_one_server)
            <li>
                <span class="uk-float-left">在單一伺服器上運行</span>
            </li>
        @endif
        @if($task->run_in_background)
            <li>
                <span class="uk-float-left">在背景運行</span>
            </li>
        @endif
    </ul>
@stop
@section('main-panel-footer')
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <span>
            <a href="{{ route('totem.task.edit', $task) }}" class="uk-button uk-button-primary uk-button-small">編輯</a>
            <form class="uk-display-inline" action="{{route('totem.task.delete', $task)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" class="uk-button uk-button-danger uk-button-small">刪除</button>
            </form>
        </span>
        <execute-button :data-task="{{ $task }}" url="{{route('totem.task.execute', $task)}}" button-class="uk-button-small uk-button-primary"></execute-button>
    </div>
@stop
@section('additional-panels')
    <div class="uk-card uk-card-default uk-margin-top">
        <div class="uk-card-header">
            <h5 class="uk-card-title uk-margin-remove">運行結果</h5>
        </div>
        <div class="uk-card-body uk-padding-remove-top">
            <table class="uk-table uk-table-striped">
                <thead>
                    <tr>
                        <th>執行於</th>
                        <th>費時</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse($results = $task->results()->orderByDesc('created_at')->paginate(10) as $result)
                    <tr>
                        <td>{{$result->ran_at->toDateTimeString()}}</td>
                        <td>{{ number_format($result->duration / 1000 , 2)}} 秒</td>
                        <td>
                            <task-output output="{{nl2br($result->result)}}"></task-output>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="uk-text-center" colspan="5">
                            <p>尚未執行.</p>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <div class="uk-card-footer">
            {{$results->links('totem::partials.pagination')}}
        </div>
    </div>
@stop
