console.log("Mini-photo JS is Open");

jQuery(document).ready(function ($) {
    $(".arrow-left, .arrow-right").hover(
        function() {
            const thumbnailUrl = $(this).data("thumbnail-url");
            $("#miniaturePhoto").css(
                "background-image",
                "url('" + thumbnailUrl + "')"
            );
        },
        function () {
            $("#miniaturePhoto").css("background-image", "none");
        }
    );
    $(".arrow-Left, .arrow-right").on("click", function () {
        const targetUrl = $(this).data("target-url");
        
        window.location.href = targetUrl;
    });
});