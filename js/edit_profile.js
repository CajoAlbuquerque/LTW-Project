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
    return value == null || value == ''
}

function get_user_request() {
    let request = new XMLHttpRequest()
    request.onload = user_received
    request.open('get', '../ajax/get_user.php?username=' + username.innerHTML, true)
    request.send()
}

function update_user_request() {
    let username = document.querySelector('input[name=username]').value
    let email = document.querySelector('input[name=email]').value
    let name = document.querySelector('input[name=name]').value
    let nationality = document.querySelector('input[name=nationality]').value
    let age = document.querySelector('input[name=age]').value

    let request = new XMLHttpRequest()
    request.onload = () => console.log('Updated')
    request.open('get', '../ajax/update_user.php?' + encode_for_ajax({'userID': user['userID'],'username': username, 'email': email, 'name': name, 'nationality': nationality, 'age': age}), false)
    request.send()
}

function swap_to_inputs() {
    fields.outerHTML = '<form id=fields action="../ajax/update_user.php">' +
        '<input type="hidden" name="userID" value="' + user['userID'] + '">' +
        '<input type="text" name="username" value="' + user['username'] + '">' +
        '<input type="email" name="email" value="' + user['email'] + '">' +
        '<input type="text" name="name" ' + (null_or_empty(user['name'])  ? 'placeholder="NAME"' : ('value="' + user['name'] + '"')) + '">' +
        '<input type="text" name="nationality" ' + (null_or_empty(user['nationality'])  ? 'placeholder="NATIONALITY"' : ('value="' + user['nationality'] + '"')) + '">' +
        '<input type="text" name="age" ' + (null_or_empty(user['age'])  ? 'placeholder="AGE"' : ('value="' + user['age'] + '"')) + '">' +
        '<input type="submit" value="Confirm">' + '</form>'

    //fields.addEventListener('submit', update_user_request)
}

function user_received() {
    user = JSON.parse(this.responseText)
    edit_link.addEventListener('click', swap_to_inputs)
}

get_user_request()