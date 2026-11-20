console.log('hoi js');


/* Initialization of all available modules. */

document.addEventListener('DOMContentLoaded', () => {

    initImageGallery();

});


/* Image Gallery Module */

function initImageGallery() {

    const galleries = document.querySelectorAll(
        '[data-module="image-gallery"]'
    );

    galleries.forEach(gallery => {

        const track = gallery.querySelector('.gallery-track');
        const slides = gallery.querySelectorAll('.gallery-slide');
        const dots = gallery.querySelectorAll('.gallery-dot');

        if (!track || slides.length < 2) {
            return;
        }


        /* Update active pagination dot */

        function updateDots(activeIndex) {

            dots.forEach((dot, index) => {

                dot.classList.toggle('active', index === activeIndex);

                dot.setAttribute(
                    'aria-current',
                    index === activeIndex ? 'true' : 'false'
                );

            });

        }


        /* Navigation via pagination dots */

        dots.forEach((dot, index) => {

            dot.addEventListener('click', () => {

                track.scrollTo({
                    left: index * track.clientWidth,
                    behavior: 'smooth'
                });

            });

        });


        /* Update pagination on scroll and swipe */

        track.addEventListener('scroll', () => {

            const activeIndex = Math.round(
                track.scrollLeft / track.clientWidth
            );

            updateDots(activeIndex);

        }, { passive: true });


        /* Update gallery on window resize */

        window.addEventListener('resize', () => {

            const activeIndex = Array.from(dots).findIndex(
                dot => dot.classList.contains('active')
            );

            track.scrollTo({
                left: Math.max(0, activeIndex) * track.clientWidth,
                behavior: 'instant'
            });

        });

    });

}
