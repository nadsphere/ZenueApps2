(function() {
    "use strict";

    var track = document.getElementById('eoSliderTrack');
    var prevBtn = document.getElementById('eoSliderPrev');
    var nextBtn = document.getElementById('eoSliderNext');
    var dotsContainer = document.getElementById('eoSliderDots');

    if (!track || !prevBtn || !nextBtn || !dotsContainer) return;

    var cards = Array.from(track.querySelectorAll('.eo-card-item'));
    var totalCards = cards.length;
    var currentSlide = 0;
    var cardsPerView = 4;
    var autoInterval = null;
    var AUTO_DELAY = 4000;

    function getCardsPerView() {
        var w = window.innerWidth;
        if (w <= 767) return 1;
        if (w <= 991) return 2;
        if (w <= 1199) return 3;
        return 4;
    }

    function getTotalSlides() {
        return Math.ceil(totalCards / cardsPerView);
    }

    function goToSlide(index) {
        var total = getTotalSlides();
        currentSlide = ((index % total) + total) % total; // wrap
        var cardWidth = 100 / cardsPerView; // dynamic percentage per card
        var offset = currentSlide * cardWidth;
        track.style.transform = 'translateX(-' + offset + '%)';
        updateDots();
    }

    function nextSlide() {
        goToSlide(currentSlide + 1);
    }

    function prevSlide() {
        goToSlide(currentSlide - 1);
    }

    function buildDots() {
        dotsContainer.innerHTML = '';
        var total = getTotalSlides();
        for (var i = 0; i < total; i++) {
            var dot = document.createElement('button');
            dot.className = 'dot' + (i === 0 ? ' active' : '');
            dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
            dot.addEventListener('click', (function(idx) {
                return function() { goToSlide(idx); };
            })(i));
            dotsContainer.appendChild(dot);
        }
    }

    function updateDots() {
        var dots = dotsContainer.querySelectorAll('.dot');
        dots.forEach(function(d, i) {
            d.classList.toggle('active', i === currentSlide);
        });
    }

    function startAuto() {
        stopAuto();
        autoInterval = setInterval(nextSlide, AUTO_DELAY);
    }

    function stopAuto() {
        if (autoInterval) {
            clearInterval(autoInterval);
            autoInterval = null;
        }
    }

    // Button events
    prevBtn.addEventListener('click', function() {
        prevSlide();
        startAuto();
    });
    nextBtn.addEventListener('click', function() {
        nextSlide();
        startAuto();
    });

    // Pause on hover
    track.addEventListener('mouseenter', stopAuto);
    track.addEventListener('mouseleave', startAuto);

    // Responsive: rebuild on resize
    var resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            cardsPerView = getCardsPerView();
            buildDots();
            goToSlide(0);
        }, 200);
    });

    // Touch swipe support
    var touchStartX = 0;
    var touchEndX = 0;
    track.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });
    track.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        var diff = touchStartX - touchEndX;
        if (Math.abs(diff) > 50) {
            if (diff > 0) nextSlide();
            else prevSlide();
            startAuto();
        }
    }, { passive: true });

    // Init
    cardsPerView = getCardsPerView();
    buildDots();
    goToSlide(0);
    startAuto();
})();
