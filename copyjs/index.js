
//var url = 'http://localhost:8000';
//fetch('http://127.0.0.1:8000/')
//    .then(res => res.json())
//   .then(data => { console.log(data) })
//    .catch((error) => { console.log(error); });

var sessionId = /SESS\w*ID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;

const options = {
    listeners: {
        onInit: ({helpers, context}) => {
            const btn0 = document.querySelector('#button')
            if(!btn0)  {
                return;
            }
            helpers.onClick(btn0, async (event)=> {
                // Send event to tracardi
                console.log(event);
                
                        const response = await helpers.track('Cart', {
                            userId: sessionId,
                            prodKey: event.target.prodKey
                        });
                    

        
                if(response) {
                    const responseToCustomEvent = document.getElementById('response-to-custom-event');
                    responseToCustomEvent.innerText = JSON.stringify(response.data, null, " ");
                    responseToCustomEvent.style.display = "block"
                }
            });
        }
    },
    
    tracker: {
        url: {
            // This is url to tracardi backend. Please mind the correct port.A
            script: 'http://159.65.110.132:8686/tracker',
            api: 'http://159.65.110.132:8686'
        },
        source: {
            id: "36661083-7e0e-4caa-9894-8eae928a644b"
        }
    }
}

!function(e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define([],e):("undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this).tracardi=e()}(function(){return function n(o,i,a){function c(t,e){if(!i[t]){if(!o[t]){var r="function"==typeof require&&require;if(!e&&r)return r(t,!0);if(d)return d(t,!0);throw(r=new Error("Cannot find module '"+t+"'")).code="MODULE_NOT_FOUND",r}r=i[t]={exports:{}},o[t][0].call(r.exports,function(e){return c(o[t][1][e]||e)},r,r.exports,n,o,i,a)}return i[t].exports}for(var d="function"==typeof require&&require,e=0;e<a.length;e++)c(a[e]);return c}({1:[function(e,t,r){"use strict";!function(e){e=e||window;var r=[],n=!1,o=!1;function i(){if(!n){n=!0;for(var e=0;e<r.length;e++)r[e].fn.call(window,r[e].ctx);r=[]}}function a(){"complete"===document.readyState&&i()}e.documentReady=function(e,t){if("function"!=typeof e)throw new TypeError("callback for documentReady(fn) must be a function");n?setTimeout(function(){e(t)},1):(r.push({fn:e,ctx:t}),"complete"===document.readyState||!document.attachEvent&&"interactive"===document.readyState?setTimeout(i,1):o||(document.addEventListener?(document.addEventListener("DOMContentLoaded",i,!1),window.addEventListener("load",i,!1)):(document.attachEvent("onreadystatechange",a),window.attachEvent("onload",i)),o=!0))}}(window),window.tracker||(window.tracker={}),window.response||(window.response={context:{}}),function(){for(var r=[],n="liliput.min.js",e=["track"],t=0;t<e.length;t++){var o=e[t];window.tracker[o]=function(t){return function(){var e=Array.prototype.slice.call(arguments);return e.unshift(t),r.push(e),window.tracker}}(o)}function i(){if(console.debug("[Tracker] Rerun callbacks."),void 0!==window.tracardi.default)if(window.tracardi.default.getState().plugins.tracardi.initialized)for(window.tracker=window.tracardi.default;0<r.length;){var e=r.shift(),t=e.shift();tracker[t]&&tracker[t].apply(tracker,e)}else console.error("[Tracardi] Callbacks stopped. Tracker not initialized.");else console.error("[Tracardi] Callbacks stopped. Tracker not initialized. Is script url correct?")}documentReady(function(){var e,t=document.createElement("script");t.type="text/javascript",t.async=!0,void 0!==options.tracker||void 0!==options.tracker.url||void 0!==options.tracker.url.script?(null!==options.tracker.url.script?options.tracker.url.script.startsWith("http")||options.tracker.url.script.startsWith("//")?t.src=options.tracker.url.script+"/"+n:t.src=options.tracker.url.script:t.src=n,console.debug("[Tracker] Loading: "+t.src),t.addEventListener?t.addEventListener("load",function(e){i()},!1):t.onreadystatechange=function(){"complete"!==this.readyState&&"loaded"!==this.readyState||i(window.event)},(e=document.getElementsByTagName("script")[0]).parentNode.insertBefore(t,e)):console.error("[Tracker] Undefined options.tracker.url.script. This url defines location of tracker code.")})}()},{}]},{},[1])(1)});
