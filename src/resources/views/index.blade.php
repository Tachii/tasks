<div class="panel-heading">
    <div class="flex-head">
        <div class="flex-head-direction">
            <div class="flex-head-item">
                <div class="panel-title">Tasks</div>
            </div>
        </div>
        <div class="flex-head-direction">
            <div class="flex-head-item">
                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#taskCreateModal">
                    <em>Toevoegen</em>
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="info-list">
    <div class="info-item">
        <div class="info-item-content">
            <h3>Bericht geplaatst door ‘Pieter Verkerk’</h3>
            <div class="meta">Geplaatst door
                <span class="green-text">Het Systeem</span>op
                <span class="green-text">7 september 2017</span>
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
</div>
@include('players::tasks.modals.task_create')

