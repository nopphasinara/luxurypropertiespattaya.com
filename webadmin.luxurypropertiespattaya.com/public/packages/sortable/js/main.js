// document.addEventListener('touchstart', handler, {capture: true});

// addEventListener(document, "touchstart", function(e) {
//   console.log(e.defaultPrevented);  // will be false
//   e.preventDefault();   // does nothing since the listener is passive
//   console.log(e.defaultPrevented);  // still false
// }, Modernizr.passiveeventlisteners ? {passive: true} : false);


// Test via a getter in the options object to see if the passive property is accessed
// var supportsPassive = false;
// try {
//   var opts = Object.defineProperty({}, 'passive', {
//     get: function() {
//       supportsPassive = true;
//     }
//   });
//   window.addEventListener("testPassive", null, opts);
//   window.removeEventListener("testPassive", null, opts);
// } catch (e) {}
//
// // Use our detect's results. passive applied if supported, capture will be false either way.
// elem.addEventListener('touchstart', fn, supportsPassive ? { passive: true } : false);
