console.log('yo');
$(function() {
  // Multiple images preview in browser
  var imagesPreview = function(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function(e) {
        $('#profilPicturePreview').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }

  };

  $('#registration_image').on('change', function() {
    imagesPreview(this);
  });
});