
/*
    Global App View.
 */
App.Views.App = Backbone.View.extend({
    initialize: function() {
        var addTaskView = new App.Views.AddTask({ collection: App.tasks });
        var allTasksView = new App.Views.Tasks( { collection: App.tasks }).render();
        $('#tasks').html(allTasksView.el);
    }
});

/*
    AddTask View.
 */
App.Views.AddTask = Backbone.View.extend({
    el: '#addTask',

    events: {
        'submit': 'addTask'
    },

    addTask: function(e) {
        e.preventDefault();
        this.collection.create({
            description: this.$('#newTask').val()
        }, { wait: true });

        this.clearForm();
    },

    clearForm: function() {
        this.$('#newTask').val('');
    }
});

/*
    All Tasks View.
 */
App.Views.Tasks = Backbone.View.extend({
    tagName: 'ul',

    initialize: function() {
        this.collection.on('sync', this.render, this);
    },

    render: function() {
        this.$el.empty();
        this.collection.each( this.addOne, this);
        return this;
    },

    addOne: function(task) {
        var taskView = new App.Views.Task({ model: task });
        this.$el.append(taskView.render().el);
    }
});

/*
    Single Task View.
 */
App.Views.Task = Backbone.View.extend({
    tagName: 'li',

    template: template('taskTemplate'),

    initialize: function() {
        this.model.on('destroy', this.remove, this);
    },

    events: {
        'dblclick span': 'editTask',
        'click .delete': 'destroyTask'
    },

    editTask: function() {
        var editedTask = prompt('Enter your changes:', this.model.get('description'));
        if (!editedTask) {
            return;
        }
        this.model.save({description: editedTask});
    },

    destroyTask: function() {
        this.model.destroy();
    },

    remove: function() {
        this.$el.remove();
    },

    render: function() {
        this.$el.html( this.template(this.model.toJSON() ));
        return this;
    }
});