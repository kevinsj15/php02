$(document).ready(function () {
  var dropZone = document.getElementById("drop_zone");
  var input = document.getElementById("item_image");
  var button = document.getElementById("submit_button");
  var form = document.getElementById("upload_form");
  var preview = document.getElementById("preview");

  dropZone.ondrop = function (e) {
    e.preventDefault();
    var file = e.dataTransfer.files[0];
    input.files = e.dataTransfer.files;
    var reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block";
    };
    reader.readAsDataURL(file);
  };

  dropZone.ondragover = function (e) {
    e.preventDefault();
  };

  input.onchange = function (e) {
    var file = e.target.files[0];
    var reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block";
    };
    reader.readAsDataURL(file);
  };

  button.onclick = function (e) {
    e.preventDefault();
    var formData = new FormData(form);
    $.ajax({
      url: "insert.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (data) {
        console.log("Upload successful!\n" + data);
        window.location.href = "select.php";
      },
    });
  };
});
