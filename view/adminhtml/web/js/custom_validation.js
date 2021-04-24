 require(
        [
            'Magento_Ui/js/lib/validation/validator',
            'jquery',
            'mage/translate'
    ], function(validator, $){

        validator.addRule(
            'custom-validation',
            function (value) {                          
                if($("input[name=custom_checkbox]").val() == 1){                         
                    return false;
                }else {
                    return true;
                }
            }
            ,$.mage.__('This field is required.')
        );

        validator.addRule(
            'custom-check-validation',
            function (value) {                          
                if(value == 1){      
                    $(".my-custom-class").addClass("required");                                         
                }else{
                    $(".my-custom-class").removeClass("required");
                    return true;}                

            }
            ,$.mage.__('')
        );
});