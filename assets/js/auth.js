$('#login-form').submit(function(e) {
    e.preventDefault();

    alert('hello')
});

$('#register-form').submit(function(e) {
    e.preventDefault();
    $.post("/controller/register", $(this).serialize(),
        function (resp, textStatus, jqXHR) {
            console.log(resp)
        },
        "json"
    );
})