var music = new Audio ('rss/music/Ouverture.mp3');
music.loop = true;
music.play();

/***********------------------**********/

var select_dropdown = document.getElementById('dropdown');
var list_dropdown = document.querySelector('#dropdown ul');

list_dropdown.style.display = 'none';

function menu_dropdown(){
    if ( list_dropdown.style.display === 'none'){
        list_dropdown.style.display = 'block';
    } else {
        list_dropdown.style.display = 'none';
    }
}

select_dropdown.addEventListener('click',menu_dropdown);