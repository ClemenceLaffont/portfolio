projet = document.querySelectorAll('.projets');
for(let i = 0; i < projet.length; i++) {
    projet[i].querySelector('.miniature').addEventListener('click', function() {
        projet[i].querySelector('.popup').style.display = 'flex';
    });
    projet[i].querySelector('.croix').addEventListener('click', function() {
        projet[i].querySelector('.popup').style.display = 'none';
    });
    projet[i].querySelector('.popup').addEventListener('click', function() {
        projet[i].querySelector('.popup').style.display = 'none';
    });
    projet[i].querySelector('.gauche').addEventListener('click', function(event) {
        event.stopPropagation();
    });
    projet[i].querySelector('.centre').addEventListener('click', function(event) {
        event.stopPropagation();
    });
    projet[i].querySelector('.droite').addEventListener('click', function(event) {
        event.stopPropagation();
    });
    projet[i].querySelectorAll('.boutonperso').forEach(function(bouton) {
        bouton.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });
    projet[i].querySelector('.gauche').addEventListener('click', function() {
         projet[i].querySelector('.popup').style.display = 'none';

         if (i === 0) {
            var j = projet.length - 1;
         } else {
            var j = i - 1;
         }
         projet[j].querySelector('.popup').style.display = 'flex';
    });
    projet[i].querySelector('.droite').addEventListener('click', function() {
         projet[i].querySelector('.popup').style.display = 'none';
         if (i === projet.length - 1) {
            var j = 0;
         } else {
            var j = i + 1;
         }
         projet[j].querySelector('.popup').style.display = 'flex';
    });
}

let popup = document.querySelectorAll('.popup');
window.addEventListener("keyup", function(e) {
    for(let i = 0; i < popup.length; i++) {
        if (popup[i].style.display === 'flex') {
            if (e.keyCode === 37) {
                projet[i].querySelector('.popup').style.display = 'none';
                if (i === 0) {
                    var j = projet.length - 1;
                    projet[j].querySelector('.popup').style.display = 'flex';
                    return;
                } else {
                    var j = i - 1;
                    projet[j].querySelector('.popup').style.display = 'flex';
                    return;
                }
            } else if (e.keyCode === 39) {
                projet[i].querySelector('.popup').style.display = 'none';
                if (i === projet.length - 1) {
                    var j = 0;
                    projet[j].querySelector('.popup').style.display = 'flex';
                    return;
                } else {
                    var j = i + 1;
                    projet[j].querySelector('.popup').style.display = 'flex';
                    return;
                }
            }
        }
    }
});

document.querySelector('#deroulant').addEventListener('click', function() {
    let menu = document.querySelector('#mouvant');
    if (menu.classList == 'enroule' || menu.style.display == 'none') {
        menu.style.display = 'flex';
        menu.classList = 'deroule';
    } else if (menu.classList == 'deroule') {
        menu.classList = 'enroule';
    }
});