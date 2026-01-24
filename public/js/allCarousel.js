document.addEventListener('DOMContentLoaded', function () {
    
    // ========================================
    // WORK CAROUSEL
    // ========================================
    const workCarousel = document.getElementById('work-carousel');
    if (workCarousel) {
        const inner = workCarousel.querySelector('.work-carousel-inner');
        const items = workCarousel.querySelectorAll('.work-carousel-item');
        const indicators = workCarousel.querySelectorAll('.indicator');

        let itemsPerSlide = 4;
        let isDown = false;
        let startX;
        let scrollLeft;
        let currentSlide = 0;
        let autoScrollInterval;

        // Update items per slide based on screen size
        function updateItemsPerSlide() {
            if (window.innerWidth <= 575) {
                itemsPerSlide = 1;
            } else if (window.innerWidth <= 767) {
                itemsPerSlide = 2;
            } else if (window.innerWidth <= 991) {
                itemsPerSlide = 3;
            } else {
                itemsPerSlide = 4;
            }
        }

        // Update active indicator
        function updateIndicators() {
            const itemWidth = items[0].offsetWidth;
            const gap = 10; // Updated to match CSS
            const slideWidth = itemWidth + gap;
            const activeIndex = Math.round(inner.scrollLeft / slideWidth);

            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === activeIndex);
            });

            currentSlide = activeIndex;
        }

        // Scroll to specific slide
        function scrollToSlide(index) {
            const itemWidth = items[0].offsetWidth;
            const gap = 10; // Updated to match CSS
            const slideWidth = itemWidth + gap;
            inner.scrollTo({
                left: slideWidth * index,
                behavior: 'smooth'
            });
        }

        // Auto scroll
        function startAutoScroll() {
            autoScrollInterval = setInterval(() => {
                if (!isDown) {
                    currentSlide++;
                    if (currentSlide >= items.length) {
                        currentSlide = 0;
                    }
                    scrollToSlide(currentSlide);
                }
            }, 3000);
        }

        // Stop auto scroll
        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        // Mouse drag to scroll
        inner.addEventListener('mousedown', (e) => {
            isDown = true;
            inner.classList.add('grabbing');
            startX = e.pageX - inner.offsetLeft;
            scrollLeft = inner.scrollLeft;
            stopAutoScroll();
        });

        inner.addEventListener('mouseleave', () => {
            isDown = false;
            inner.classList.remove('grabbing');
        });

        inner.addEventListener('mouseup', () => {
            isDown = false;
            inner.classList.remove('grabbing');
            startAutoScroll();
        });

        inner.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - inner.offsetLeft;
            const walk = (x - startX) * 3;
            inner.scrollLeft = scrollLeft - walk;
        });

        // Touch scroll
        inner.addEventListener('touchstart', () => {
            stopAutoScroll();
        });

        inner.addEventListener('touchend', () => {
            startAutoScroll();
        });

        // Update indicators on scroll
        inner.addEventListener('scroll', updateIndicators);

        // Click indicator to scroll
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                stopAutoScroll();
                scrollToSlide(index);
                setTimeout(() => {
                    startAutoScroll();
                }, 500);
            });
        });

        // Update on window resize
        window.addEventListener('resize', function () {
            updateItemsPerSlide();
            updateIndicators();
        });

        // Initialize
        updateItemsPerSlide();
        updateIndicators();
        startAutoScroll();
    }

    // ========================================
    // SERVICE CAROUSEL
    // ========================================
    const serviceCarousel = document.getElementById('service-carousel');
    if (serviceCarousel) {
        const inner = serviceCarousel.querySelector('.service-carousel-inner');
        const items = serviceCarousel.querySelectorAll('.service-carousel-item');
        const indicators = serviceCarousel.querySelectorAll('.indicator');

        let itemsPerSlide = 3;
        let isDown = false;
        let startX;
        let scrollLeft;
        let currentSlide = 0;
        let autoScrollInterval;

        // Update items per slide based on screen size
        function updateItemsPerSlide() {
            if (window.innerWidth <= 575) {
                itemsPerSlide = 1;
            } else if (window.innerWidth <= 991) {
                itemsPerSlide = 2;
            } else {
                itemsPerSlide = 3;
            }
        }

        // Update active indicator
        function updateIndicators() {
            const itemWidth = items[0].offsetWidth;
            const gap = 20;
            const slideWidth = itemWidth + gap;
            const activeIndex = Math.round(inner.scrollLeft / slideWidth);

            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === activeIndex);
            });

            currentSlide = activeIndex;
        }

        // Scroll to specific slide
        function scrollToSlide(index) {
            const itemWidth = items[0].offsetWidth;
            const gap = 20;
            const slideWidth = itemWidth + gap;
            inner.scrollTo({
                left: slideWidth * index,
                behavior: 'smooth'
            });
        }

        // Auto scroll
        function startAutoScroll() {
            autoScrollInterval = setInterval(() => {
                if (!isDown) {
                    currentSlide++;
                    if (currentSlide >= items.length) {
                        currentSlide = 0;
                    }
                    scrollToSlide(currentSlide);
                }
            }, 3000);
        }

        // Stop auto scroll
        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        // Mouse drag to scroll
        inner.addEventListener('mousedown', (e) => {
            isDown = true;
            inner.classList.add('grabbing');
            startX = e.pageX - inner.offsetLeft;
            scrollLeft = inner.scrollLeft;
            stopAutoScroll();
        });

        inner.addEventListener('mouseleave', () => {
            isDown = false;
            inner.classList.remove('grabbing');
        });

        inner.addEventListener('mouseup', () => {
            isDown = false;
            inner.classList.remove('grabbing');
            startAutoScroll();
        });

        inner.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - inner.offsetLeft;
            const walk = (x - startX) * 3;
            inner.scrollLeft = scrollLeft - walk;
        });

        // Touch scroll
        inner.addEventListener('touchstart', () => {
            stopAutoScroll();
        });

        inner.addEventListener('touchend', () => {
            startAutoScroll();
        });

        // Update indicators on scroll
        inner.addEventListener('scroll', updateIndicators);

        // Click indicator to scroll
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                stopAutoScroll();
                scrollToSlide(index);
                setTimeout(() => {
                    startAutoScroll();
                }, 500);
            });
        });

        // Update on window resize
        window.addEventListener('resize', function () {
            updateItemsPerSlide();
            updateIndicators();
        });

        // Initialize
        updateItemsPerSlide();
        updateIndicators();
        startAutoScroll();
    }

    // ========================================
    // CLIENT CAROUSEL
    // ========================================
    const clientCarousel = document.getElementById('client-carousel');
    if (clientCarousel) {
        const inner = clientCarousel.querySelector('.client-carousel-inner');
        const items = clientCarousel.querySelectorAll('.client-carousel-item');

        let isDown = false;
        let startX;
        let scrollLeft;
        let autoScrollInterval;
        let isPaused = false;

        // Scroll one item at a time with pause
        function scrollOneByOne() {
            const itemWidth = items[0].offsetWidth;
            const gap = 20;
            const slideWidth = itemWidth + gap;

            // Scroll to next item
            inner.scrollLeft += slideWidth;

            // Reset to beginning when reaching end
            if (inner.scrollLeft >= inner.scrollWidth - inner.clientWidth - slideWidth) {
                setTimeout(() => {
                    inner.style.scrollBehavior = 'auto';
                    inner.scrollLeft = 0;
                    inner.style.scrollBehavior = 'smooth';
                }, 300);
            }

            // Pause briefly after scrolling
            isPaused = true;
            setTimeout(() => {
                isPaused = false;
            }, 300);
        }

        // Start auto scroll
        function startAutoScroll() {
            autoScrollInterval = setInterval(() => {
                if (!isDown && !isPaused) {
                    scrollOneByOne();
                }
            }, 2000);
        }

        // Stop auto scroll
        function stopAutoScroll() {
            clearInterval(autoScrollInterval);
        }

        // Mouse drag to scroll
        inner.addEventListener('mousedown', (e) => {
            isDown = true;
            inner.classList.add('grabbing');
            startX = e.pageX - inner.offsetLeft;
            scrollLeft = inner.scrollLeft;
            stopAutoScroll();
        });

        inner.addEventListener('mouseleave', () => {
            isDown = false;
            inner.classList.remove('grabbing');
        });

        inner.addEventListener('mouseup', () => {
            isDown = false;
            inner.classList.remove('grabbing');
            startAutoScroll();
        });

        inner.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - inner.offsetLeft;
            const walk = (x - startX) * 3;
            inner.scrollLeft = scrollLeft - walk;
        });

        // Touch scroll (mobile)
        inner.addEventListener('touchstart', () => {
            stopAutoScroll();
        });

        inner.addEventListener('touchend', () => {
            startAutoScroll();
        });

        // Initialize
        startAutoScroll();
    }

});