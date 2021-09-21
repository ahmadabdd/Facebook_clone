let id = document.getElementById('user_id_hide').value;
let full_name = document.getElementById('full_name_hide').value;
$('#user_id_hide').hide();
$('#full_name_hide').hide();

$(document).ready(getRequests(id))

function acceptRequest(id, friend_id) {
    console.log(id);
    console.log(friend_id);
    acceptRequestAPI(id, friend_id).then(accepted_response => {
        if (accepted_response.response) {
            $('#accept-button' + friend_id).closest("tr").remove();
        }
    })
}

function declineRequest(id, friend_id) {
    declineRequestAPI(id, friend_id).then(declined_response => {
        if (declined_response.response) {
            $('#decline-button' + friend_id).closest("tr").remove();
        }
    })
}

function test() {
    console.log("hello")
}

function getRequests(id) {
    getRequestsAPI(id).then(list_requests => {
        $.each(list_requests, function(index, request) {
            $('<tr>').append(
                $('<td>').text(request.full_name),
                $('<td>').append(`<button type='button' onclick= acceptRequest(${id},${request.id}) value = ${request.id}  id='accept-button${request.id}' class='btn btn-info'>Accept</button>`),
                $('<td>').append(`<button type='button' onclick= declineRequest(${id},${request.id}) value = ${request.id}  id='decline-button${request.id}' class='btn btn-danger'>Decline</button>`)
            ).appendTo("#requests_table");
        })
    });
}


async function getRequestsAPI(id) {
    const response = await fetch("http://localhost/facebook/php/list_requests.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id": id,
        })
    });
    if (!response.ok) {
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    const list_requests = await response.json();
    return list_requests;
}


async function acceptRequestAPI(id, friend_id) {
    const response = await fetch("http://localhost/facebook/php/accept_request.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id": id,
            "friend_id": friend_id
        })
    });
    if (!response.ok) {
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    const accepted_response = await response.json();
    return accepted_response;
}

async function declineRequestAPI(id, friend_id) {
    const response = await fetch("http://localhost/facebook/php/decline_request.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id": id,
            "friend_id": friend_id
        })
    });
    if (!response.ok) {
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    const declined_response = await response.json();
    return declined_response;
}