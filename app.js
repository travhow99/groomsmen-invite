$(document).ready(function () {
    $('.decline, .accept').click(function () {
        const response = $(this).hasClass('decline') ? 'decline' : 'accept';
        console.log(response);

        $.post('handle-response.php', {
            name: name,
            response: response,
        }, function (data) {
            console.log(data);
        })
    });
}); 