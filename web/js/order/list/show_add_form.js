$(document).ready(function () {
    $('#show-add-form').click(function () {
        $('#order-filters-wrp, #form-search-wrp, .list-orders').hide();
        $('#form-add-wrp').slideDown(300);
    });

    $('#hide-form-add').click(function () {
        $('#order-filters-wrp, #form-search-wrp, .list-orders').show();
        $('#form-add-wrp').slideUp(300);
    });
});