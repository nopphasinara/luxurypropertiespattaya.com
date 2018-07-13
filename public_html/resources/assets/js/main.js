/**
 * The semi-colon before function invocation is a safety net against concatenated
 * scripts and/or other plugins which may not be closed properly.
 */
;

var _old_device = '';
var _current_device = 'desktop';
var _mobile_device = false;
var _old_width = $(window).outerWidth();

function findBootstrapEnvironment() {
  var is_xs = $('#current-device .xs').is(':visible');
  var is_sm = $('#current-device .sm').is(':visible');
  var is_md = $('#current-device .md').is(':visible');
  var is_lg = $('#current-device .lg').is(':visible');

  var data_current = '';
  if (is_xs) {
    data_current = 'mobile';
  } else if (is_sm) {
    data_current = 'tablet';
  } else if (is_md) {
    data_current = 'desktop';
  } else {
    data_current = 'large';
  }

  _old_device = _current_device;

  $('#current-device').attr('data-current', data_current);
  _current_device = data_current;

  if (_current_device == 'mobile') {
    _mobile_device = true;
  } else {
    _mobile_device = false;
  }

  $('body').removeClass('large-device');
  $('body').removeClass('desktop-device');
  $('body').removeClass('tablet-device');
  $('body').removeClass('mobile-device');
  $('body').removeClass('mobile');
  $('body').addClass(_current_device + '-device');
  if (_mobile_device) {
    $('body').addClass('mobile');
  }
}

function pageScrolling(options = []) {
  // if (window.pageYOffset >= 560) {
  //   $('#topbar').addClass('d-none');
  // } else {
  //   $('#topbar').removeClass('d-none');
  // }
}

function sidebarMonitor(e) {
  var watchers = $(e).map(function(i, element) {
    var watcher = scrollMonitor.create( element );

    watcher.lock();
    watcher.stateChange(function() {
      $(element).toggleClass('fixed', this.isAboveViewport);
    });

    // watcher.exitViewport(function() {
    //   $(element).addClass('fixed');
    // });
    // watcher.enterViewport(function() {
    //   $(element).removeClass('fixed');
    // });

    return watcher;
  });
}

window.addEventListener('scroll', function () {
  pageScrolling();
});

window.addEventListener('resize', function () {
  findBootstrapEnvironment();
});

$(document).on('.data-api');

$(document).ready(function () {
  findBootstrapEnvironment();

  pageScrolling();
  
  sidebarMonitor('.fixed-widget');

  $('#navbar-main .navbar-nav .nav-item.dropdown').bind('mouseover', function () {
    if (!_mobile_device && _current_device != 'tablet' && _current_device != 'desktop') {
      $(this).addClass('show');
      $(this).children('.dropdown-menu').addClass('show');
      $(this).children('.dropdown-toggle').attr('aria-expanded', 'false');
    }
  }).bind('mouseleave', function () {
    if (!_mobile_device && _current_device != 'tablet' && _current_device != 'desktop') {
      $(this).removeClass('show');
      $(this).children('.dropdown-menu').removeClass('show');
      $(this).children('.dropdown-toggle').attr('aria-expanded', 'true');
    }
  });
  
  $('#navbar-main .subnav').on('mouseenter', function(evt) {
    if ($('body').hasClass('large-device') != true) return;
    $(this).addClass('show');
  }).on('mouseleave', function() {
    if ($('body').hasClass('large-device') != true) return;
    $(this).removeClass('show');
  });
  
  $('[data-toggle="subnav"]').on('click', function(evt) {
    if ($('body').hasClass('large-device') == true) return;
    evt.preventDefault();
    evt.stopPropagation();
    
    $(this).parent().toggleClass('show');
  });
  
  $('.page-inner #page-content img').each(function (e) {
    var self = $(this);
    var parent = self.parent();
    
    if (typeof parent != 'undefined' && parent[0].localName.toLowerCase() == 'p') {
      var right = self[0].style['margin-right'];
      var left = self[0].style['margin-left'];
      var display = self[0].style['display'];
      
      if (left == 'auto' && right == 'auto' && (display == 'inline-block' || display == 'block')) {
        parent[0].style['text-align'] = 'center';
      }
    }
  });
  
  
  var radio_status;
  $('.button-play-radio').each(function () {
    var button_play_radio = $(this);
    
    button_play_radio.on('click', function (evt) {
      evt.preventDefault();
      evt.stopPropagation();
      
      var audio_parent = $(this).parent();
      var audio = button_play_radio.parent().find('audio');
      if (typeof audio != 'undefined') {
        audio_parent.toggleClass('played');
        if (audio_parent.hasClass('played')) {
          radio_status = 'played';
          audio[0].play();
        }
        if (!audio_parent.hasClass('played')) {
          radio_status = 'pause';
          audio[0].pause();
        }
      }
      
      audio[0].addEventListener('playing', function () {
        audio_parent.find('.button-off').removeClass('d-none');
        audio_parent.find('.button-on').addClass('d-none');
      });
      
      audio[0].addEventListener('pause', function () {
        audio_parent.find('.button-off').addClass('d-none');
        audio_parent.find('.button-on').removeClass('d-none');
      });
      
      $.ajax({
          method: 'get',
          url: audio.attr('data-radio-url') + radio_status,
          success: function (data) {
              if (typeof data != 'object') data = JSON.parse(data);
          }
      });
      
      return false;
    });
  });
  
  var is_radio_played = $('audio').attr('data-radio-played');
  if (typeof is_radio_played == 'undefined') is_radio_played = 0;
  if (is_radio_played == 1) $('.button-play-radio.button-on').click();
});
