$(document).ready(function(){
    // get update-button ID
    $(".update-btn").click(function() {
        var id = this.id;
        $("#id_" + id).toggle();
        $(this).toggleClass('active');
    });

    // get update-button ID
    $(".cancel-btn").click(function() {
        // reset input values
        $("#update-form").trigger('reset');
    });
});
