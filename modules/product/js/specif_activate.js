$(document).ready(function() {

    $('#specif-activate').click(function(e) {

        e.preventDefault();

        var id_specif;

        var specif = $('table :checked');

        if (specif.length == 0) {
            alert('Вы не выбрали спецификацию');
            return;
        }
        else if (specif.length > 1) {
            alert('Сделать активным можно только одну спецификацию');
            return;
        }

        id_specif = specif[0].getAttribute('id_specif');

        location.href = '/specification/activate?id_specif=' + id_specif;
    });

});