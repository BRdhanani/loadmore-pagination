$(document).on('click','.loadmore',function () {
  var ele = $(this).parent('li');$(this).text('Loading');
    $.ajax({
      url: 'loadmore.php',
      type: 'POST',
      data: {
              page:$(this).data('page'),
            },
      success: function(response){
           if(response){
             ele.hide();
                $(".news_list").append(response);
              }
          }
   });
});
