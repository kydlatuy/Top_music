$("#delete").on("click", function(){
    $("#butOk").attr('href', $("#butOk").attr('href')+'/'+ $(this).data('id'));
});
