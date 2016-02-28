$('.sorting').on('click', function(e){
    e.preventDefault();
    var title = $(this).data('title');
    var order = $(this).data('order');

    $.post(
        '/godmode/messages',
        {
            title: title,
            order: order
        }
    ).complete(function(){
            window.location.reload(true);
        });
});