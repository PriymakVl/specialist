$(document).ready(function () {
    var options = {};
    options.dayNamesMin = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'];
    options.monthNamesShort = ['Январь', 'Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
    options.dateFormat = 'dd.mm.y';
	options.changeMonth = true;
	options.firstDay = 1;//начало с понедельника а не с воскресенья

    $('.datepicker').datepicker(options);

});