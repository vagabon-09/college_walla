$(document).ready(function () {
    // $('.nav_btn').click(function () {
    //         $('.mobile_nav_items').toggleClass('active', function () {
    //             $('.mobile_nav_items').slideDown('200');
    //         });      
    // });
    $('.nav_btn').click(function () {
        $('.mobile_nav_items').slideToggle('fast');
    });


});


/*
logut allert hover effect 
$(".logut-alert").hide();

$(document).ready(function () {


    $(".logout_btn").hover(function () {
        $('.logut-alert').show(200);
    }, function () {
        $('.logut-alert').hide(1000);
    });

})
*/

//Draggable search Button
// $(document).ready(function () {
//     $(".draggable-search").draggable();
// })

// Floating top button 
if ($(window).height() > $("body").height()) {
    $("footer").css("position", "fixed");
} else {
    $("footer").css("position", "static");
}


//  toggle class for search button
$('#search').click(function () {
    $('.modal-search').slideToggle().toggleClass('display-none-modal-search');
});

//toggle class for modal
$('.login').click(function () {
    $('.popup').fadeToggle("fast", function () {
        $(this).toggleClass('toggle-popup')
    });
});
//toggle class for modal-success
$('.close_btn').click(function () {
    document.getElementById("success").style.display = "none";
});



//slidebar
var slideimg = document.getElementById("slideimg");
var images = new Array(
    "/img/collage-1.jpg",
    "/img/college-2.jpg",
    "/img/college-3.jpg"
);

var len = images.length;
var i = 0;
function slider() {
    if (i > len - 1) {
        i = 0
    }
    slideimg.src = images[i];
    i++;
    setTimeout('slider()', 3000)
}


//auto typing text animetion
var TxtType = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function () {
        that.tick();
    }, delta);
};

window.onload = function () {
    var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
    document.body.appendChild(css);
};

$(document).ready(function () {
    $('.mobile_nav a').animate({
        transtion: '0.5s'
    })
})

$(window).scroll({
    behavior: 'smooth'
})

var x = document.getElementById("Login")
var y = document.getElementById("Register")
var z = document.getElementById("btn")

function Register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";

}
function Login() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
}

