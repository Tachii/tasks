<div class="modal fade" id="taskCreateModal" tabindex="-1" role="dialog" aria-labelledby="taskCreateModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="taskCreateModalLabel">Campaigns add</h4>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="task-modal-1" class="control-label">Camping title</label>
                        <input type="text" name="task-modal-1" id="task-modal-1" placeholder="Camping title" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" data-datepicker="" placeholder="Due date .." value="" name="filter-field-4">
                    </div>
                    <div class="form-group">
                        <label for="sel1" class="control-label">Responsible person</label>
                            <input type="hidden" name="issuer_type" value="">
                            <select class="form-control" id="sel1">
                                @foreach($responsibles as $id => $name)
                                    <option name="responsible_id" value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                    </div>b
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-simple" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>