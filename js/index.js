
//var url = 'http://localhost:8000';
//fetch('http://127.0.0.1:8000/')
//    .then(res => res.json())
//   .then(data => { console.log(data) })
//    .catch((error) => { console.log(error); });

var sessionId = /SESS\w*ID=([^;]+)/i.test(document.cookie) ? RegExp.$1 : false;

console.log("AAsd");

!function(t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define([],t):("undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this).tracardi=t()}(function(){return function n(o,i,a){function c(e,t){if(!i[e]){if(!o[e]){var r="function"==typeof require&&require;if(!t&&r)return r(e,!0);if(d)return d(e,!0);throw(r=new Error("Cannot find module '"+e+"'")).code="MODULE_NOT_FOUND",r}r=i[e]={exports:{}},o[e][0].call(r.exports,function(t){return c(o[e][1][t]||t)},r,r.exports,n,o,i,a)}return i[e].exports}for(var d="function"==typeof require&&require,t=0;t<a.length;t++)c(a[t]);return c}({1:[function(t,e,r){"use strict";!function(t){t=t||window;var r=[],n=!1,o=!1;function i(){if(!n){n=!0;for(var t=0;t<r.length;t++)r[t].fn.call(window,r[t].ctx);r=[]}}function a(){"complete"===document.readyState&&i()}t.documentReady=function(t,e){if("function"!=typeof t)throw new TypeError("callback for documentReady(fn) must be a function");n?setTimeout(function(){t(e)},1):(r.push({fn:t,ctx:e}),"complete"===document.readyState||!document.attachEvent&&"interactive"===document.readyState?setTimeout(i,1):o||(document.addEventListener?(document.addEventListener("DOMContentLoaded",i,!1),window.addEventListener("load",i,!1)):(document.attachEvent("onreadystatechange",a),window.attachEvent("onload",i)),o=!0))}}(window);var n=[];window.tracker||(window.tracker={}),window.response||(window.response={context:{}}),window.onTracardiReady={bind:function(t){"function"==typeof t&&n.push(t)},call:function(e){n.forEach(function(t){t(e)})}},function(){for(var r=[],n="liliput.min.js",t=["track"],e=0;e<t.length;e++){var o=t[e];window.tracker[o]=function(e){return function(){var t=Array.prototype.slice.call(arguments);return t.unshift(e),r.push(t),window.tracker}}(o)}function i(){if(console.debug("[Tracker] Rerun callbacks."),void 0!==window.tracardi.default)if(window.tracardi.default.getState().plugins.tracardi.initialized)for(window.tracker=window.tracardi.default;0<r.length;){var t=r.shift(),e=t.shift();tracker[e]&&tracker[e].apply(tracker,t)}else console.error("[Tracardi] Callbacks stopped. Tracker not initialized.");else console.error("[Tracardi] Callbacks stopped. Tracker not initialized. Is script url correct?")}documentReady(function(){var t,e,r;"1"!==navigator.doNotTrack||!0!==(null===(t=options)||void 0===t||null===(e=t.tracker)||void 0===e||null===(r=e.settings)||void 0===r?void 0:r.respectDoNotTrack)?((e=document.createElement("script")).type="text/javascript",e.async=!0,void 0!==options.tracker||void 0!==options.tracker.url||void 0!==options.tracker.url.script?(null!==options.tracker.url.script?options.tracker.url.script.startsWith("http")||options.tracker.url.script.startsWith("//")?e.src=options.tracker.url.script+"/"+n:e.src=options.tracker.url.script:e.src=n,console.debug("[Tracker] Loading: "+e.src),e.addEventListener?e.addEventListener("load",function(t){i()},!1):e.onreadystatechange=function(){"complete"!==this.readyState&&"loaded"!==this.readyState||i(window.event)},(r=document.getElementsByTagName("script")[0]).parentNode.insertBefore(e,r)):console.error("[Tracker] Undefined options.tracker.url.script. This url defines location of tracker code.")):console.log("We are respecting do not track setting. Tracardi disabled.")})}()},{}]},{},[1])(1)});

var options = {
	tracker: {
		url: {
			// This is url to tracardi backend. Please mind the correct port.
			script: 'http://138.68.123.157:8686/tracker',
			api: 'http://138.68.123.157:8686'
		},
		source: {
			id: "51770bc5-d602-4815-b8d9-55e3444c0cc0"
		}
		// Please see the documentation for more settings: http://docs.tracardi.com/integration/js-integration/
	}
}
