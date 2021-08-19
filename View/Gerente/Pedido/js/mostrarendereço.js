$(document).ready(function() {
    $('#endereço').hide();
    $('#entrega').change(function() {
      if ($('#entrega').val() == 'Delivery') {
        $('#endereço').show();
      } else {
        $('#endereço').hide();
      }
    });
  });

  $(document).ready(function() {
    $('#submit01').show();
    $('#entrega').change(function() {
      if ($('#entrega').val() == 'Delivery') {
        $('#submit01').hide();
      } else {
        $('#submit01').show();
      }
    });
  });