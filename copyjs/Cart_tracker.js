var eurekaOption = {
    scope: 'eurekaTest',
    url: 'http://159.65.110.132:8181'
};
window.eurekaTracker || (window.eurekaTracker = {}),
    function () {
        function e(e) {
            for (eurekaTracker.initialize({ "Apache Eureka": eurekaOption }); n.length > 0;) {
                var r = n.shift(), t = r.shift();
                eurekaTracker[t] && eurekaTracker[t].apply(eurekaTracker, r)
            }
        } for (var n = [], r = ["trackSubmit", "trackClick", "trackLink", "trackForm", "initialize",
            "pageview", "identify", "reset", "group", "track", "ready", "alias",
            "debug", "page", "once", "off", "on", "personalize"],
            t = 0; t < r.length; t++) {
            var i = r[t];
            window.eurekaTracker[i] = function (e) {
                return function () {
                    var r = Array.prototype.slice.call(arguments);
                    return r.unshift(e), n.push(r), window.eurekaTracker
                }
            }(i)
        } eurekaTracker.load = function () {
            var n = document.createElement("script");
            n.type = "text/javascript",
                n.async = !0,
                n.src = "/js/eureka-tracker.min.js",
                n.addEventListener ? n.addEventListener("load", function (n) { "function" == typeof e && e(n) }, !1) : n.onreadystatechange = function () {
                    "complete" !== this.readyState && "loaded" !== this.readyState || e(window.event)
                };
            var r = document.getElementsByTagName("script")[0];
            r.parentNode.insertBefore(n, r)
        }, document.addEventListener("DOMContentLoaded", eurekaTracker.load), eurekaTracker.page()
    }();

eurekaTracker.ready(function () {
    console.log("Eureka context loaded - profile id : " + window.cxs.profileId + ", sessionId= " + window.cxs.sessionId);
});
eurekaTracker.page() // first call will be ignored as the initial page load is done in the initialize method

var session_id = /SESS\w*ID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;

eurekaTracker.track('Cart', {
    eventType: 'Cart',
    userId: session_id,
    categoryId: prod,
    eventTime: new Date().toISOString()
});