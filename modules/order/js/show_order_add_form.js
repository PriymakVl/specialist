$(document).ready(function () {
    $('#show-order-add-form').click(function (event) {
        event.preventDefault();
        $('.list-orders, #order-filters-wrp').hide();
        $('#form-order-add-wrp').slideDown(300);
    });

    $('#hide-form-add').click(function () {
        $('#order-filters-wrp, .list-orders').show();
        $('#form-order-add-wrp').slideUp(300);
    });
});