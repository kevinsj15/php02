$(document).ready(function () {
  var page = 1;
  $(window).scroll(function () {
    if ($(window).scrollTop() == $(document).height() - $(window).height()) {
      page++;
      loadMoreData(page);
    }
  });

  function loadMoreData(page) {
    $.ajax({
      url: "?page=" + page,
      type: "get",
      beforeSend: function () {
        $(".ajax-load").show();
      },
    })
      .done(function (data) {
        $(".ajax-load").hide();
        $("#item_list").append(data);
      })
      .fail(function (jqXHR, ajaxOptions, thrownError) {
        console.log("server not responding...");
      });
  }
});
