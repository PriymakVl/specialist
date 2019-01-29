$(document).ready(function () {
   $('#note-dwg').change(function() {
       $('#form-add-three-row textarea').append(' чертеж ');
   });

    $('#note-repair').change(function() {
        $('#form-add-three-row textarea').append(' ремонт ');
    });
});