let id = document.getElementById('user_id_hide').value;
let full_name = document.getElementById('full_name').value;
let phone = document.getElementById('phone').value;
let email = document.getElementById('email').value;
$('#user_id_hide').hide();
$('#full_name_hide').hide();

console.log(id);
console.log(full_name);
console.log(email);
console.log(phone);

// $('#update_info').click(editProfile(id, full_name, email, phone));
function editProfileInfo() {
    let id = document.getElementById('user_id_hide').value;
    let full_name = document.getElementById('full_name').value;
    let phone = document.getElementById('phone').value;
    let email = document.getElementById('email').value;
    editProfile(id, full_name, email, phone);
}


function editProfile(id, full_name, email, phone) {
    editProfileAPI(id, full_name, email, phone).then(new_profile_info => {
        if (new_profile_info.response) {
            $('#full_name').val(new_profile_info.full_name);
            $('#email').val(new_profile_info.email);
            $('#phone').val(new_profile_info.phone);
        }
    });
}


async function editProfileAPI(id, full_name, email, phone) {
    const response = await fetch("http://localhost/facebook/php/edit_profile.php", {
        method: 'POST',
        body: new URLSearchParams({
            "user_id": id,
            "full_name": full_name,
            "email": email,
            "phone": phone,
        })
    });
    if (!response.ok) {
        const message = "ERROR OCCURED";
        throw new Error(message);
    }
    const new_profile_info = await response.json();
    return new_profile_info;
}