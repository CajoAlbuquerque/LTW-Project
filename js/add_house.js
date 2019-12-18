'use strict'

let form = document.getElementById('new_house_form');
let button_input = document.querySelector('#new_house_form input[type="button"]');
let file_input = document.querySelector('#new_house_form input[type="file"]');
let preview = document.getElementById('preview');
let images = [];

button_input.addEventListener('click', function (ev) {
    ev.preventDefault();

    if(file_input) {
        file_input.click();
    }
});

file_input.addEventListener('change', previewImages);
form.addEventListener('submit', function (evt) {
    let formdata = new FormData(form);
    let request = new XMLHttpRequest();

    images.forEach(function(image, i) {
        formdata.append('image' + i, image);
    });

    request.open('POST', form.getAttribute('action'), true);
    request.send(formdata);
    
    evt.preventDefault();
    window.location.replace('../pages/homepage.php');
});

function previewImages(event) {
    let file = event.target.files[0];

    if(event.target.files.length == 0) {
        return;
    }

    if(! /^image/g.test(file.type)){
        return;
    }

    if(images.length == 0) {
        preview.innerHTML = '';
    }

    images.push(file);

    if(images.length >= 9) {
        button_input.setAttribute('disabled', 'true');
    }
    
    let div = document.createElement('div');
    div.classList.add('preview_obj');

    let img = document.createElement('img');
    img.file = file;
    div.appendChild(img);

    let button = document.createElement('button');
    button.innerHTML = "X";
    button.setAttribute("data-name", file.name);
    div.appendChild(button);

    button.addEventListener('click', (evt) => {
        let name = evt.target.getAttribute("data-name");
        let index = findFile(name);
        
        images.splice(index, 1);
        evt.target.parentNode.remove();
        checkPreviewStatus();
    });
    addDivHoverListeners(div);

    preview.appendChild(div);

    let reader = new FileReader()
    reader.onload = function(e) { img.src = e.target.result};
    reader.readAsDataURL(file);
}

function findFile(name) {
    let index = -1;

    for(let i = 0; i < images.length; i++) {
        if(images[i].name === name){
            index = i;
            break;
        }
    }

    return index;
}

function addDivHoverListeners(div) {
    div.addEventListener('mouseover', (evt) => { 
        let button = evt.currentTarget.querySelector('button');
        button.style.display = "inline";
    });
    div.addEventListener('mouseout', (evt) => {
        let button = evt.currentTarget.querySelector('button');
        button.style.display = "none";
    });
}

function checkPreviewStatus() {
    if(images.length <= 0) {
        preview.innerHTML = '<img src="../images/placeholder.png" alt="Preview Images Placeholder">';
    }
    if(images.length < 9 ) {
        button_input.removeAttribute('disabled');
    }
}