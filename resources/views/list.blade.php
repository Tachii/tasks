<div class="info-list">
    @if(isset($tasks))
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
    @else
        @lang('tasks::tasks.no_tasks')
    @endif
</div>