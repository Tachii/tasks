<div class="modal fade" id="taskCreateModal" tabindex="-1" role="dialog" aria-labelledby="taskCreateModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="taskCreateModalLabel">@lang('tasks::tasks.new_task')</h4>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="task-modal-1" class="control-label">@lang('tasks::tasks.task_description')</label>
                        <textarea rows="5" name="task-modal-1" id="task-modal-1" placeholder="@lang('tasks::tasks.task_description_placeholder')" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" data-datepicker="" placeholder="@lang('tasks::tasks.due_to')" value="" name="filter-field-4">
                    </div>
                    <div class="form-group">
                        <label for="sel1" class="control-label">@lang('tasks::tasks.responsible_person')</label>
                            <input type="hidden" name="issuer_type" value="">
                            <select class="form-control" id="sel1">
                                @foreach($responsibles as $id => $name)
                                    <option name="responsible_id" value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-simple" data-dismiss="modal">@lang('tasks::tasks.close')</button>
                    <button type="button" class="btn btn-primary">@lang('tasks::tasks.save')</button>
                </div>
            </form>
        </div>
    </div>
</div>