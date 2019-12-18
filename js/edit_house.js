'use strict'

let get_url = window.location.search.substr(1)
let get_url_parsed = get_url.split('&')
let get_params = {}

get_url_parsed.forEach(function (key_value) {
    let temp = key_value.split("=")
    get_params[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1])
})

let house_info = document.getElementsByClassName('house_info')[0]
let edit_link = document.getElementById('edit')
let house

function swap_to_edit() {
    house_info.outerHTML = '<section class="house_info">' +
        '<form id="house_edit" action="../actions/edit_house_action.php">' +
        '<input type="hidden" name="houseID" value="' + house['houseID'] + '">' +
        '<input type="text" name="title" value="' + house['title'] + '">' +
        '<input type="number" name="price" value="' + house['priceDay'] + '">' +
        '<input type="text" name="location" value="' + house['location'] + '">' +
        '<input type="text" name="description" id="house_desc" value="' + house['description'] + '">' +
        '<input type="submit" value="Confirm">' +
        '</form>' +
        '<a id="discard" href="../pages/house.php?houseID=' + house['houseID'] + '">' +
        'Discard Changes' + '</a>' +
        '</section>'
    
    house_info = document.getElementsByClassName('house_info')
}

function house_received() {
    house = JSON.parse(this.responseText)
    edit_link.addEventListener('click', swap_to_edit)
}

function get_house_request() {
    let request = new XMLHttpRequest()
    request.onload = house_received
    request.open('get', '../ajax/get_house.php?houseID=' + get_params['houseID'], true)
    request.send()
}

get_house_request()