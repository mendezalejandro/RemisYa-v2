$(function() {
    $('#modalButton').click(function(e) {
        $('#modal').modal('show')
          .find('#modalContent')
          .load($(this).attr('value'));
       });
});
$(function() {
    $('#modalButtonLogin a').click(function(e) {
        e.preventDefault();
        $('#modal').modal('show')
          .find('#modalContent')
          .load($(this).attr('href'));
       });
});
$(function() {
    $('#modalButtonRegistrarUsuario').click(function()
    {
        $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
    });
});


$(function() {
    $('#modalButtonEmail').click(function()
    {
        $('#modal').modal('show').find('#modalContent').load($(this).attr('value'));
    });
});
$(function() {
    $('#modalButtonCalificarUsuario').click(function()
    {
        $('#modal').modal('show').find('#modalContentChofer').load($(this).attr('value'));
    });
});