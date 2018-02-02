<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="taskCreateModalLabel">@lang('tasks::tasks.edit_task')</h4>
        </div>
        {{Form::open(['url' => route('tasks.update', ['task' => $task->id]), 'method' => 'patch'])}}
        <div class="modal-body">
            <div class="form-group">
                <label for="description" class="control-label">@lang('tasks::tasks.task_description')</label>
                <textarea rows="5" name="description" id="description"
                          placeholder="@lang('tasks::tasks.task_description_placeholder')"
                          class="form-control">{{$task->description}}</textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" data-datepicker=""
                       placeholder="@lang('tasks::tasks.due_date_placeholder')" value="{{$task->end_date}}"
                       name="end_date">
            </div>
            <div class="form-group">
                <label for="sel2" class="control-label">@lang('tasks::tasks.responsible_person')</label>
                <input type="hidden" name="assigned_type" value="{{get_class($responsibles->first())}}">
                {{ Form::select('assigned_id', $responsibles->pluck('name', 'id'), $task->assigned->id, ['class' => 'form-control', 'id' => 'sel2']) }}
            </div>
        </div>
        <input type="hidden" name="issuer_id" value="{{$issuer->id}}">
        <input type="hidden" name="issuer_type" value="{{get_class($issuer)}}">
        <div class="modal-footer">
            <button type="button" class="btn btn-simple" data-dismiss="modal">@lang('tasks::tasks.close')</button>
            <button type="submit" class="btn btn-primary">@lang('tasks::tasks.update')</button>
        </div>
        {{Form::close()}}
    </div>
</div>
