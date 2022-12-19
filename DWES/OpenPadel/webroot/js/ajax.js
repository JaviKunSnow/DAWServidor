//recoger con jquery el selected de dia
//añadir el jqery

$.post( "test.php", { dia })
  .done(function( data ) {
    alert( "Data Loaded: " + data );
  });