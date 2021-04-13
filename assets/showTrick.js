jQuery(function(){
  $('.title').on('click', function(e){
    var idTrick = $(this).attr('name');
    $('#containerDisplayTricks'+ idTrick).css("display", "flex")
  })

  $('.close').on('click', function(e){
    var idToClose = $(this).attr('name');
    $('#containerDisplayTricks'+ idToClose).css("display", "none")
  })
})