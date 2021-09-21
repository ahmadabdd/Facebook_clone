let id = document.getElementById('user_id_hide').value;
let full_name = document.getElementById('full_name_hide').value;
$('#user_id_hide').hide();
$('#full_name_hide').hide();

$(document).ready(getNotifications(id))

function getNotifications(id) {
    getNotificationsAPI(id).then(notifications => {
        $.each(notifications, function (index, notification) {
            $('<tr>').append(
            $('<td>').append('<i class="tim-icons icon-bell-55 inline"></i>'),
            $('<td>').text(notification.text),
            ).appendTo("#notifications_table");
        })
    });
}

async function getNotificationsAPI(id) {
    const response = await fetch("http://localhost/facebook/php/list_notifications.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id": id,
        })
    });
    if (!response.ok) {
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    const notifications = await response.json();
    return notifications;
}