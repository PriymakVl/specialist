$(document).ready(function () {
    var options = {};
    options.dayNamesMin = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'];
    options.monthNames = ['Январь', 'Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
    options.dateFormat = 'dd.mm.y';

    //$('#datepicker').datepicker(options);
    $('#datepicker').datepicker($.datepicker.regional["ru"]);
});