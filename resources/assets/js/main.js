/**
 * Created by pdavila on 17/11/15.
 */

var Vue = require('vue');

new Vue({
    el: '#emailFromGroup',
    data: {
        exists: false
    },

    methods: {
        checkEmailExists: function(){
            alert('xivato');
            this.exists=true;
        }
    }
})