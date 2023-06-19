import './bootstrap';

// import Chart from 'chart.js/auto';

//flashcards
var cards = document.querySelectorAll('.fc-study-card');

[...cards].forEach((card) => {
    card.addEventListener('click', function () {
        card.classList.toggle('is-flipped');
    });
});

//Stats
