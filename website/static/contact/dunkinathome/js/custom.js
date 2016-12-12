$(document).ready(function() {
    
    // CODE FOR ACCORDIAN FAQ PAGE
    $(document).on("click", '.accordian-heading, .accordian-container .title', function() {
        $(this).toggleClass("active");
        var e = $(this).next();
        if(e.hasClass('show')) {
            e.removeClass('show').addClass('hide').hide();
            if($(this).hasClass('title')) {
                $(this).removeClass('active');
            }
        } else {
            e.removeClass('hide').addClass('show').show();
            if($(this).hasClass('title')) {
                $(this).addClass('active');
            }
        }
    });
    
    $(".productSearch").on("click", function() {
        var v = $(".productZip").val();
        if(isNaN(v) || v.length != 5) {
            alert('Please enter valid 5 digit Zip code');
            return false;
        }
    });
    
    $(".storeSearch").on("click", function() {
        var v = $(".storeZip").val();
        if($("#productUPC").val() == '') {
            alert('Please select product');
            return false;
        }
        if(isNaN(v) || v.length != 5) {
            alert('Please enter valid 5 digit Zip code');
            return false;
        }
    });
    
});

function sampleEmailPopup() {
    window.open("/sign-up/sample-email", "sampleEmail", "left=50,top=50,width=675,height=650,scrollbars=0,location=0");
    return false;
}
