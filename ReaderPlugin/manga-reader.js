jQuery(document).ready(function($) {
    // Get the manga reader container
    var mangaContainer = $('.manga-reader');

    // Get all the manga pages
    var mangaPages = mangaContainer.find('.manga-page');

    // Set the current page to the first one
    var currentPage = 0;

    // Hide all the pages except for the first one
    mangaPages.not(':eq(0)').hide();

    // Handle arrow key presses
    $(document).keydown(function(e) {
        switch (e.which) {
            case 37: // Left arrow
                if (currentPage > 0) {
                    mangaPages.eq(currentPage).hide();
                    currentPage--;
                    mangaPages.eq(currentPage).show();
                }
                break;

            case 39: // Right arrow
                if (currentPage < mangaPages.length - 1) {
                    mangaPages.eq(currentPage).hide();
                    currentPage++;
                    mangaPages.eq(currentPage).show();
                }
                break;

            default:
                return;
        }

        e.preventDefault();
    });
});

