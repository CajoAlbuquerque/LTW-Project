
'use strict'

let fields = document.getElementById('fields')
let image = document.getElementById('profile_img')
let reservations_link = document.getElementById('reservations')
let username = document.getElementById('username') //o cajo é puta

let reservations

function swap_to_reservations() {
    fields.outerHTML = '<div id="fields">' +
        reservations +
        '</div>'

        image.style.display = "none"
        fields = document.getElementById('fields')
}

function reservations_received() {
    reservations = this.responseText
    reservations_link.addEventListener('click', swap_to_reservations)

}

function get_reservations_request() {
    let request = new XMLHttpRequest()
    request.onload = reservations_received
    request.open('get', '../ajax/get_reservations.php?username=' + username.innerHTML, true)
    request.send()
}

get_reservations_request()
