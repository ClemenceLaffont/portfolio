

projet = document.querySelectorAll('.projets');
for(let i = 0; i < projet.length; i++) {
    projet[i].querySelector('.miniature').addEventListener('click', function() {
        projet[i].querySelector('.popup').style.display = 'block';
    });
    projet[i].querySelector('.croix').addEventListener('click', function() {
        projet[i].querySelector('.popup').style.display = 'none';
    });
    projet[i].querySelector('.gauche').addEventListener('click', function() {
         projet[i].querySelector('.popup').style.display = 'none';

         if (i === 0) {
            var j = projet.length - 1;
         } else {
            var j = i - 1;
         }
         projet[j].querySelector('.popup').style.display = 'block';
    });
    projet[i].querySelector('.droite').addEventListener('click', function() {
         projet[i].querySelector('.popup').style.display = 'none';
         console.log('ok');
         if (i === projet.length - 1) {
            console.log('ok1');
            var j = 0;
         } else {
            console.log('ok2');
            var j = i + 1;
         }
         console.log('ok4');
         projet[j].querySelector('.popup').style.display = 'block';
    });
}