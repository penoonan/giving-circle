var Errors = Vue.extend(
    {
        template: '<div v-if="errors.length > 0" class="alert alert-danger">'+
        '<button v-on:click="clearErrors" type="button" class="close" aria-label="Close">'+
        '<span aria-hidden="true" class="glyphicon glyphicon-remove"></span>'+
        '</button>'+
        '<ul>'+
        '<li v-for="error in errors">${ error.message }</li>'+
        '</ul>'+
        '</div>',
        data: function() {
            return {
                errors: gc.errors
            }
        },
        methods: {
            clearErrors: function() {
                this.errors = [];
            }
        }
    }
);

Vue.component('gc-errors', Errors);