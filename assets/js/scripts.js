(function () {
    window.setTimeout(show, 1000);

    var loader = document.getElementsByClassName("loader");
    var content = document.getElementsByClassName("content");

    function show() {
        for (i = 0; i < content.length; i++) {
            content[i].removeAttribute("hidden");
            loader[i].setAttribute("hidden", true);
        }
    }

    window.addEventListener('beforeunload', function (e) {
        e.preventDefault();
        window.setTimeout(show, 1000);
    });


    const navbarToggler = document.getElementById("navbarToggler");
    const animatedIcon = document.querySelector(".animated-icon");

    navbarToggler.addEventListener('click', function (e) {
        e.preventDefault();
        animatedIcon.classList.toggle("open");
    });

    const currentLink = location.href;
    const navLink = document.querySelectorAll("a.nav-link");
    const linkLength = navLink.length;

    for (let i = 0; i < linkLength; i++) {
        if (navLink[i].href === currentLink) {
            navLink[i].classList.add("active");
            navLink[i].classList.add("border-bottom");
        }
    }
})();