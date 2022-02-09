// place any jQuery/helper plugins in here, instead of separate, slower script files.

// Responsive Menu by Matt Kersley https://github.com/mattkersley/Responsive-Menu
(function(a){function q(){if(i()&&!g()){if(b.combine){var d=m();p(d)}else{c.each(function(){p(a(this))})}}if(i()&&g()){a(".mnav").show();c.hide()}if(!i()&&g()){a(".mnav").hide();c.show()}}function p(c){var e=a('<select id="mm'+d+'" class="mnav" />');d++;if(b.topOptionText){n(a("<li>"+b.topOptionText+"</li>"),e)}c.children("li").each(function(){var c=a(this);if(c.children("ul, ol").length&&b.nested){o(c,e)}else{n(c,e)}});e.change(function(){f(a(this).val())}).prependTo(b.prependTo)}function o(b,c){var d=a('<optgroup label="'+a.trim(j(b))+'" />');n(b,d,a.trim(j(b)));b.children("ul, ol").each(function(){a(this).children("li").each(function(){n(a(this),d)})});d.appendTo(c)}function n(b,c,d){if(!d){a('<option value="'+b.find("a:first").attr("href")+'">'+a.trim(j(b))+"</option>").appendTo(c)}else{a('<option value="'+b.find("a:first").attr("href")+'">'+d+"</option>").appendTo(c)}}function m(){var b=a('<ul id="mmnav" />');c.each(function(){a(this).children().clone().appendTo(b)});l(b);return b}function l(b){b.find(" > li").each(function(){var c=a(this),d=c.find("a").attr("href"),f=function(){if(c.parent().parent().is("li")){return c.parent().parent().find("a").attr("href")}else{return null}};if(c.find(" ul, ol").length){l(c.find("> ul, > ol"))}if(!c.find(" > ul li, > ol li").length){c.find("ul, ol").remove()}if(!k(f(),e)&&k(d,e)){c.appendTo(b.closest("ul#mmnav").find("li:has(a[href="+f()+"]):first ul"))}else if(k(d)){e.push(d)}else{c.remove()}})}function k(b){return a.inArray(b,e)===-1?true:false}function j(b){return a.trim(b.clone().children("ul, ol").remove().end().text())}function i(){return a(window).width()<b.switchWidth}function h(b){var c=true;b.each(function(){if(!a(this).is("ul")&&!a(this).is("ol")){c=false}});return c}function g(){return a(".mnav").length?true:false}function f(a){document.location.href=a}var b={combine:true,groupPageText:"Main",nested:true,prependTo:"body",switchWidth:720,topOptionText:"Select a page"},c,d=0,e=[];a.fn.mobileMenu=function(d){if(d){a.extend(b,d)}if(h(a(this))){c=a(this);q();a(window).resize(function(){q()})}else{alert("mobileMenu only works with <ul>/<ol>")}}})(jQuery);

/**
* hoverIntent r6 // 2011.02.26 // jQuery 1.5.1+
* <http://cherne.net/brian/resources/jquery.hoverIntent.html>
* 
* @param  f  onMouseOver function || An object with configuration options
* @param  g  onMouseOut function  || Nothing (use configuration options object)
* @author    Brian Cherne brian(at)cherne(dot)net
*/
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type=="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover)}})(jQuery);

/*
 * Superfish v1.4.8 - jQuery menu widget
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 * CHANGELOG: http://users.tpg.com.au/j_birch/plugins/superfish/changelog.txt
 */

;(function($){$.fn.superfish=function(op){var sf=$.fn.superfish,c=sf.c,$arrow=$(['<span class="',c.arrowClass,'"></span>'].join('')),over=function(){var $$=$(this),menu=getMenu($$);clearTimeout(menu.sfTimer);$$.showSuperfishUl().siblings().hideSuperfishUl()},out=function(){var $$=$(this),menu=getMenu($$),o=sf.op;clearTimeout(menu.sfTimer);menu.sfTimer=setTimeout(function(){o.retainPath=($.inArray($$[0],o.$path)>-1);$$.hideSuperfishUl();if(o.$path.length&&$$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path)}},o.delay)},getMenu=function($menu){var menu=$menu.parents(['ul.',c.menuClass,':first'].join(''))[0];sf.op=sf.o[menu.serial];return menu},addArrow=function($a){$a.addClass(c.anchorClass).append($arrow.clone())};return this.each(function(){var s=this.serial=sf.o.length;var o=$.extend({},sf.defaults,op);o.$path=$('li.'+o.pathClass,this).slice(0,o.pathLevels).each(function(){$(this).addClass([o.hoverClass,c.bcClass].join(' ')).filter('li:has(ul)').removeClass(o.pathClass)});sf.o[s]=sf.op=o;$('li:has(ul)',this)[($.fn.hoverIntent&&!o.disableHI)?'hoverIntent':'hover'](over,out).each(function(){if(o.autoArrows)addArrow($('>a:first-child',this))}).not('.'+c.bcClass).hideSuperfishUl();var $a=$('a',this);$a.each(function(i){var $li=$a.eq(i).parents('li');$a.eq(i).focus(function(){over.call($li)}).blur(function(){out.call($li)})});o.onInit.call(this)}).each(function(){var menuClasses=[c.menuClass];if(sf.op.dropShadows&&!($.browser.msie&&$.browser.version<7))menuClasses.push(c.shadowClass);$(this).addClass(menuClasses.join(' '))})};var sf=$.fn.superfish;sf.o=[];sf.op={};sf.IE7fix=function(){var o=sf.op;if($.browser.msie&&$.browser.version>6&&o.dropShadows&&o.animation.opacity!=undefined)this.toggleClass(sf.c.shadowClass+'-off')};sf.c={bcClass:'sf-breadcrumb',menuClass:'sf-js-enabled',anchorClass:'sf-with-ul',arrowClass:'sf-sub-indicator',shadowClass:'sf-shadow'};sf.defaults={hoverClass:'sfHover',pathClass:'overideThisToUse',pathLevels:1,delay:800,animation:{opacity:'show'},speed:'normal',autoArrows:true,dropShadows:true,disableHI:false,onInit:function(){},onBeforeShow:function(){},onShow:function(){},onHide:function(){}};$.fn.extend({hideSuperfishUl:function(){var o=sf.op,not=(o.retainPath===true)?o.$path:'';o.retainPath=false;var $ul=$(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass).find('>ul').hide().css('visibility','hidden');o.onHide.call($ul);return this},showSuperfishUl:function(){var o=sf.op,sh=sf.c.shadowClass+'-off',$ul=this.addClass(o.hoverClass).find('>ul:hidden').css('visibility','visible');sf.IE7fix.call($ul);o.onBeforeShow.call($ul);$ul.animate(o.animation,o.speed,function(){sf.IE7fix.call($ul);o.onShow.call($ul)});return this}})})(jQuery);