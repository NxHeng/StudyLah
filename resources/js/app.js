import './bootstrap';

//flashcards
var cards = document.querySelectorAll('.fc-study-card');

[...cards].forEach((card) => {
    card.addEventListener('click', function () {
        card.classList.toggle('is-flipped');
    });
});

//welcome page
