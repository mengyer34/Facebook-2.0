$(document).ready(function() {
    $('#search').keyup(function(){
        var info = $('input').val(); // git value form input
        $.post('search.php', {
            search_form: info
        }, function(data, status){ // optional get method
            $('#test_search').html(data);
        });
    })
})