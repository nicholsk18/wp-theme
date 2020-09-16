$(document).ready(function () {
    let boxSize = $('#schedule').height();
    let buttonPadding = 79;
    let initHeight = ($('#schedule .calendar-box').height() * 4) + buttonPadding;
    let addHeight = initHeight;

    $('#schedule').css({"height": initHeight})

    $('#view-more').click(function () {
        addHeight += initHeight;
        if (addHeight <= boxSize) {
            console.log(addHeight)
            $('#schedule').animate({height: addHeight});
            let upDown = (addHeight + initHeight >= boxSize) ? "View Less" : "View More"
            $('#view-more').text(upDown);
        }

        if (addHeight >= boxSize) {
            addHeight = initHeight;
            $('#schedule').animate({height: addHeight});
            $('#view-more').text("View More");
        }


    })

    // $('#schedule .calendar-box:lt('+initShow+')').show().animate({opacity: '100'});
    // $('#view-more').click(function () {
    //     initShow = (initShow + 4 <= boxSize) ? initShow + 4 : boxSize;
    //     $('#schedule .calendar-box:lt('+initShow+')').show().animate({opacity: '100'});
    // });

    console.log(boxSize)
})

// 70