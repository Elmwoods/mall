/*! 2016 Baidu Inc. All Rights Reserved */
define("widget/backtop",["require"],function(require){var e=$(".widget-backtop"),t=$(".widget-tool-bar"),i=document.body,n=document.documentElement,r=Math.min(n.clientHeight,i.clientHeight);e.on("click",function(){$("html,body").animate({scrollTop:0},700)}),$(window).on("scroll",function(){if((document.documentElement.scrollTop||document.body.scrollTop)>(window.innerHeight||r)/2)t.fadeIn(200);else t.fadeOut(200)}).trigger("scroll")});