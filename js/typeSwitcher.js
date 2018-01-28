$(document).ready(function () {
    //Get selected type option and change visibility of div`s.
    $("#typeSwitcher").on( 'click', function () {
        var attribute = $(this).val();
        var dvd = $("#dvd");
        var book = $("#book");
        var furniture = $("#furniture");
        switch(attribute) {
          case "dvd":
            dvd.show();
            furniture.hide(); book.hide();
            break;
          case "book":
            book.show();
            furniture.hide(); dvd.hide();
            break;
          case "furniture":
            furniture.show();
            book.hide(); dvd.hide();
            break;
        }
    });
});