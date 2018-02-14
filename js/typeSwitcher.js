$(document).ready(function () {
    //Show first/default attribute.
    showSelectedAttribute($("#typeSwitcher").val());
    
    //Show selected attribute.
    $("#typeSwitcher").on( 'click', function () {
        showSelectedAttribute($(this).val());
    });

    //Function for displaying only one attribute, that matches typeSwitcher value.
    function showSelectedAttribute(value){
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