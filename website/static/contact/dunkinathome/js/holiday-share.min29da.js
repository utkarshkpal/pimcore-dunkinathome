var DunkinSeasonal = function() {
        function ht() {
            if (at(), ot.click(function() {
                    o()
                }), g = $("#home-container .rotator-panel"), f = $("#home-container #rotator-nav li"), a = f.length, v = 3e4, a > 0) {
            	p();
                f.on("click", function(n) {
                    n.preventDefault();
                    var t = $(this),
                        i = t.data("label");
                    it(t);
                    _gaq.push(["_trackEvent", i, "Click", i])
                })
            }
        }

        function ct() {
            var n = f.filter(".active").index() + 1;
            n >= a && (n = 0);
            it(f.eq(n))
        }

        function it(n) {
            var t, i = 0;
            n.hasClass("active") || (t = n.data("name"), f.removeClass("active"), n.addClass("active"), g.removeClass("active"), $("#" + t).addClass("active"), i = n.index(), v = i === 0 ? 3e4 : 1e4, p())
        }

        function lt() {
            clearInterval(y)
        }

        function p() {
            clearInterval(y);
            y = setInterval(ct, v)
        }

        function at() {
            (new Image).src = "/website/static/dunkinathome/images/home/seasonals-bg.jpg";
            (new Image).src = "/website/static/dunkinathome/images/home/bakery-series-bg.jpg";
            (new Image).src = "/website/static/dunkinathome/images/share/backText.png";
            (new Image).src = "/website/static/dunkinathome/images/share/closeButton.png";
            (new Image).src = "/website/static/dunkinathome/images/share/facebookPost.png";
            (new Image).src = "/website/static/dunkinathome/images/share/facebookPosting.png";
            (new Image).src = "/website/static/dunkinathome/images/share/facebookStamp.png";
            (new Image).src = "/website/static/dunkinathome/images/share/facebookSuccess.png";
            (new Image).src = "/website/static/dunkinathome/images/share/postcardbg.png";
            (new Image).src = "/website/static/dunkinathome/images/share/tweetButton.png";
            (new Image).src = "/website/static/dunkinathome/images/share/verticalDivider.png";
            (new Image).src = "/website/static/dunkinathome/images/share/seasonalsFront.jpg";
            (new Image).src = "/website/static/dunkinathome/images/share/seasonalsBack.png";
            (new Image).src = "/website/static/dunkinathome/images/share/seasonalsBackText.png";
            (new Image).src = "/website/static/dunkinathome/images/share/bakeryFront.png";
            (new Image).src = "/website/static/dunkinathome/images/share/bakeryBack.png";
            (new Image).src = "/website/static/dunkinathome/images/share/bakeryBackText.png"
        }

        function rt(n) {
            var t;
            switch (n) {
                case 1:
                    t = "ToastedAlmond";
                    break;
                case 2:
                    t = "PeachCobbler";
                    break;
                case 3:
                    t = "Coconut";
                    break;
                case 4:
                    t = "BlueberryMuffin_13";
                    break;
                case 5:
                    t = "OldFashioned_13";
                    break;
                case 6:
                    t = "ChocolateGlazed_13";
                    break;
                case 7:
                    t = "CaramelCoffee_13";
                    break;
                case 8:
                    t = "JellyDonut_13";
                    break;
                case 9:
                    t = "Seasonals";
                    break;
                case 10:
                    t = "Bakery Series";
                    break;
                case 11:
                    t = "KCups"
            }
        }

        function ut() {
            s.css("display", "block")
        }

        function ft() {
            r.addClass("flip")
        }

        function et(n, t) {
            var i;
            e = n;
            lt();
            pt(n);
            t === "fb" ? (i = "/website/static/dunkinathome/images/share/facebookStamp.png", k.css("display", "none"), h.css("display", "block")) : t === "twitter" && (i = "/website/static/dunkinathome/images/share/twitterStamp.png", k.css("display", "block"), h.css("display", "none"));
            c.css("display", "none");
            b.css("display", "none");
            st.css("background", "url(" + i + ")");
            s.css("display", "none");
            u.css("display", "block");
            r.removeClass("scaledown");
            r.addClass("scaleup");
            nt ? (setTimeout(ut, 200), l = setTimeout(ft, 1e3)) : (ut(), ft())
            setTimeout(function() {
               $("#postcard-image").css("transform", "rotate(355deg)");
            }, 1300);
            
        }

        function vt(n) {
            et(n, "twitter")
        }

        function yt(n) {
            et(n, "fb")
        }

        function pt(r) {
            n.css("background", "url("+r['front']+")");
            n.addClass("postcard-seasonal");
            //t.css("background", "url("+r['back']+")");
            t.attr("src", r['back']);
            i.attr("src", r['text']);
            fbimg = r['front'];
            //r === 1 ? (n.css("background", "url(/website/static/dunkinathome/images/share/almondFront.jpg)"), n.addClass("postcard-seasonal"), t.css("background", "url(/website/static/dunkinathome/images/share/almondBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/almondTextBack.png")) : r === 2 ? (n.css("background", "url(/website/static/dunkinathome/images/share/peachFront.jpg)"), n.addClass("postcard-seasonal"), t.css("background", "url(/website/static/dunkinathome/images/share/peachBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/peachBackText.png")) : r === 3 ? (n.css("background", "url(/website/static/dunkinathome/images/share/coconutFront.jpg)"), n.addClass("postcard-seasonal"), t.css("background", "url(/website/static/dunkinathome/images/share/coconutBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/coconutBackText.png")) : r === 4 ? (n.css("background", "url(/website/static/dunkinathome/images/share/blueberryFront.png)"), t.css("background", "url(/website/static/dunkinathome/images/share/blueberryBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/blueberryBackText.png")) : r === 5 ? (n.css("background", "url(/website/static/dunkinathome/images/share/oldfashionedFront.png)"), t.css("background", "url(/website/static/dunkinathome/images/share/oldfashionedBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/oldfashionedBackText.png")) : r === 6 ? (n.css("background", "url(/website/static/dunkinathome/images/share/chocolateFront.png)"), t.css("background", "url(/website/static/dunkinathome/images/share/chocolateBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/chocolateBackText.png")) : r === 7 ? (n.css("background", "url(/website/static/dunkinathome/images/share/caramelFront.png)"), t.css("background", "url(/website/static/dunkinathome/images/share/caramelBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/caramelBackText.png")) : r === 8 ? (n.css("background", "url(/website/static/dunkinathome/images/share/jellyFront.png)"), t.css("background", "url(/website/static/dunkinathome/images/share/jellyBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/jellyBackText.png")) : r === 9 ? (n.css("background", "url(/website/static/dunkinathome/images/share/seasonalsFront.jpg)"), n.addClass("postcard-seasonal"), t.css("background", "url(/website/static/dunkinathome/images/share/seasonalsBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/seasonalsBackText.png")) : r === 10 ? (n.css("background", "url(/website/static/dunkinathome/images/share/bakeryFront.png)"), n.addClass("postcard-bakery"), t.css("background", "url(/website/static/dunkinathome/images/share/bakeryBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/bakeryBackText.png")) : r === 11 && (n.css("background", "url(/website/static/dunkinathome/images/share/kcupsFront.jpg)"), n.addClass("postcard-seasonal"), t.css("background", "url(/website/static/dunkinathome/images/share/kcupsBack.png)"), i.attr("src", "/website/static/dunkinathome/images/share/kcupsBackText.png"))
        }

        function o() {
            //t.css("transform", "");
            setTimeout(function() {
               t.css("transform", "");
            }, 100);
            u.hasClass("closing") || (r.hasClass("flip") ? (u.addClass("closing"), r.removeClass("flip"), r.removeClass("scaleup"), clearTimeout(l), nt ? (setTimeout(wt, 800), setTimeout(w, 1200)) : w()) : (u.addClass("closing"), clearTimeout(l), w()))
        }

        function wt() {
            s.css("display", "none");
            r.addClass("scaledown")
        }

        function w() {
            u.css("display", "none");
            u.removeClass("closing");
            n.removeClass("postcard-seasonal");
            p()
        }

        function bt() {
            h.css("display", "none");
            c.css("display", "block")
        }

        function kt(n) {
            tt = n;
            c.css("display", "none");
            b.css("display", "block")
        }

        function dt() {
            window.open(tt, "_blank");
            o()
        }

        function gt() {
            var n = rt(e);
            e = fbimg;
            _gaq.push(["_trackEvent", "Share_Intent_Facebook", "Click", n]);
            fbgo(e)
        }

        function ni() {
            var n = rt(e);
            _gaq.push(["_trackEvent", "Share_Action_Twitter", "Click", n]);
            window.open("http://twitter.com/home?status=" + encodeURIComponent(d.val()), "_blank");
            o()
        }
        var ti = $(window),
            ii = $("#close-button"),
            u = $("#panel-container"),
            ot = $("#panel-background"),
            s = $("#back"),
            r = $(".panel"),
            h = $("#facebook-post"),
            c = $("#facebook-posting"),
            b = $("#facebook-success"),
            k = $("#tweet-button"),
            d = $("#user-message"),
            n = $("#front"),
            t = $("#postcard-image"),
            st = $("#stamp"),
            i = $("#back-text"),
            g, f, e = 0,
            nt = Modernizr.csstransforms3d,
            tt, l, a, v, y, fbimg;
        return ht(), {
            twitterShare: vt,
            facebookShare: yt,
            facebookPosting: bt,
            facebookSuccess: kt,
            closeCard: o,
            tweet: ni,
            facebookClick: gt,
            facebookSuccessClickHandler: dt
        }
    },
    dunkinSeasonal;
$(function() {
    dunkinSeasonal = new DunkinSeasonal
});
//# sourceMappingURL=holiday-share.min.js.map