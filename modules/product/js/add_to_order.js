$(document).ready(function() {

    $('#add-to-order').click(function(e) {
        e.preventDefault();

        var id_specif;

        var specif = $('table :checked');

        if (specif.length == 0) {
            alert('Вы не выбрали спецификацию');
            return;
        }
        else if (specif.length > 1) {
            alert('Добавлять можно по одной спецификации');
            return;
        }

        id_specif = specif[0].getAttribute('id_specif');

        location.href = '/order/add_specification?id_specif=' + id_specif;
    });

});