<div class="panel-heading">
    <div class="flex-head">
        <div class="flex-head-direction">
            <div class="flex-head-item">
                <div class="panel-title">@lang('tasks::tasks.label')</div>
            </div>
        </div>
        <div class="flex-head-direction">
            <div class="flex-head-item">
                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#taskCreateModal">
                    <em>@lang('tasks::tasks.button_create_new')</em>
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="info-list">
    @foreach($tasks as $task)
    <div class="info-item">
        <div class="info-item-content">
            <h3>{{$task->description}}</h3>
            <div class="meta">@lang('tasks::tasks.assigned_to')
                <span class="green-text">John Doe(Replace Me) </span>@lang('tasks::tasks.due_to')
                <span class="green-text">{{$task->end_date}}</span>
            </div>
        </div>
        <div class="info-item-settings">
            <div class="ii-ssettings-list">
                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#timelineEditModal">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="#" class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@include('tasks::modals.task_create')
