App.Models.Task = Backbone.Model.extend({
    urlRoot: '/api/tasks',
    idAttribute: 'id',
    defaults: {
        lane_id: 1,
        description: '',
        complete: 0
    }
});