/**
 * Master Tiles - Main JavaScript
 * Contains general website functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const mobileNav = document.querySelector('.mobile-nav');
    const mobileNavClose = document.querySelector('.mobile-nav-close');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');

    // Function to open mobile menu
    function openMobileMenu() {
        mobileNav.classList.add('active');
        mobileMenuOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // Function to close mobile menu
    function closeMobileMenu() {
        mobileNav.classList.remove('active');
        mobileMenuOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    if (mobileMenuToggle && mobileNav) {
        // Open menu when hamburger icon is clicked
        mobileMenuToggle.addEventListener('click', openMobileMenu);

        // Close menu when X is clicked
        mobileNavClose.addEventListener('click', closeMobileMenu);

        // Close menu when overlay is clicked
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);

        // Close menu when ESC key is pressed
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileNav.classList.contains('active')) {
                closeMobileMenu();
            }
        });

        // Close menu when a link is clicked
        const mobileNavLinks = mobileNav.querySelectorAll('a');
        mobileNavLinks.forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });
    }

    // Animated navigation links
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            gsap.to(this, {
                y: -5,
                duration: 0.3,
                ease: 'power2.out'
            });
        });

        link.addEventListener('mouseleave', function() {
            gsap.to(this, {
                y: 0,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });

    // Animated buttons
    const animatedButtons = document.querySelectorAll('.btn-animated');

    animatedButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            gsap.to(this, {
                scale: 1.05,
                duration: 0.3,
                ease: 'power2.out'
            });
        });

        button.addEventListener('mouseleave', function() {
            gsap.to(this, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });

    // Parallax effect for banner
    const banner = document.querySelector('.banner');

    if (banner) {
        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;
            const bannerImage = banner.querySelector('img');

            if (bannerImage) {
                bannerImage.style.transform = `translateY(${scrollPosition * 0.4}px)`;
            }
        });
    }

    // Animated heading text
    const animatedHeadings = document.querySelectorAll('.animated-heading');

    animatedHeadings.forEach(heading => {
        // Split text into characters
        const text = heading.textContent;
        heading.textContent = '';

        for (let i = 0; i < text.length; i++) {
            const span = document.createElement('span');
            span.textContent = text[i] === ' ' ? '\u00A0' : text[i];
            span.style.display = 'inline-block';
            span.style.opacity = '0';
            span.style.transform = 'translateY(20px)';
            span.style.transition = `opacity 0.5s ease, transform 0.5s ease`;
            span.style.transitionDelay = `${i * 0.03}s`;
            heading.appendChild(span);
        }

        // Trigger animation after a short delay
        setTimeout(() => {
            const spans = heading.querySelectorAll('span');
            spans.forEach(span => {
                span.style.opacity = '1';
                span.style.transform = 'translateY(0)';
            });
        }, 300);
    });

    // Product category filtering (if on products page)
    const categoryBtns = document.querySelectorAll('.category-btn');
    const productCards = document.querySelectorAll('.product-card');

    if (categoryBtns.length > 0 && productCards.length > 0) {
        categoryBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const category = this.getAttribute('data-category');

                // Update active button
                categoryBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Filter products with animation
                productCards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        gsap.to(card, {
                            opacity: 1,
                            scale: 1,
                            duration: 0.4,
                            ease: 'power2.out',
                            display: 'block'
                        });
                    } else {
                        gsap.to(card, {
                            opacity: 0,
                            scale: 0.95,
                            duration: 0.4,
                            ease: 'power2.out',
                            onComplete: function() {
                                card.style.display = 'none';
                            }
                        });
                    }
                });
            });
        });
    }
});
