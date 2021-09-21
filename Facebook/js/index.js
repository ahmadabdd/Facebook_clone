let id = document.getElementById('user_id_hide').value;
let full_name = document.getElementById('full_name_hide').value;
$('#user_id_hide').hide();
$('#full_name_hide').hide();



$('#search').click(function() {
    clearTable();
    let search_value = document.getElementById('search_value').value;
    if (search_value !== "") {
        getUsers(id, search_value);
    }
});


function addFriend(id, friend_id) {
    AddFriendAPI(id, friend_id).then(added_response => {
        if (added_response.response) {
            $('#add-button' + friend_id).closest("tr").remove();
        }
    })
}

function blockUser(id, friend_id) {
    blockUserAPI(id, friend_id).then(blocked_response => {
        if (blocked_response.response) {
            $('#block-button' + friend_id).closest("tr").remove();
        }
    })
}


function clearTable() {
    $('tr').remove();
}

function getUsers(id, search_value) {
    getUsersAPI(id, search_value).then(list_users => {
        $.each(list_users, function(index, user) {
            $('<tr>').append(
                $('<td>').text(user.full_name),
                $('<td>').append("<button type='button' onclick='addFriend(" + id + " , " + user.id + ")' value=" + user.id + " id='add-button" + user.id + "' class='btn btn-info'>Add</button>"),
                $('<td>').append("<button type='button' onclick='blockUser(" + id + " , " + user.id + ")' value=" + user.id + " id='block-button" + user.id + "' class='btn btn-danger'>Block</button>")
            ).appendTo("#users_table");
        })
    });
}


async function getUsersAPI(id, search_value) {
    const response = await fetch("http://localhost/facebook/php/list_users.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id": id,
            "search_value": search_value
        })
    });
    if (!response.ok) {
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    const list_users = await response.json();
    return list_users;
}


async function AddFriendAPI(id, friend_id) {
    const response = await fetch("http://localhost/facebook/php/send_request.php", {
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
    const added_response = await response.json();
    return added_response;
}

async function blockUserAPI(id, friend_id) {
    const response = await fetch("http://localhost/facebook/php/block_user.php", {
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
    const blocked_response = await response.json();
    return blocked_response;
}