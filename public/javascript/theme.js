document.querySelectorAll('.position-relative').forEach((sliderContainer) => {
    const slider = sliderContainer.querySelector('.productSlider');
    const nextBtn = sliderContainer.querySelector('.nextBtn');
    const prevBtn = sliderContainer.querySelector('.prevBtn');
    const cardWidth = slider.querySelector('.card').offsetWidth + 12; // card + margin

    // Next
    nextBtn.addEventListener('click', () => {
        if (slider.scrollLeft + slider.offsetWidth >= slider.scrollWidth) {
            slider.scrollTo({ left: 0, behavior: 'smooth' }); // loop back to start
        } else {
            slider.scrollBy({ left: cardWidth, behavior: 'smooth' });
        }
    });

    // Prev
    prevBtn.addEventListener('click', () => {
        if (slider.scrollLeft === 0) {
            slider.scrollTo({ left: slider.scrollWidth, behavior: 'smooth' }); // loop to end
        } else {
            slider.scrollBy({ left: -cardWidth, behavior: 'smooth' });
        }
    });

    // Auto-scroll every 3s
    setInterval(() => {
        if (slider.scrollLeft + slider.offsetWidth >= slider.scrollWidth) {
            slider.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            slider.scrollBy({ left: cardWidth, behavior: 'smooth' });
        }
    }, 3000);
});
