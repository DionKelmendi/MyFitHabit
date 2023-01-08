
 var x = 0;

  window.onscroll = function () { scrollFunction() };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.querySelector("header").style.opacity = 0;
    } else {
      document.querySelector("header").style.opacity = 70 + "%";
    }
  }

  function sliderLeft() {

    var slider = document.querySelector("#slider");
    var sliderCount = document.querySelector("#slider").children.length;
    var sliderItems = document.querySelectorAll("#sliderItem")

    if (x < 0) {

      x += 350;
    }

    sliderItems.forEach(si => {

      si.style.transform = "translateX(" + x + "px)";

    });

    // console.log("Going Left")
    // console.log(x)
    // console.log(sliderCount)
  }

  function sliderRight() {

    var slider = document.querySelector("#slider");
    var sliderCount = document.querySelector("#slider").children.length;
    var sliderItems = document.querySelectorAll("#sliderItem")

    // console.log(sliderItems);

    if (x > ((sliderCount - 3) * -350)) {

      x -= 350;
    }

    sliderItems.forEach(si => {

      si.style.transform = "translateX(" + x + "px)";

    });

    // console.log("Going Right")
    // console.log(x)
    // console.log(sliderCount)
  }
