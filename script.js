//WHAPOW

// Production steps of ECMA-262, Edition 5, 15.4.4.18
// Reference: http://es5.github.io/#x15.4.4.18
if (!NodeList.prototype.forEach) {

  NodeList.prototype.forEach = function(callback/*, thisArg*/) {

    var T, k;

    if (this == null) {
      throw new TypeError('this is null or not defined');
    }

    // 1. Let O be the result of calling toObject() passing the
    // |this| value as the argument.
    var O = Object(this);

    // 2. Let lenValue be the result of calling the Get() internal
    // method of O with the argument "length".
    // 3. Let len be toUint32(lenValue).
    var len = O.length >>> 0;

    // 4. If isCallable(callback) is false, throw a TypeError exception.
    // See: http://es5.github.com/#x9.11
    if (typeof callback !== 'function') {
      throw new TypeError(callback + ' is not a function');
    }

    // 5. If thisArg was supplied, let T be thisArg; else let
    // T be undefined.
    if (arguments.length > 1) {
      T = arguments[1];
    }

    // 6. Let k be 0.
    k = 0;

    // 7. Repeat while k < len.
    while (k < len) {

      var kValue;

      // a. Let Pk be ToString(k).
      //    This is implicit for LHS operands of the in operator.
      // b. Let kPresent be the result of calling the HasProperty
      //    internal method of O with argument Pk.
      //    This step can be combined with c.
      // c. If kPresent is true, then
      if (k in O) {

        // i. Let kValue be the result of calling the Get internal
        // method of O with argument Pk.
        kValue = O[k];

        // ii. Call the Call internal method of callback with T as
        // the this value and argument list containing kValue, k, and O.
        callback.call(T, kValue, k, O);
      }
      // d. Increase k by 1.
      k++;
    }
    // 8. return undefined.
  };
}


// easing functions http://goo.gl/5HLl8
Math.easeInOutQuad = function (t, b, c, d) {
    t /= d/2;
    if (t < 1) {
        return c/2*t*t + b
    }
    t--;
    return -c/2 * (t*(t-2) - 1) + b;
};

Math.easeInCubic = function(t, b, c, d) {
    var tc = (t/=d)*t*t;
    return b+c*(tc);
};

Math.inOutQuintic = function(t, b, c, d) {
    var ts = (t/=d)*t,
    tc = ts*t;
    return b+c*(6*tc*ts + -15*ts*ts + 10*tc);
};

// requestAnimationFrame for Smart Animating http://goo.gl/sx5sts
var requestAnimFrame = (function(){
    return  window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function( callback ){ window.setTimeout(callback, 1000 / 60); };
})();

function scrollTo(to, callback, duration) {
    // because it's so fucking difficult to detect the scrolling element, just move them all
    function move(amount) {
        document.documentElement.scrollTop = amount;
        document.body.parentNode.scrollTop = amount;
        document.body.scrollTop = amount;
    }
    function position() {
        return document.documentElement.scrollTop || document.body.parentNode.scrollTop || document.body.scrollTop;
    }
    var start = position(),
        change = to - start,
        currentTime = 0,
        increment = 20;
    duration = (typeof(duration) === 'undefined') ? 500 : duration;
    var animateScroll = function() {
        // increment the time
        currentTime += increment;
        // find the value with the quadratic in-out easing function
        var val = Math.easeInOutQuad(currentTime, start, change, duration);
        // move the document.body
        move(val);
        // do the animation unless its over
        if (currentTime < duration) {
            requestAnimFrame(animateScroll);
        } else {
            if (callback && typeof(callback) === 'function') {
                // the animation is done so lets callback
                callback();
            }
        }
    };
    animateScroll();
}
//sets VARIATIONS variable
var FORM = document.querySelector("#w-buy-form");
var CONTAINER = document.querySelector("#w-product-purchase");

function updateSlider(value) {
    var slider = document.querySelector("#slider");
    if(value == undefined) {
        value = slider.value;
    }


    var boxSelected = document.querySelector(".w-box-size-selector[data-active]");
    var boxList = document.querySelectorAll(".w-box");
    var labelBanana = document.querySelector("span[data-dist-value-banana]");
    var labelPassion = document.querySelector("span[data-dist-value-passion]");

    if(boxSelected == undefined) {
        boxSelected = document.querySelector(".w-box");
    }

    var boxSize = boxSelected.getAttribute("data-size");

    var newLabelValue = Math.round( boxSize * (value / 100) * 0.5) / 0.5;
    var newFormValue =  parseInt(boxSize * 0.5 * (value / 100 - 0));

    labelBanana.innerHTML = (boxSize - newLabelValue) + "x";
    labelPassion.innerHTML = newLabelValue + "x";

    boxList.forEach(function(box) {
        box.setAttribute("data-dist", newLabelValue);
    });

    //update current dist on form
    FORM.setAttribute("data-selected-dist", newFormValue);

}

function updateButton(elem) {
    var newSize = elem.parentNode.getAttribute("data-size");
    var boxId = elem.parentNode.getAttribute("data-id");
    var boxList = document.querySelectorAll(".w-box");
    var buttonList = document.querySelectorAll(".w-box-size-selector");

    //update current id on form
    FORM.setAttribute("data-selected-id", boxId);

    if(!elem.parentNode.hasAttribute("data-active")) {
        buttonList.forEach(function(x) {
            x.removeAttribute("data-active");
            x.setAttribute("data-inactive", "");
        });

        elem.parentNode.setAttribute("data-active", "");
        elem.parentNode.removeAttribute("data-inactive");

        CONTAINER.setAttribute("data-state", 2);


        // box.setAttribute("data-size", newSize);
        updateSlider();

        scrollTo(getOffsetById("step-2") - (document.documentElement.clientHeight / 2), function() {}, 1000);
    }
}

function getOffsetById(id) {
    var elem = document.getElementById(id);
    return elem.getBoundingClientRect().top + window.scrollY - 40;
}

function initScrollHandler() {
    var buttonList = document.querySelectorAll("*[data-scroll-to]");

    buttonList.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            var id = button.getAttribute("data-scroll-to");
            var offsetTop = getOffsetById(id) - 100;
            scrollTo(offsetTop, function() {}, 1000);
        })
    });
}

function initFAQ() {
    var elemList = document.querySelectorAll("#w-faq > div > span");
    elemList.forEach(function(elem) {
        elem.addEventListener("click", function() {
            if(elem.parentNode.hasAttribute("data-active")) {
                elem.parentNode.removeAttribute("data-active");
            } else {
                elem.parentNode.setAttribute("data-active", "");
            }
        });
    });
}

function initSeaconHover() {
    var elemList = document.querySelectorAll(".w-content-box-seacon input");
    elemList.forEach(function(elem) {
        var seacon = elem.parentNode.parentNode;
        elem.addEventListener("mouseover", function(event) {
            seacon.classList.add("hover");
        });
        elem.addEventListener("mouseout", function(event) {
            seacon.classList.remove("hover");
        })
    })
}

function initPageState() {

    initPersonalizeText();
    initScrollHandler();
    initSeaconHover();
    initFAQ();
    // set all elements to the right state here
}

function updateProductVariation() {

}

function initPersonalizeText() {
    var observer = new MutationObserver(function(mutationList) {
        mutationList.forEach(function(mutation) {
            var elem = mutation.target.querySelector("[data-personalize-items]");
            if(elem != undefined) {
                var content = elem.getAttribute("data-personalize-items");
                var labelList = content.split("|");
                var r = parseInt(Math.random() * labelList.length);
                elem.innerHTML = labelList[r];
            }
        });
    });

    var targetList = document.querySelectorAll("[data-personalize]");

    targetList.forEach(function(target) {
        observer.observe(target, { attributes: true });
    });
}

function buy(event) {
        var id = FORM.getAttribute("data-selected-id");
        var dist = FORM.getAttribute("data-selected-dist");

        if(id != undefined && dist != undefined) {
            var distLabel = VARIATIONS[id][dist];

            FORM.querySelector("input[name=add-to-cart]").value = id;
            FORM.querySelector("input[name=product_id]").value = id;
            FORM.querySelector("input[name=attribute_aufteilung]").value = distLabel;

            console.log(id + ' ' + distLabel);
        } else {
            event.preventDefault();
        }
}

initPageState();

//typedscript



