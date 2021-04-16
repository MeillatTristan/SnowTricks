$(function() {
  // Multiple images preview in browser
  var imagesPreview = function(input, placeToInsertImagePreview) {
    if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML('<img class="preview">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }

  };

  $('#trick_images').on('change', function() {
    console.log('yo');
    imagesPreview(this, 'div#containerPreviewImages');
  });
});

$("#trick_images").click(function(){
  $("div#containerPreviewImages").empty();
});

$(function() {
  // Multiple videos preview in browser
  var videosPreview = function(input, placeToInsertImagePreview) {
    if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                $($.parseHTML("<video controls class='preview'> <source src='/media/cc0-videos/flower.mp4'> </video>")).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }

  };

  $('#trick_videos').on('change', function() {
      videosPreview(this, 'div#containerPreviewVideos');
  });
});

$("#trick_videos").click(function(){
  $("div#containerPreviewVideos").empty();
});