
(function () {
  $(document).ready(function () {

    function getUserValues(editBtn) {
      var $thisParent = $(editBtn).parent().parent();
      var $thisId = $thisParent.find('.td-id').text()
      var $thisFirstName = $thisParent.find('.td-firstName').text()
      var $thisLastName = $thisParent.find('.td-lastName').text()
      var $thisEmail = $thisParent.find('.td-email').text()
      var $thisRole = $thisParent.find('.td-role').text()

      return {
        id: $thisId,
        firstName: $thisFirstName,
        lastName: $thisLastName,
        email: $thisEmail,
        role: $thisRole
      }

    }

    function getProductValues(editBtn) {
      var $thisParent = $(editBtn).parent().parent();
      var $thisId = $thisParent.find('.td-id').text()
      var $thisName = $thisParent.find('.td-name').text()
      var $thisDesc = $thisParent.find('.td-desc').text()
      var $thisPrice = $thisParent.find('.td-price').text()

      return {
        id: $thisId,
        name: $thisName,
        desc: $thisDesc,
        price: $thisPrice
      }

    }

    $('.eUserButton').click(function (e) {
      e.preventDefault();
      toggleEUsers(getUserValues(this).firstName, getUserValues(this).lastName, getUserValues(this).email, getUserValues(this).id, getUserValues(this).role);
    })

    $('#cProduct').click(function () {
      toggleCProducts();
    })

    $('#closeButton').click(function () {
      toggleCProducts();
    })

    $('.eProductButton').click(function (e) {
      e.preventDefault();
      toggleEProducts(getProductValues(this).name, getProductValues(this).desc, getProductValues(this).price, getProductValues(this).id);
    })

    var eUserWindow = document.getElementById("eUserWindow");
    var cProductWindow = document.getElementById("cProductWindow");
    var eProductWindow = document.getElementById("eProductWindow");

    function toggleCProducts() {

      cProductWindow.classList.toggle("visible");
      cProductWindow.classList.toggle("hidden");
    }

    function toggleEUsers(firstName, lastName, email, id, role) {

      $('.eUserId')['0'].value = id;
      $('.eUserFirstName')['0'].value = firstName;
      $('.eUserLastName')['0'].value = lastName;
      $('.eUserEmail')['0'].value = email;

      if (role == "Admin") {

        $('.eUserRole')['0'].checked = true;
      } else {

        $('.eUserRole')['0'].checked = false;
      }

      console.log($('.eUserFirstName')['0'].value);
      console.log($('.eUserLastName')['0'].value);

      eUserWindow.classList.toggle("hidden");
      eUserWindow.classList.toggle("visible");
    }

    function toggleEProducts(name, desc, price, id) {

      price = price.substring(0, price.length - 1);

      $('.eProductId')['0'].value = id;
      $('.eProductName')['0'].value = name;
      $('.eProductDesc')['0'].value = desc;
      $('.eProductPrice')['0'].value = price;

      eProductWindow.classList.toggle("hidden");
      eProductWindow.classList.toggle("visible");
    }

    window.onscroll = function () { scrollFunction() };

    let url = window.location.href.split("?");

    function scrollFunction() {
      if (url[0] != "http://localhost/MyFitHabit/menu.php") {

        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.querySelector("header").style.opacity = 0;
        } else {
          document.querySelector("header").style.opacity = 70 + "%";
        }
      }
    }

    $('.sidebarToggle').click(function () {
      sidebarToggle();
    })

    function sidebarToggle() {

      $('.sidebar').toggleClass('hideSidebar');
    }

    $('.burgerToggle').click(function () {
      burgerToggle();
    })

    function burgerToggle() {

      $('.burgerList').toggleClass('showBurger');
    }

    $('.burgerMiniToggle').click(function () {
      burgerMiniToggle();
    })

    function burgerMiniToggle() {

      $('.burgerMiniList').toggleClass('showBurger');
    }


    $('#sliderLeft').click(function () {
      sliderLeft();
    })

    $('#sliderRight').click(function () {
      sliderRight();
    })

    var x = 0;
    var xCount = 0;

    function sliderLeft() {
      console.log("hello");
      x = document.getElementById("slider").scrollLeft;

      xCount--;

      if (x <= 350) {
        xCount = 0;
      } else if (x <= 700) {
        xCount = 1;
      } else {
        xCount = 2;
      }

      console.log(x);
      console.log(xCount);

      document.getElementById("slider").scrollLeft -= (x - (xCount * 350));
    }

    function sliderRight() {
      x = document.getElementById("slider").scrollLeft;

      if (x < 350) {
        xCount = 1;
      } else if (x < 700) {
        xCount = 2;
      } else {
        xCount = 3;
      }

      console.log(x);
      console.log(xCount);

      document.getElementById("slider").scrollLeft += ((xCount * 350) - x);
    }
  });
}())
