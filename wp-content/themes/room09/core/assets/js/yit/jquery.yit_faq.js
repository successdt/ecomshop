(function(e,b){b.yit_faq=function(a,c){this.element=b(c);this._init(a)};b.yit_faq.defaults={elements:{items:b(".faq-wrapper"),header:".faq-title",content:".faq-item",filters:b(".filters li a, .faq-filters a")}};b.yit_faq.prototype={_init:function(a){this.options=b.extend(!0,{},b.yit_faq.defaults,a);this._initSizes();this._initEvents()},_initSizes:function(){b(this.options.elements.content,this.element).each(function(){var a=b(this).parent().width();b(this).width(a)})},_initEvents:function(){var a=
    this.options.elements,c=this;a.filters.on("click.yit",function(d){d.preventDefault();b(this).hasClass("active")||(a.filters.removeClass("active").filter(this).addClass("active"),c._closeAll(),c._filterItems(b(this).data("option-value")))});a.items.on("click.yit",a.header,function(a){a.preventDefault();c._toggle(b(this))});b(e).resize(function(){c._initSizes()});c.element.resize(function(){b(e).trigger("sticky")})},_filterItems:function(a){var b=this.options.elements.items;b.filter(":visible").fadeOut("slow",
    function(){b.filter(a).fadeIn()})},_toggle:function(a){a.next().is(":visible")?this._close(a):this._open(a)},_open:function(a){a.toggleClass("active").find(":first-child").toggleClass("plus").toggleClass("minus");a.siblings(this.options.elements.content).slideDown()},_close:function(a){a.toggleClass("active").find(":first-child").toggleClass("plus").toggleClass("minus");a.siblings(this.options.elements.content).slideUp()},_closeAll:function(){var a=this;b(this.options.elements.header).filter(".active").each(function(){a._close(b(this))})}};
    b.fn.yit_faq=function(a){if("string"===typeof a){var c=Array.prototype.slice.call(arguments,1);this.each(function(){var d=b.data(this,"yit_faq");d?!b.isFunction(d[a])||"_"===a.charAt(0)?console.error("no such method '"+a+"' for yit_faq instance"):d[a].apply(d,c):console.error("cannot call methods on yit_checkout prior to initialization; attempted to call method '"+a+"'")})}else this.each(function(){b.data(this,"yit_faq")||b.data(this,"yit_faq",new b.yit_faq(a,this))});return this}})(window,jQuery);

