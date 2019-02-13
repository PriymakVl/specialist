$(document).ready(function () {

    $('#show-order-form').click(function (event) {
		
        event.preventDefault();
        $('.list-orders, #order-filters-wrp, .tabs').hide();
        $('#form-order-wrp').slideDown(300);
    });

    $('#hide-form-order').click(function () {
        $('#order-filters-wrp, .list-orders, .tabs').show();
        $('#form-order-wrp').slideUp(300);
    });
});