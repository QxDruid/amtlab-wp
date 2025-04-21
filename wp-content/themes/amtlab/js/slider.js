document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.slider');
    const slides = document.querySelectorAll('.slide');
    const prevBtn = document.querySelector('.prev-slide');
    const nextBtn = document.querySelector('.next-slide');
    const dotsContainer = document.querySelector('.slider-dots');
    
    let currentSlide = 0;
    const slideCount = slides.length;
    let slideInterval;
    
    // Create dots
    slides.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.classList.add('dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToSlide(index));
        dotsContainer.appendChild(dot);
    });
    
    const dots = document.querySelectorAll('.dot');
    
    // Update slider position
    function updateSlider() {
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }
    
    // Start auto slide
    function startAutoSlide() {
        slideInterval = setInterval(() => goToSlide(currentSlide + 1), 5000);
    }
    
    // Go to specific slide
    function goToSlide(index) {
        currentSlide = index;
        if (currentSlide >= slideCount) currentSlide = 0;
        if (currentSlide < 0) currentSlide = slideCount - 1;
        updateSlider();
        
        // Reset auto slide interval
        clearInterval(slideInterval);
        startAutoSlide();
    }
    
    // Event listeners
    prevBtn.addEventListener('click', () => goToSlide(currentSlide - 1));
    nextBtn.addEventListener('click', () => goToSlide(currentSlide + 1));
    
    // Start auto slide initially
    startAutoSlide();
    
    // Pause on hover
    slider.addEventListener('mouseenter', () => clearInterval(slideInterval));
    slider.addEventListener('mouseleave', startAutoSlide);
}); 