$(document).ready(function() {
    $('#troco').hide();
    $('#pagamento').change(function() {
      if ($('#pagamento').val() == 'Dinheiro') {
        $('#troco').show();
      } else {
        $('#troco').hide();
      }
    });
  });