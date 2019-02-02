// delete a list
$(".delete").click(function(event) {
    event.preventDefault();
    var id = $(this).attr('href');
    var url = window.location.href + id;
    var warning = confirm("WAIT! This action can not be undone. Are you sure you want to delete this list?");
    if (warning == true) {
        $.ajax({
            url: url,
            method: 'delete'
        }).done(function() {
            // redirect
            window.location.href = "/";
        })
    }
});
