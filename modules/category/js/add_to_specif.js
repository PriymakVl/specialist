$(document).ready(function() {

    $('#add-to-specif').click(function(e) {

        e.preventDefault();

        var id_prod;

        var product = $('table :checked');

        if (product.length == 0) {
            alert('Вы не выбрали деталь');
            return;
        }
        else if (product.length > 1) {
            alert('Добавлять можно только по одной детали');
            return;
        }

        id_prod = product[0].getAttribute('id_prod');

        location.href = '/specification/add_product?id_prod=' + id_prod;
    });

});