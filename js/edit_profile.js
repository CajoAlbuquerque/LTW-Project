'use strict'

let fields = document.getElementById('fields')
let edit_link = document.getElementById('edit')
let username = document.querySelector('#fields :nth-child(1)')
let user

function encode_for_ajax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');
}

function null_or_empty(value) {
    return value === null || value === ''
}

function get_user_request() {
    let request = new XMLHttpRequest()
    request.onload = user_received
    request.open('get', '../ajax/get_user.php?username=' + username.innerHTML, true)
    request.send()
}

function swap_to_inputs() {
    fields.outerHTML = '<form id=fields action="../actions/edit_profile_action.php">' +
        '<input type="hidden" name="userID" value="' + user['userID'] + '">' +
        '<input type="text" name="username" value="' + user['username'] + '">' +
        '<input type="email" name="email" value="' + user['email'] + '">' +
        '<input type="text" name="name" ' + (null_or_empty(user['name'])  ? 'placeholder="NAME"' : ('value="' + user['name'] + '"')) + '">' +
        '<input type="text" name="nationality" ' + (null_or_empty(user['nationality'])  ? 'placeholder="NATIONALITY"' : ('value="' + user['nationality'] + '"')) + '">' +
        '<input type="text" name="age" ' + (null_or_empty(user['age'])  ? 'placeholder="AGE"' : ('value="' + user['age'] + '"')) + '">' +
        '<input type="submit" value="Confirm">' + '</form>'
}

function user_received() {
    user = JSON.parse(this.responseText)
    edit_link.addEventListener('click', swap_to_inputs)
}

get_user_request()