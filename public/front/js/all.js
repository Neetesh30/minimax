document.addEventListener('DOMContentLoaded', () => {

/* ============================
   SCROLL REVEAL + PROGRESS BAR
============================= */

// Cache elements once
const reveals = document.querySelectorAll('.reveal');
const progressBar = document.getElementById("myBar");

/* Main scroll handler */
const handleScroll = () => {

    /* 1. Reveal Elements on Scroll */
    reveals.forEach(el => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight - 80) {
            el.classList.add('active');
        }
    });

    /* 2. Progress Bar Scroll Percentage */
    if (progressBar) {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        progressBar.style.width = scrolled + "%";
    }
};

// Attach single scroll listener
window.addEventListener("scroll", handleScroll);

// Run once on page load
handleScroll();
   
    /* ============================
       2. MAIN MOBILE MENU TOGGLE
    ============================= */

    const toggleOpen = document.getElementById('toggleOpen');
    const toggleClose = document.getElementById('toggleClose');
    const collapseMenu = document.getElementById('collapseMenu');

    function toggleMainMenu() {
        collapseMenu.classList.toggle('max-lg:hidden');

        if (collapseMenu.classList.contains('max-lg:hidden')) {
            document.querySelectorAll('.mobile-active').forEach(el => el.classList.remove('mobile-active'));
            document.querySelectorAll('.mobile-chevron').forEach(el => el.style.transform = 'rotate(0deg)');
        }
    }

    if (toggleOpen) toggleOpen.addEventListener('click', toggleMainMenu);
    if (toggleClose) toggleClose.addEventListener('click', toggleMainMenu);


    /* ============================
   3. DROPDOWN / MEGA MENU (Mobile)
============================= */
const menuLinks = document.querySelectorAll('[data-menu-link]');

menuLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        const isMobile = window.innerWidth < 1024;
        if (!isMobile) return;

        e.preventDefault();

        const menuType = link.getAttribute('data-menu-link');
        let targetMenu = null;

        // MEGA MENU (id)
        if (menuType === 'mega-menu') {
            targetMenu = document.getElementById('mega-menu');
        }

        // SIMPLE DROPDOWN (closest dropdown)
        if (menuType === 'dropdown-menu') {
            targetMenu = link.parentElement.querySelector('.dropdown-content');
        }

        const chevron = link.querySelector('.mobile-chevron');
        if (!targetMenu) return;

        const isOpen = targetMenu.classList.contains('mobile-active');

        // Close others
        menuLinks.forEach(other => {
            if (other !== link) {
                let otherMenu = null;

                if (other.getAttribute('data-menu-link') === 'mega-menu') {
                    otherMenu = document.getElementById('mega-menu');
                } else {
                    const parentLi = other.closest("li");
                    if (parentLi) {
                        otherMenu = parentLi.querySelector(".dropdown-content");
                    }
                }

                if (otherMenu) otherMenu.classList.remove("mobile-active");

                const otherChevron = other.querySelector(".mobile-chevron");
                if (otherChevron) otherChevron.style.transform = "rotate(0deg)";
            }
        });

        // Toggle the menu with animation
        targetMenu.classList.toggle("mobile-active");

        // Chevron animation
        if (chevron) {
            chevron.style.transform = isOpen ? "rotate(0deg)" : "rotate(180deg)";
            chevron.style.transition = "transform 0.3s ease";
        }
    });
});



    /* ============================
       4. SWIPER SLIDERS
    ============================= */

    // Hero Slider
    new Swiper('.custom-hero-slider', {
        direction: 'horizontal',
        loop: document.querySelectorAll('.custom-hero-slider .swiper-slide').length > 1,
        parallax: true,
        effect: "cube",
        cubeEffect: {
            shadow: false,         // Disable the main cube shadow
            slideShadows: false,   // Disable shadows on each slide
          },
        speed: 1500,
        autoplay: { delay: 7000, disableOnInteraction: false },
        pagination: { el: '.swiper-pagination', clickable: true },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        on: {
            slideChangeTransitionStart: function () {
                const leavingSlide = this.slides[this.previousIndex];
                if (leavingSlide) {
                    leavingSlide.querySelectorAll('.animated-text').forEach(el => {
                        el.style.animation = 'none';
                        el.offsetHeight;
                        el.style.animation = null;
                    });
                }
            }
        }
    });

   new Swiper('.products-swiper', {
    loop: true,
    centeredSlides: true,
    slidesPerView: 1,
    spaceBetween: 24,
    autoplay: true,
    speed: 1300,
    slideToClickedSlide: true, // optional but useful
    breakpoints: {
        900: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 40,
        },
        1500: {
            slidesPerView: 3,
            spaceBetween: 0,
        },

         1920: {
            slidesPerView: 3,
            spaceBetween: 0,
        }
    },
    navigation: {
        nextEl: '#next-testimonial',
        prevEl: '#prev-testimonial'
    }
});


    // Related Products
    new Swiper('.relatedSwiper', {
        loop: true,
        autoplay:true,
        speed:1300,
        slidesPerView: 1,
        spaceBetween: 24,
        breakpoints: {
            640: { slidesPerView: 2, spaceBetween: 30 },
            1024: { slidesPerView: 3, spaceBetween: 40 },
            1500: { slidesPerView: 4, spaceBetween: 40 }
        },
        pagination: { el: '.custom-pagination', clickable: true },
        navigation: { nextEl: '#next-testimonial', prevEl: '#prev-testimonial' }
    });

    new Swiper('#testimonial-slider', {
            loop: true,
            centeredSlides: true,
            grabCursor: true,
            speed: 600,
          
            slidesPerView: 1,
            breakpoints: {
                
                1024: {
                slidesPerView: 3,
                },

                 1500: {
                slidesPerView: 3,
                },
            },

            effect: 'coverflow',
            coverflowEffect: {
                rotate: 60,
                stretch: 0,
                depth: 180,
                modifier: 1,
                slideShadows: false,
            },

            autoplay: { delay: 10000, disableOnInteraction: false },

            navigation: {
                nextEl: '#next-testimonial',
                prevEl: '#prev-testimonial',
            },
            });


    // // Vertical Logo Slider
    // new Swiper('#logo-slider', {
    //     direction: 'vertical',
    //     loop: true,
    //     autoplay:true,
    //     speed: 2000,
    //     parallax: true,
    //     slidesPerView: 1,
    //     slidesPerGroup: 1,
    //     spaceBetween: 20,
    // });


    // Vertical Logo Slider
    new Swiper('.relatedPostsSwiper', {
        loop: true,
        speed: 1300,
        autoplay: { delay: 2500, disableOnInteraction: false },
        spaceBetween: 20,
         breakpoints: {
            640: { slidesPerView: 2, spaceBetween: 30 },
            1024: { slidesPerView: 3, spaceBetween: 40 },
            1500: { slidesPerView: 4, spaceBetween: 40 }
        },
        
        navigation: { nextEl: '#next-testimonial', prevEl: '#prev-testimonial' }
    });



    
    /* ============================
       5. TABS
    ============================= */
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const targetId = tab.id.replace('Tab', 'Content');

            contents.forEach(c => c.classList.add('hidden'));
            tabs.forEach(t =>
                t.classList.remove('text-blue-700', 'border-blue-700', 'font-semibold')
            );

            document.getElementById(targetId).classList.remove('hidden');
            tab.classList.add('text-blue-700', 'border-blue-700', 'font-semibold');
        });
    });



    /* ============================
       6. MODAL
    ============================= */
      
  /* ==========================================================
   MODAL 1 (Generic Modal)
========================================================== */
const modal = document.getElementById('modal');
const modalContent = document.getElementById('modalContent');
const openModalBtn = document.getElementById('openModal');
const closeModalBtn = document.getElementById('closeIcon');

function showMainModal() {
    modal.classList.remove('hidden');
    requestAnimationFrame(() => {
        modalContent.classList.remove('opacity-0', 'scale-95');
        modalContent.classList.add('opacity-100', 'scale-100');
    });
}

function hideMainModal() {
    modalContent.classList.add('opacity-0', 'scale-95');
    modalContent.classList.remove('opacity-100', 'scale-100');
    setTimeout(() => modal.classList.add('hidden'), 300);
}

openModalBtn?.addEventListener('click', showMainModal);
closeModalBtn?.addEventListener('click', hideMainModal);

// Close when clicking outside modal content
modal?.addEventListener("click", (e) => {
    if (!modalContent.contains(e.target)) hideMainModal();
});


/* ==========================================================
   MODAL 2 (Enquiry Modal)
========================================================== */
const enquiryModal = document.getElementById("enquiryModal");
const enquiryCard = document.getElementById("modalCard");
const closeEnquiryBtn = document.getElementById("closeModal");

document.getElementById("enquiryBtn")?.addEventListener("click", () => {
    enquiryModal.classList.remove("hidden");

    requestAnimationFrame(() => {
        enquiryCard.classList.remove("opacity-0", "scale-95");
        enquiryCard.classList.add("opacity-100", "scale-100");
    });
});

function hideEnquiryModal() {
    enquiryCard.classList.add("opacity-0", "scale-95");
    enquiryCard.classList.remove("opacity-100", "scale-100");
    setTimeout(() => enquiryModal.classList.add("hidden"), 250);
}

closeEnquiryBtn?.addEventListener("click", hideEnquiryModal);

// Close when clicking outside enquiry card
enquiryModal?.addEventListener("click", (e) => {
    if (!enquiryCard.contains(e.target)) hideEnquiryModal();
});


/* ==========================================================
   GLOBAL ESC KEY SUPPORT
========================================================== */
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
        if (!modal?.classList.contains("hidden")) hideMainModal();
        if (!enquiryModal?.classList.contains("hidden")) hideEnquiryModal();
    }
});



    /* ============================
       7. ACCORDION (Two Versions Merged)
    ============================= */
    // First Accordion Version
    const firstAccContent = document.querySelector('.accordion-content');
    if (firstAccContent) firstAccContent.style.maxHeight = firstAccContent.scrollHeight + 'px';

    document.querySelectorAll('.accordion-button').forEach(button => {
        button.addEventListener('click', () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector('svg');

            document.querySelectorAll('.accordion-content').forEach(el => {
                if (el !== content) el.style.maxHeight = '0px';
            });

            document.querySelectorAll('.accordion-button svg').forEach(svg => {
                if (svg !== icon) svg.classList.remove('rotate-180');
            });

            if (!content.style.maxHeight || content.style.maxHeight === '0px') {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.classList.add('rotate-180');
            } else {
                content.style.maxHeight = '0px';
                icon.classList.remove('rotate-180');
            }
        });
    });

    // Second Accordion Version
    document.querySelectorAll(".accordion-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            const content = btn.nextElementSibling;
            const arrow = btn.querySelector(".arrow");

            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                arrow.style.transform = "rotate(0deg)";
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                arrow.style.transform = "rotate(180deg)";
            }
        });
    });

});



const accordionButtons = document.querySelectorAll('.menu-btn');
  const menuItems = document.querySelectorAll('.menu-item');
  const contentPanels = document.querySelectorAll('.slide-content');

  /* ========== ACCORDION LOGIC ========== */
  accordionButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const submenu = btn.nextElementSibling;
      const arrow = btn.querySelector('.arrow');

      accordionButtons.forEach(other => {
        if (other !== btn) {
          const otherMenu = other.nextElementSibling;
          const otherArrow = other.querySelector('.arrow');
          otherMenu.style.maxHeight = "0px";
          otherArrow.style.transform = "rotate(0deg)";
        }
      });

      if (!submenu.style.maxHeight || submenu.style.maxHeight === "0px") {
        submenu.style.maxHeight = submenu.scrollHeight + "px";
        arrow.style.transform = "rotate(180deg)";
      } else {
        submenu.style.maxHeight = "0px";
        arrow.style.transform = "rotate(0deg)";
      }
    });
  });



  
  /* ========== CONTENT SWITCHING ========== */
  menuItems.forEach(item => {
    item.addEventListener('click', () => {
      const targetId = item.dataset.content;
      const targetPanel = document.getElementById(targetId);

      // Mobile only: close accordion
      if (window.innerWidth < 768) {
        accordionButtons.forEach(btn => {
          const menu = btn.nextElementSibling;
          const arrow = btn.querySelector('.arrow');
          menu.style.maxHeight = "0px";
          arrow.style.transform = "rotate(0deg)";
        });
      }

      // Hide all other panels
      contentPanels.forEach(panel => {
        if (panel !== targetPanel) panel.classList.remove("show");
      });

      // Show selected panel with smooth transition
      requestAnimationFrame(() => {
        targetPanel.classList.add("show");
      });
    });
  });



//   odometer js

  const odometers = document.querySelectorAll(".odometer");

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            const el = entry.target;
            const count = el.getAttribute("data-count");

            if (entry.isIntersecting) {
                el.innerHTML = count; // animate up
            } else {
                el.innerHTML = 0;     // reset on exit
            }
        });
    }, { threshold: 0.5 });

    odometers.forEach(odometer => observer.observe(odometer));

    //whatsapp floating button
    $('.floating-wpp').floatingWhatsApp({
        phone: '919821595174',
        popupMessage: 'Message us your requirement we will get back to you shortly.',
        showPopup: true,
        position: 'left',
        autoOpen: true,
        autoOpenTimer: 4000,
        message: '',
        headerColor: 'green',
        headerTitle: 'Chat with us on WhatsApp!',
    });
   

    // video popup js

      function openVideo() {
      document.getElementById('videoModal').classList.remove('hidden');
      document.getElementById('videoFrame').src =
      "https://www.youtube.com/embed/kbK4qEEL3ks?autoplay=1";
      }

    function closeVideo() {
        document.getElementById('videoModal').classList.add('hidden');
        document.getElementById('videoFrame').src = "";
    }
