
jQuery(document).ready(function() {

  var colors = ["#FFE800", "#FFA361", "#fff", "#E2D100", "#fff", "#743700"]
  var backgrounds = ["#fff", "#fff", "#FBF4A7", "#fff", "#FBF4A7", "#fff"]
  
  console.log("test")
  var typed = new Typed('.w-typed-title', {
    stringsElement: "#typed-strings",
    typeSpeed: 100,
    showCursor: false,
    loop: true,
    preStringTyped: function(arrayPos, typed) {
      if(arrayPos < colors.length && arrayPos < backgrounds.length) {
        jQuery(typed.el).css({
          "color": colors[arrayPos],
          "background-color": backgrounds[arrayPos]
        })
      }
    }
  });

});

