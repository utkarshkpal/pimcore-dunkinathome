function fbgo(n) {
    cardNumber=n;
    FB.init( {
        appId: appId, channelUrl: BASEURL+"/channel.html", status: !0, cookie: !0, xfbml: !0, version: "v2.0", debug_info: !0
    }
    );
    FB.getLoginStatus(function(n) {
        n.status==="connected"?uploadPhoto(): n.status==="not_authorized"?login(): login()
    }
    )
}

function login() {
    FB.login(function(n) {
        n.authResponse&&uploadPhoto()
    }
    , {
        scope: "publish_actions"
    }
    )
}

function setUserProfileURL() {
    FB.api("/me",
    function(n) {
        //userWallURL=n.link
        userWallURL = "https://www.facebook.com/"+n.id;
    }
    )
}

function uploadPhoto() {
    setUserProfileURL();
    dunkinSeasonal.facebookPosting();
    var n;
    n = BASEURL + cardNumber;
    //console.log(n);
    //n="http://www.dunkinathome.com/images/share/almondFront.jpg";
    FB.api("/me/photos",
    "post",
    {
        caption: $("#user-message").val(), url: n
    }
    ,
    function(n) {
        !n||n.error?console.log(n): dunkinSeasonal.facebookSuccess(userWallURL)
    }
    )
}

var cardNumber,
userWallURL="";
(function(n,
t) {
    var i,
    r="facebook-jssdk",
    u=n.getElementsByTagName("script")[0];
    n.getElementById(r)||(i=n.createElement("script"),
    i.id=r,
    i.async=!0,
    i.src="//connect.facebook.net/en_US/all"+(t?"/debug": "")+".js", u.parentNode.insertBefore(i, u))
}

)(document,
!1);
//# sourceMappingURL=fb.min.js.map