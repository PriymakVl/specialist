$(document).ready(function () {
    //change all orders
    $('#change-note-letter').click(function () {
        var title, note, letter, state;

        title = this.innerHTML;

        if (title == 'Примечание - Письмо') this.innerHTML = 'Примечание';
        else if (title == 'Примечание') this.innerHTML = 'Письмо';
        else if (title == 'Письмо') this.innerHTML = 'Примечание - Письмо';



        $('.note-letter').each(function() {
            if (title == 'Примечание - Письмо') {
                note = $(this).attr('note');
                $(this).html('<span class="red">' + note + '</span>');
            }
            else if (title == 'Примечание') {
                letter = $(this).attr('letter');
                $(this).text(letter);
            }
            else if (title == 'Письмо') {
                note = $(this).attr('note');
                letter = $(this).attr('letter');
                $(this).html('<span class="red">' + note + '</span>').append(' - ' + letter);
            }
        });
    });

    //change in one order
    $('.note-letter').click(function() {
        state = $(this).attr('state');
        note = $(this).attr('note');
        letter = $(this).attr('letter');
        console.log(state);
        if (state == 'note-letter') $(this).html('<span class="red">' + note + '</span>').attr('state', 'note');
        else if (state == 'note') $(this).text(letter).attr('state', 'letter');
        else $(this).html('<span class="red">' + note + '</span>').append(' - ' + letter).attr('state', 'note-letter');
    });

});