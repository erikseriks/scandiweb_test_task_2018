$(document).ready(function () {
    //Show first/default attribute.
    showAttribute($("#typeSwitcher").val());
    
    //Show selected attribute.
    $("#typeSwitcher").on( 'click', function () {
        showAttribute($(this).val());
    });

    //Function for displaying only one attribute, that matches typeSwitcher value.
    function showAttribute(value){
        var typeSwitcher = $("#typeSwitcher");

        for (var i = 0; i < typeSwitcher.length; i++) {
            if (typeSwitcher[i] = value){
                $(".attributes").hide();
                $("#"+typeSwitcher[i]).show();
                i = typeSwitcher.length;
            }
        }
    }
});