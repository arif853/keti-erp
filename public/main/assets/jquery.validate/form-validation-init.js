
/**
* Theme: Moltran Admin Template
* Author: Coderthemes
* Form Validator
*/

!function($) {
    "use strict";

    var FormValidator = function() {
        this.$customerform = $("#customer_form"); //this could be any form, for example we are specifying the comment form
        this.$productform = $("#product_form"); //this could be any form, for example we are specifying the comment form
        this.$issueproduct = $("#product_issue_form");
        this.$storeform = $("#store_form");
        this.$quoteForm = $("#quote_form");
    };

    //init
    FormValidator.prototype.init = function() {
        //validator plugin
        // $.validator.setDefaults({
        //     submitHandler: function() { alert("submitted!"); }
        // });

        // validate the comment form when it is submitted
        // this.$customerform.validate();
        this.$productform.validate();
        this.$issueproduct.validate();
        this.$storeform.validate();
        this.$quoteForm.validate();

        // validate signup form on keyup and submit
        this.$customerform.validate({
            rules: {
                business_name: "required",
                owner_name: "required",
                phone: "required",
                address2: "required",
                email: {
                    email: true
                },
            },
            messages: {
                business_name: "Please enter your business name",
                owner_name: "Please enter owner name",
                phone: "Please enter a phone",
                address2: "Please provide a address",
                email: "Please enter a valid email address",
            }
        });

    },
    //init
    $.FormValidator = new FormValidator, $.FormValidator.Constructor = FormValidator
}(window.jQuery),


//initializing
function($) {
    "use strict";
    $.FormValidator.init()
}(window.jQuery);
