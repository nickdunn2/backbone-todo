App.Collections.Tasks = Backbone.Collection.extend({
    url: '/api/tasks',
    model: App.Models.Task
});