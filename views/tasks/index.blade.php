@extends("totem::layout")
@section('page-title')
    @parent
    - 任務
@stop
@section('title')
    <div class="uk-flex uk-flex-between uk-flex-middle">
        <h4 class="uk-card-title uk-margin-remove">任務清單</h4>
        {!! Form::open([
            'id' => 'totem__search__form',
            'url' => Request::fullUrl(),
            'method' => 'GET',
            'class' => 'uk-display-inline uk-search uk-search-default'
        ]) !!}
        <span uk-search-icon></span>
        {!! Form::text('q', request('q'), ['class' => 'uk-search-input', 'placeholder' => '查詢...']) !!}
        {!! Form::close() !!}
    </div>
@stop
@section('main-panel-content')
    <table class="uk-table uk-table-responsive" cellpadding="0" cellspacing="0" class="mb1">
        <thead>
            <tr>
                <th>{!! Html::columnSort('描述', 'description') !!}</th>
                <th>{!! Html::columnSort('平均運行時間', 'average_runtime') !!}</th>
                <th>{!! Html::columnSort('上一次執行', 'last_ran_at') !!}</th>
                <th>下一次執行</th>
                <th class="uk-text-center">執行</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr is="task-row"
                    :data-task="{{$task}}"
                    showHref="{{route('totem.task.view', $task)}}"
                    executeHref="{{route('totem.task.execute', $task)}}">
                </tr>
            @empty
                <tr>
                    <td class="uk-text-center" colspan="5">
                        <img class="uk-svg" width="50" height="50" src="{{asset('/vendor/totem/img/funnel.svg')}}">
                        <p>找不到任何任務.</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop
@section('main-panel-footer')
    <div class="uk-flex uk-flex-between">
        <span>
            <a class="uk-icon-button uk-button-primary uk-hidden@m" uk-icon="icon: plus" href="{{route('totem.task.create')}}"></a>
            <a class="uk-button uk-button-primary uk-button-small uk-visible@m" href="{{route('totem.task.create')}}">建立新任務</a>
        </span>

        <span>
            <import-button url="{{route('totem.tasks.import')}}"></import-button>
            <a class="uk-icon-button uk-button-primary uk-hidden@m" uk-icon="icon: cloud-download"  href="{{route('totem.tasks.export')}}"></a>
            <a class="uk-button uk-button-primary uk-button-small uk-visible@m" href="{{route('totem.tasks.export')}}">匯出</a>
        </span>
    </div>
    {{$tasks->links('totem::partials.pagination', ['params' => '&' . http_build_query(array_filter(request()->except('page')))])}}
@stop
