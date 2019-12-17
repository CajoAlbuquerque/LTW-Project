'use strict'

let form = document.getElementById('new_house_form');
let button = document.querySelector('#new_house_form input[type="button"]');
let file_input = document.querySelector('#new_house_form input[type="file"]');
let preview = document.getElementById('preview');
let num_images = 0;

button.addEventListener('click', function (ev) {
    ev.preventDefault();

    if(file_input) {
        file_input.click();
    }
});

file_input.addEventListener('change', previewImages);
form.addEventListener('submit', () => {
    let formdata = new FormData(form);
    let values = formdata.getAll('images[]');

    console.log(values);
    alert('FODASDedaee');
});

function previewImages(event) {
    let files = event.target.files;
    let formdata = new FormData(form);
    let values = formdata.get('images');

    console.log(values);
    if(num_images == 0) {
        preview.innerHTML = '';
    }
    num_images++;
    if(num_images >= 9) {
        file_input.setAttribute('disabled', 'true')
    }
    
    for (let i = 0; i < files.length; i++){
        let file = files[i];
        let div = document.createElement('div');
        div.classList.add('preview_obj');

        let img = document.createElement('img');
        img.file = file;
        div.appendChild(img);

        let button = document.createElement('button');
        button.innerHTML = "X";
        button.setAttribute("data-index", i);
        div.appendChild(button);

        button.addEventListener('click', (evt) => {
            evt.target.parentNode.remove();
            num_images--;
            checkPreviewStatus();
        });
        addDivHoverListeners(div);

        preview.appendChild(div);

        let reader = new FileReader()
        reader.onload = (function(aImg) { return function(e) { aImg.src = e.target.result; }; })(img);
        reader.readAsDataURL(file);
    }
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
    if(num_images <= 0) {
        preview.innerHTML = '<img src="../images/placeholder.png" alt="Preview Images Placeholder">';
    }
    if(num_images < 9) {
        file_input.removeAttribute('disabled');
    }
}