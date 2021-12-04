(function () {
  'use strict';

  var vm = new Vue({
    el: '#app',
    data: {
      newItem: '',
      editedItem: '',
      todos: []
    },
    watch: {
      todos: {
        handler: function () {
          localStorage.setItem('todos', JSON.stringify(this.todos));
        },
        deep: true
      }
    },
    mounted: function () {
      this.todos = JSON.parse(localStorage.getItem('todos')) || [];
    },
    methods: {
      addItem: function () {
        var item = {
          title: this.newItem,
          isDone: false,
          isActive: true,
          tmp: ''
        };
        this.todos.push(item);
        this.newItem = '';
      },
      deleteItem: function (index) {
        if (confirm('are you sure?')) {
          this.todos.splice(index, 1);
        }
      },
      active: function (index) {
        console.log('通電');
        console.log(this.todos[index].isActive);
        this.todos[index].isActive = !this.todos[index].isActive;
        // }
      },
      editItem: function (index) {
        console.log(this.editItem);
        this.todos[index].title = this.todos[index].tmp;
        this.todos[index].tmp = "";
        this.todos[index].isActive = !this.todos[index].isActive;
      },
      purge: function () {
        if (!confirm('delete finished?')) {
          return;
        }
        this.todos = this.remaining;
      }
    },
    computed: {
      remaining: function () {
        return this.todos.filter(function (todo) {
          return !todo.isDone;
        });
      }
    }
  });
})();