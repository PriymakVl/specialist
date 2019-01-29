$(document).ready(function () {
    $('#add-order').click(function (event) {
        event.preventDefault();

        var number, type, count_pack, date_exec, letter;

        number = $('.form-number-wrp input').val();
        if (!number) {
            alert('Не указан номер заказа'); return;
        }

        date_exec = $('.form-date-wrp input').val();
        if (!date_exec) {
            alert('Не указана дата выполнения заказа'); return;
        }

        letter = $('#text-letter').val();
        if (!letter) {
            alert('Не указан текст письма'); return;
        }

        $('#form-add-wrp form').submit();
    });
});