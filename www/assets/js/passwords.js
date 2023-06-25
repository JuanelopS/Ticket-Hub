let changePasswordButton = document.querySelector('#change_password_button');

const getValues = id => {
    let value = document.getElementById(id).value;
    return value;
}

changePasswordButton.addEventListener('click', e => {
    e.preventDefault();

    let new_password = getValues('new_password');
    let confirm_password = getValues('confirm_password');

    if (new_password !== confirm_password) {
        alert('Passwords do not match');

    } else {
        
    }

});