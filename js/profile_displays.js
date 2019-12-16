
'use strict'

let fields = document.getElementsByClassName('fields')[0]
let image = document.getElementById('profile_img')
let reservations_link = document.getElementById('reservations')
let houses_link = document.getElementById('houses')
let username = document.getElementById('username')

let reservations
let houses

function swap_to_reservations() {
    fields.outerHTML = '<div id="MyReservations" class="fields">' +
        reservations +
        '</div>'

    image.style.display = "none"
    fields = document.getElementsByClassName('fields')[0]
}

function swap_to_houses() {
    fields.outerHTML = '<div id="MyHouses" class="fields">' +
        houses +
        '<article class="house_card">' +
        '<img src="https://picsum.photos/400/200">' +
        '<section>' +
            '<a href="../pages/add_house.php">' +
                'Add a new house' +
            '</a>' +
        '</section>' +
        '</article>' +
        '</div>'

    image.style.display = "none"
    fields = document.getElementsByClassName('fields')[0]
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

function houses_received() {
    houses = this.responseText
    houses_link.addEventListener('click', swap_to_houses)
}

function get_houses_request() {
    let request = new XMLHttpRequest()
    request.onload = houses_received
    request.open('get', '../ajax/get_houses.php?username=' + username.innerHTML, true)
    request.send()
}

get_reservations_request()
get_houses_request()
