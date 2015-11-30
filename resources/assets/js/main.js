/**
 * Created by pdavila on 17/11/15.
 */
var Vue = require('vue');

var $ = require('jquery');

var vm = new Vue({
    el: '#email',
    data: {
        exists: false,
        placeholder: "email@domain.com",
        url: "http://auth.app/checkEmailExists"
    },

    methods: {
        checkEmailExists: function(item){
            var email = $("#email").value();
            console.debug("checkEmailExists EXECUTED!!!");
            console.debug("A punt de cridar");
            console.debug(this.url);
            console.debug(email);
            var url = this.url + "?email=" + email;
            console.debug(url);

            $.ajax(url).done(function(data){
                //OK
                console.debug(data);
                if(data == "true"){
                    //TODO email està lliure DO NOTHING!
                } else {
                    alert('email ocupat');
                }
            }).fail(function (data){
                //error
                alert("ha petat");
            }).always(function(data){
                //always
                console.debug("xivato");
            });
        }
    }
});