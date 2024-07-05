console.log("Header JS is Open !");

//Listen DOM Before Script Execution
document.addEventListener("DOMContentLoaded", function () {
    // Declare Variables Menu Header
    const menuBloc = document.querySelector(".menuBloc"); // Selected Menu
    const menuNav = document.querySelector(".menuNav"); // Selected Nav
    const menuLinks = document.querySelectorAll(".navMenu a"); // Selected Links

    // Listen Clic Menu
    menuBloc.addEventListener("click", function () {
        menuBloc.classList.toggle("active"); // Add Or Remove "Active" class Menu
        menuNav.classList.toggle("active"); // Add Or Remove "Active" class Nav
    });

    // Explore Navigatin Links
    menuLinks.forEach(function (link) {
        link.addEventListener("click", function () { // Listen Clic Links
            menuBloc.classList.remove("active"); // Delete "Active" class Menu
            menuNav.classList.remove("active"); // Delete "Active" class Nav
        });
    });
});