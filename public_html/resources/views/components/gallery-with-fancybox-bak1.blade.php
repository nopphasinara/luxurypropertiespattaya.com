@push('header.scripts')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.0/jquery.fancybox.min.css" />
  <style>.fancybox-bg {background-color: #fff;}.fancybox-infobar {left: auto;right: 0;}.fancybox-image {box-shadow: rgba(0, 0, 0, 0.8) 0px 5px 25px;transition: box-shadow .2s;}.fancybox-is-scaling .fancybox-image {box-shadow: none;}.fancybox-is-scaling .fancybox-item,.fancybox-can-drag .fancybox-item {display: none !important;}.fancybox-close {position: absolute;top: -18px;right: -18px;width: 36px;height: 36px;background-image: url(https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.7/images/fancybox/fancybox_sprite.png);z-index: 2;}.fancybox-nav {position: absolute;top: 0;width: 25%;height: 100%;cursor: pointer;text-decoration: none;-webkit-tap-highlight-color: rgba(0,0,0,0);}.fancybox-prev {left: 0;}.fancybox-next {right: 0;}.fancybox-nav span {position: absolute;top: 50%;width: 36px;height: 34px;margin-top: -18px;cursor: pointer;visibility: hidden;}.fancybox-prev span, .fancybox-next span {background-image : url(https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.7/images/fancybox/fancybox_sprite.png);}.fancybox-prev span {left: 10px;background-position: 0 -36px;}.fancybox-next span {right: 10px;background-position: 0 -72px;}.fancybox-nav:hover span {visibility: visible;}</style>
@endpush

<div id="gallery_carousel" class="noselect">
  @for ($i = 0; $i < 13; $i++)
    <a href="{{ asset('/images/demo-property.jpg') }}" data-fancybox="images">
      <img class="item" src="{{ asset('/images/demo-property.jpg') }}" width="auto" height="284" alt="ALT {{ ($i + 1) }}">
    </a>
  @endfor
</div>
<p id="item-title" class="d-none">&nbsp;</p>
<div id="nav" class="noselect d-none">
  <button class="left">←</button> <button class="right">→</button>
</div>

@push('footer.scripts')
  <script src="{{ asset('/lib/jquery.js') }}"></script>
  <script src="{{ asset('/lib/jquery.reflection.js') }}"></script>
  <script src="{{ asset('/lib/jquery.mousewheel.js') }}"></script>
  <script src="{{ asset('/lib/jquery.cloud9carousel.js') }}"></script>
  <script>
    $(function() {
      var gallery_carousel = $("#gallery_carousel");
      var title            = $('#item-title');
      var current_item     = null;

      gallery_carousel.Cloud9Carousel({
        current: 0,
        xOrigin: ($('#gallery_carousel').width() / 2),
        yOrigin: 40,
        yRadius: 40,
        mirror: {
          gap: 0,
          height: 0.2,
          opacity: 0.2,
        },
        buttonLeft: $("#nav > .left"),
        buttonRight: $("#nav > .right"),
        autoPlay: 1,
        autoPlayDelay: 10000,
        bringToFront: true,
        itemClass: 'item',
        mouseWheel: true,
        onRendered: function (carousel) {
          // title.text(carousel.nearestItem().element.alt);
          // Fade in based on proximity of the item
          // var c = Math.cos((carousel.floatIndex() % 1) * 2 * Math.PI);
          // title.css('opacity', 0.5 + (0.5 * c));

          if (carousel.current != carousel.nearestIndex()) {
            $('#gallery_carousel img').removeClass('frontmost');
            carousel.current = carousel.nearestIndex();
            current_item = $('#gallery_carousel img:eq('+ carousel.nearestIndex() +')');
            current_item.addClass('frontmost');
          }
        },
        onLoaded: function() {
          gallery_carousel.css('visibility', 'visible');
          gallery_carousel.css('display', 'none');
          gallery_carousel.fadeIn(1500);
        },
      });

      $('#gallery_carousel img').click(function () {
        var isFrontMost = $(this).hasClass('frontmost');
        if (isFrontMost == true) {
          // alert('show modal');
        } else {
          // alert('no modal');
        }
      });

      // $('#nav > button').click(function(e) {
      //   var b = $(e.target).addClass('down');
      //   setTimeout(function() { b.removeClass('down') }, 80);
      // });

      // $(document).keydown(function (e) {
      //   // More codes: http://www.javascripter.net/faq/keycodes.htm
      //   switch(e.keyCode) {
      //     /* left arrow */
      //     case 37:
      //     $('#nav > .left').click();
      //     break;
      //
      //     /* right arrow */
      //     case 39:
      //     $('#nav > .right').click();
      //     break;
      //   }
      // });
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.0/jquery.fancybox.min.js"></script>
  <script>
  $(document).ready(function() {
    $('[data-fancybox="images"]').fancybox({
      protect:           true,
      toolbar:           true,
      smallBtn:          true,
      arrows:            true,
      idleTime:          false,
      keyboard: true,
      infobar: true,
      loop:              true,
      margin:            [44, 60],
      transitionEffect:  "fade",
      animationEffect: "zoom",
      zoomOpacity: "auto",
      animationDuration: 333,
      buttons: [
        // "zoom",
        // 'share',
        //'slideShow',
        // 'fullScreen',
        // 'download',
        // "thumbs",
        // "close",
      ],
      preload: true,
      afterLoad : function(instance, slide) {
        $('<a title="Close" class="fancybox-item fancybox-close" href="javascript:;" data-fancybox-close></a><a title="Previous" class="fancybox-item fancybox-nav fancybox-prev" href="javascript:;" data-fancybox-prev><span></span></a><a title="Next" class="fancybox-item fancybox-nav fancybox-next" href="javascript:;" data-fancybox-next><span></span></a>').appendTo( slide.$content );
      }
    });
  });
  </script>
@endpush
