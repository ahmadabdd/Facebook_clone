let id = document.getElementById('user_id_hide').value;
let full_name = document.getElementById('full_name_hide').value;
$('#user_id_hide').hide();
$('#full_name_hide').hide();

$(document).ready(getFriends(id));

$('.remove-friend').click(function() {
    alert('test');
});

function getFriends(id) {
    getFriendsAPI(id).then(list_friends => {
        $.each(list_friends, function (index, friend) {
            $('<tr>').append(
            $('<td>').text(friend.full_name),
            $('<td>').append("<button type='button' onclick='removeFriend(" + id + " , " + friend.id + ")' value=" + friend.id + " id='remove-button" + friend.id + "' class='remove-friend btn btn-danger'>Remove</button>"),
            $('<td>').append("<button type='button' onclick='blockUser(" + id + " , " + friend.id + ")' value=" + friend.id + " id='block-button" + friend.id + "' class='block-friend btn btn-danger'>Block</button>")
            ).appendTo("#friends_table");
        })
    });
}

function removeFriend(id, friend_id) {
    removeFriendAPI(id, friend_id).then(removed_response => {
        if(removed_response.response) {
            $('#remove-button' + friend_id).closest("tr").remove();
        }
    })
}

function blockUser(id, friend_id) {
    blockUserAPI(id, friend_id).then(blocked_response => {
        if(blocked_response.response) {
            $('#block-button' + friend_id).closest("tr").remove();
        }
    })
}   

async function getFriendsAPI(id) {
    const response = await fetch("http://localhost/facebook/php/list_friends.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id": id,
        })
    });
    if (!response.ok) {
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    const list_friends = await response.json();
    return list_friends;
}

async function removeFriendAPI(id, friend_id) {
    const response = await fetch("http://localhost/facebook/php/remove_friend.php", {
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
    const removed_response = await response.json();
    return removed_response;
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