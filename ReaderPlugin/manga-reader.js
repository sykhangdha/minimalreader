jQuery(document).ready(function($) {
  $('.manga-reader').each(function() {
    var $reader = $(this),
        $pages = $reader.find('.manga-page'),
        currentIndex = 0;

    $reader.on('click', '.manga-page', function() {
      currentIndex = ($pages.index(this) + 1) % $pages.length;
      $pages.hide();
      $pages.eq(currentIndex).show();
    });

    $(document).keydown(function(e) {
      switch(e.which) {
        case 37: // left
          currentIndex = (currentIndex + $pages.length - 1) % $pages.length;
          break;
        case 39: // right
          currentIndex = (currentIndex + 1) % $pages.length;
          break;
        default: return;
      }
      $pages.hide();
      $pages.eq(currentIndex).show();
      e.preventDefault();
    });

    $pages.eq(0).show();
  });
});
