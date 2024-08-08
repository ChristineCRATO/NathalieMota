console.log("Header Menu Burger JS is Open !");

//Listen DOM Before Script Execution
document.addEventListener('DOMContentLoaded', function () {
    // Declare Variables Menu Header
    const menuBlock = document.querySelector('.menuBlock'); // Selected Menu
    const menuNav = document.querySelector('.menuNav'); // Selected Nav
    const menuLinks = document.querySelectorAll('.menuNav a'); // Selected Links

    // Listen Clic Menu
    menuBlock.addEventListener('click', function () {
        menuBlock.classList.toggle('active'); // Add Or Remove "Active" class Menu
        menuNav.classList.toggle('active'); // Add Or Remove "Active" class Nav
    });

    // Explore Navigatin Links
    menuLinks.forEach(function (link) {
        link.addEventListener('click', function () { // Listen Clic Links
            menuBlock.classList.remove('active'); // Delete "Active" class Menu
            menuNav.classList.remove('active'); // Delete "Active" class Nav
        });
    });
});