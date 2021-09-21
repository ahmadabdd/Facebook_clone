let id = document.getElementById('user_id_hide').value;
let full_name = document.getElementById('full_name_hide').value;
$('#user_id_hide').hide();
$('#full_name_hide').hide();

$(document).ready(getBlocked(id))

function getBlocked() {
    getBlockedAPI(id).then(list_blocked => {
        $.each(list_blocked, function(index, blocked) {
            $('<tr>').append(
                $('<td>').text(blocked.full_name),
                $('<td>').append(`<button type='button' onclick= unblockUser(${id},${blocked.id}) value = ${blocked.id} id ='unblock-button${blocked.id}' class='btn btn-info'>Unblock</button>`),
            ).appendTo("#blocked_table");
        })
    });
}

function unblockUser(id, blocked_id) {
    unblockUserAPI(id, blocked_id).then(unblocked_response => {
        if (unblocked_response.response) {
            console.log("here");
            $('#unblock-button' + blocked_id).closest("tr").remove();
        }
    })
}

async function getBlockedAPI(id) {
    const response = await fetch("http://localhost/facebook/php/list_blocked.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id": id,
        })
    });
    if (!response.ok) {
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    const list_blocked = await response.json();
    return list_blocked;
}

async function unblockUserAPI(id, blocked_id) {
    const response = await fetch("http://localhost/facebook/php/unblock_user.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id": id,
            "blocked_id": blocked_id
        })
    });
    if (!response.ok) {
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    const unblocked_response = await response.json();
    return unblocked_response;
}