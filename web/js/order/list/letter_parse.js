$(document).ready(function () {
   $('#parse-letter').click(function (event) {
       event.preventDefault();
       var letter, type;
       letter = $('#text-letter').val();
       type_order = $('.form-type-wrp select').val();

       if (!letter) alert('Не указан текст письма');
       else $.post('/order/letterparse', {'letter': letter, 'type': type_order}, add_parse_value);
   });
});

function add_parse_value(data) {
    data = JSON.parse(data);
    $('.form-number-wrp input').val(data.number);
    $('#datepicker').val(data.date);
}