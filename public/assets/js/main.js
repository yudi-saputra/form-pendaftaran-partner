(function () {
    /* ========= Preloader ======== */
    const preloader = document.getElementById('preloader');

    window.addEventListener('load', function () {
        if (preloader) {
            preloader.style.display = 'none';
        }
    });

    /* ========= Add Box Shadow in Header on Scroll ======== */
    window.addEventListener('scroll', function () {
        const header = document.querySelector('.header');
        if (!header) return;

        header.style.boxShadow = window.scrollY > 0
            ? '0px 0px 30px 0px rgba(200, 208, 216, 0.30)'
            : 'none';
    });

    /* ========= Sidebar Toggle ======== */
    const sidebarNavWrapper = document.querySelector(".sidebar-nav-wrapper");
    const mainWrapper = document.querySelector(".main-wrapper");
    const menuToggleButton = document.querySelector("#menu-toggle");
    const menuToggleButtonIcon = menuToggleButton?.querySelector("i");
    const overlay = document.querySelector(".overlay");

    if (menuToggleButton && sidebarNavWrapper && mainWrapper && overlay && menuToggleButtonIcon) {
        menuToggleButton.addEventListener("click", () => {
            sidebarNavWrapper.classList.toggle("active");
            overlay.classList.add("active");
            mainWrapper.classList.toggle("active");

            if (document.body.clientWidth > 1200) {
                const isLeft = menuToggleButtonIcon.classList.contains("lni-chevron-left");
                menuToggleButtonIcon.classList.toggle("lni-chevron-left", !isLeft);
                menuToggleButtonIcon.classList.toggle("lni-menu", isLeft);
            } else {
                // Untuk layar kecil, pastikan ikon diubah ke menu
                menuToggleButtonIcon.classList.remove("lni-chevron-left");
                menuToggleButtonIcon.classList.add("lni-menu");
            }
        });

        overlay.addEventListener("click", () => {
            sidebarNavWrapper.classList.remove("active");
            overlay.classList.remove("active");
            mainWrapper.classList.remove("active");
        });
    }
})();
