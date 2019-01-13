$(document).ready(function () {
  $('.loadmore:visible').on('click', function () {
    var searchtext = $("#search_text").val();
    var ele = $(this).parent('li');
    $(this).text('Loading');
    
    var searchtext = $("#search_text").val();
    if (searchtext != '') {
      ajaxcall(searchtext);
    } else {
      ajaxcall();
    }


    /*$.ajax({
      url: 'loadmore.php',
      type: 'POST',
      data: {
              page:$(this).data('page'),
              search:searchtext
            },
      success: function(response){
           if(response){
             ele.hide();
                $(".news_list").append(response);
              }*/
    function ajaxcall(searchtext = '') 
    {
      $.ajax({
        url: "loadmore.php",
        method: "POST",
        data: {
          page: $('.loadmore').data('page'),
          search: searchtext
        },
        success: function (response) {
          if (response) {
            ele.hide();
            $(".news_list").append(response);
          }
          //$('#result').html(response);
        }
      });
    }
    
    $('#search_text').click(function () 
    {
      var searchtext = $("#search_text").val();
      if (searchtext != '') {
        ajaxcall(searchtext);
      } else {
        ajaxcall();
      }
    });
  });
});

