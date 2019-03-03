$(document).ready(function () {
    var options = {};
    options.dayNamesMin = ['Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб', 'Вс'];
    options.monthNamesShort = ['Январь', 'Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
    options.dateFormat = 'dd.mm.y';
	options.changeMonth = true;

    $('#datepicker').datepicker(options);

});