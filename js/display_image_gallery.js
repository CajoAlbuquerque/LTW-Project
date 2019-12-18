'use strict'

let houseID

function get_houseID() {
    let get_url = window.location.search.substr(1)
    let get_url_parsed = get_url.split('&')
    let get_params = {}

    get_url_parsed.forEach(function (key_value) {
    let temp = key_value.split("=")
    get_params[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1])
    //console.log("get_params['houseID'] is " + get_params['houseID'])
    houseID = get_params['houseID']
})
}


get_houseID()
//console.log("houseID is " + houseID)
let section_images = document.getElementsByClassName('images')[0]
let images_html
let image_elements
let image_number
let left_button
let right_button
let index = 0

function left_button_click() {
    image_elements[index].style.display = "none"
    if(index == 0){index = image_number - 1}
    else{index--}
    image_elements[index].style.display = "inline"
}

function right_button_click() {
    image_elements[index].style.display = "none"
    index++
    if(index == image_number){index = 0}
    image_elements[index].style.display = "inline"
}

function set_up_gallery() {
    image_elements = document.getElementsByClassName('house_image')
    image_number = image_elements.length

    if(image_number > 1){
        //add swap listeners
        left_button = document.createElement('button')
        left_button.id = "left_button"
        left_button.setAttribute('type' , 'button');
        left_button.innerHTML = '&lt'
        right_button = document.createElement('button')
        right_button.id = "right_button"
        right_button.setAttribute('type' , 'button');
        right_button.innerHTML = '&gt'

        section_images.prepend(left_button)
        section_images.append(right_button)

        left_button.addEventListener('click', left_button_click)
        right_button.addEventListener('click', right_button_click)
        for(let i = 1; i < image_number; i++){
            image_elements[i].style.display = "none"
        }
    }
}

function images_received() {
    images_html = this.responseText
    section_images.outerHTML = '<section class="images">' + images_html + '</section>'
    
    section_images = document.getElementsByClassName('images')[0]
    set_up_gallery()
}

function get_images_request() {
    let request = new XMLHttpRequest()
    request.onload = images_received
    request.open('get', '../ajax/get_images_of_house.php?houseID=' + houseID, true)
    request.send()
}

get_images_request();
