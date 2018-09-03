(function (root) {
/* -- Data -- */
root.YUI_config = {"version":"3.18.1","base":"http:\u002F\u002Fyui.yahooapis.com\u002F3.18.1\u002F","comboBase":"https:\u002F\u002Fyui-s.yahooapis.com\u002Fcombo?","comboSep":"&","root":"3.18.1\u002F","filter":"min","logLevel":"error","combine":true,"patches":[],"maxURLLength":2048,"groups":{"vendor":{"combine":true,"comboBase":"\u002Fcombo\u002F1.18.13?","base":"\u002F","root":"\u002F","modules":{"css-mediaquery":{"path":"vendor\u002Fcss-mediaquery.js"},"handlebars-runtime":{"path":"vendor\u002Fhandlebars.runtime.js"}}},"app":{"combine":true,"comboBase":"\u002Fcombo\u002F1.18.13?","base":"\u002Fjs\u002F","root":"\u002Fjs\u002F"}}};
root.app || (root.app = {});
root.app.yui = {"use":function () { return this._bootstrap('use', [].slice.call(arguments)); },"require":function () { this._bootstrap('require', [].slice.call(arguments)); },"ready":function (callback) { this.use(function () { callback(); }); },"_bootstrap":function bootstrap(method, args) { var self = this, d = document, head = d.getElementsByTagName('head')[0], ie = /MSIE/.test(navigator.userAgent), callback = [], config = typeof YUI_config != "undefined" ? YUI_config : {}; function flush() { var l = callback.length, i; if (!self.YUI && typeof YUI == "undefined") { throw new Error("YUI was not injected correctly!"); } self.YUI = self.YUI || YUI; for (i = 0; i < l; i++) { callback.shift()(); } } function decrementRequestPending() { self._pending--; if (self._pending <= 0) { setTimeout(flush, 0); } else { load(); } } function createScriptNode(src) { var node = d.createElement('script'); if (node.async) { node.async = false; } if (ie) { node.onreadystatechange = function () { if (/loaded|complete/.test(this.readyState)) { this.onreadystatechange = null; decrementRequestPending(); } }; } else { node.onload = node.onerror = decrementRequestPending; } node.setAttribute('src', src); return node; } function load() { if (!config.seed) { throw new Error('YUI_config.seed array is required.'); } var seed = config.seed, l = seed.length, i, node; if (!self._injected) { self._injected = true; self._pending = seed.length; } for (i = 0; i < l; i++) { node = createScriptNode(seed.shift()); head.appendChild(node); if (node.async !== false) { break; } } } callback.push(function () { var i; if (!self._Y) { self.YUI.Env.core.push.apply(self.YUI.Env.core, config.extendedCore || []); self._Y = self.YUI(); self.use = self._Y.use; if (config.patches && config.patches.length) { for (i = 0; i < config.patches.length; i += 1) { config.patches[i](self._Y, self._Y.Env._loader); } } } self._Y[method].apply(self._Y, args); }); self.YUI = self.YUI || (typeof YUI != "undefined" ? YUI : null); if (!self.YUI && !self._injected) { load(); } else if (self._pending <= 0) { setTimeout(flush, 0); } return this; }};
root.YUI_config || (root.YUI_config = {});
root.YUI_config.seed = ["https:\u002F\u002Fyui-s.yahooapis.com\u002Fcombo?3.18.1\u002Fyui\u002Fyui-min.js"];
root.YUI_config.groups || (root.YUI_config.groups = {});
root.YUI_config.groups.app || (root.YUI_config.groups.app = {});
root.YUI_config.groups.app.modules = {"start\u002Fapp":{"path":"start\u002Fapp.js","requires":["handlebars-runtime","yui","base-build","router","pjax-base","view","start\u002Fmodels\u002Fgrid","start\u002Fviews\u002Finput","start\u002Fviews\u002Foutput","start\u002Fviews\u002Fdownload"]},"start\u002Fmodels\u002Fgrid":{"path":"start\u002Fmodels\u002Fgrid.js","requires":["yui","querystring","base-build","model","model-sync-rest","start\u002Fmodels\u002Fmq"]},"start\u002Fmodels\u002Fmq":{"path":"start\u002Fmodels\u002Fmq.js","requires":["css-mediaquery","attribute","base-build","model","model-list"]},"start\u002Fviews\u002Fdownload":{"path":"start\u002Fviews\u002Fdownload.js","requires":["yui","base-build","querystring","view"]},"start\u002Fviews\u002Finput":{"path":"start\u002Fviews\u002Finput.js","requires":["base-build","start\u002Fmodels\u002Fmq","start\u002Fviews\u002Ftab"]},"start\u002Fviews\u002Foutput":{"path":"start\u002Fviews\u002Foutput.js","requires":["base-build","escape","start\u002Fviews\u002Ftab"]},"start\u002Fviews\u002Ftab":{"path":"start\u002Fviews\u002Ftab.js","requires":["yui","base-build","view"]}};
root.app.templates || (root.app.templates = {});
root.app.templates.start = {"css-old-ie":{"1":function (container,depth0,helpers,partials,data) {
    var helper;

  return "\n<pre class=\"code code-wrap\" data-language=\"css\">\n"
    + container.escapeExpression(((helper = (helper = helpers.cssOldIE || (depth0 != null ? depth0.cssOldIE : depth0)) != null ? helper : helpers.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"cssOldIE","hash":{},"data":data}) : helper)))
    + "\n</pre>\n\n";
},"3":function (container,depth0,helpers,partials,data) {
    return "\n<p>\n    You haven't specified any customization that requires IE-specific CSS.\n</p>\n\n";
},"compiler":[7,"\u003E= 4.0.0"],"main":function (container,depth0,helpers,partials,data) {
    var stack1;

  return ((stack1 = helpers["if"].call(depth0 != null ? depth0 : (container.nullContext || {}),(depth0 != null ? depth0.cssOldIE : depth0),{"name":"if","hash":{},"fn":container.program(1, data, 0),"inverse":container.program(3, data, 0),"data":data})) != null ? stack1 : "");
},"useData":true},"css":{"1":function (container,depth0,helpers,partials,data) {
    var helper;

  return "\n<pre class=\"code code-wrap\" data-language=\"css\">\n"
    + container.escapeExpression(((helper = (helper = helpers.css || (depth0 != null ? depth0.css : depth0)) != null ? helper : helpers.helperMissing),(typeof helper === "function" ? helper.call(depth0 != null ? depth0 : (container.nullContext || {}),{"name":"css","hash":{},"data":data}) : helper)))
    + "\n</pre>\n\n";
},"3":function (container,depth0,helpers,partials,data) {
    return "\n<p>\n    You haven't specified any customization that require any additional CSS.\n</p>\n\n";
},"compiler":[7,"\u003E= 4.0.0"],"main":function (container,depth0,helpers,partials,data) {
    var stack1;

  return ((stack1 = helpers["if"].call(depth0 != null ? depth0 : (container.nullContext || {}),(depth0 != null ? depth0.css : depth0),{"name":"if","hash":{},"fn":container.program(1, data, 0),"inverse":container.program(3, data, 0),"data":data})) != null ? stack1 : "");
},"useData":true},"html":{"1":function (container,depth0,helpers,partials,data) {
    var stack1;

  return ((stack1 = helpers["if"].call(depth0 != null ? depth0 : (container.nullContext || {}),(depth0 != null ? depth0.css : depth0),{"name":"if","hash":{},"fn":container.program(2, data, 0),"inverse":container.program(7, data, 0),"data":data})) != null ? stack1 : "");
},"2":function (container,depth0,helpers,partials,data) {
    var stack1;

  return ((stack1 = helpers["if"].call(depth0 != null ? depth0 : (container.nullContext || {}),(depth0 != null ? depth0.cssOldIE : depth0),{"name":"if","hash":{},"fn":container.program(3, data, 0),"inverse":container.program(5, data, 0),"data":data})) != null ? stack1 : "");
},"3":function (container,depth0,helpers,partials,data) {
    return "    <!--[if lte IE 8]>\n        <link rel=\"stylesheet\" href=\"grid-old-ie.css\">\n    <![endif]-->\n    <!--[if gt IE 8]><!-->\n        <link rel=\"stylesheet\" href=\"grid.css\">\n    <!--<![endif]-->";
},"5":function (container,depth0,helpers,partials,data) {
    return "    <link rel=\"stylesheet\" href=\"grid.css\">";
},"7":function (container,depth0,helpers,partials,data) {
    var stack1, alias1=container.lambda, alias2=container.escapeExpression;

  return "    <!--[if lte IE 8]>\n        <link rel=\"stylesheet\" href=\"https://unpkg.com/purecss@"
    + alias2(alias1(((stack1 = (depth0 != null ? depth0.pure : depth0)) != null ? stack1.version : stack1), depth0))
    + "/build/grids-responsive-old-ie-min.css\">\n    <![endif]-->\n    <!--[if gt IE 8]><!-->\n        <link rel=\"stylesheet\" href=\"https://unpkg.com/purecss@"
    + alias2(alias1(((stack1 = (depth0 != null ? depth0.pure : depth0)) != null ? stack1.version : stack1), depth0))
    + "/build/grids-responsive-min.css\">\n    <!--<![endif]-->";
},"compiler":[7,"\u003E= 4.0.0"],"main":function (container,depth0,helpers,partials,data) {
    var stack1;

  return "<!doctype html>\n<html>\n<head>\n    <meta charset=\"utf-8\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n\n    <title>Your page title</title>\n\n    <link rel=\"stylesheet\" href=\"https://unpkg.com/purecss@"
    + container.escapeExpression(container.lambda(((stack1 = (depth0 != null ? depth0.pure : depth0)) != null ? stack1.version : stack1), depth0))
    + "/build/pure-min.css\">"
    + ((stack1 = helpers["if"].call(depth0 != null ? depth0 : (container.nullContext || {}),(depth0 != null ? depth0.needsCSS : depth0),{"name":"if","hash":{},"fn":container.program(1, data, 0),"inverse":container.noop,"data":data})) != null ? stack1 : "")
    + "</head>\n\n<body>\n    <!--\n    Your HTML goes here. Visit purecss.io/layouts/ for some sample HTML code.\n    -->\n</body>\n</html>\n";
},"useData":true},"rows":{"compiler":[7,"\u003E= 4.0.0"],"main":function (container,depth0,helpers,partials,data) {
    var alias1=container.lambda, alias2=container.escapeExpression;

  return "<tr data-row=\"media-query\" class=\"pure-g\">\n    <td class=\"pure-u-6-24\">\n        <input data-content=\"mq-key\" class=\"mq-key\"\n               required type=\"text\" placeholder=\"med\" value=\""
    + alias2(alias1((depth0 != null ? depth0.id : depth0), depth0))
    + "\">\n    </td>\n\n    <td class=\"pure-u-15-24 pure-u-sm-16-24\">\n        <input data-content=\"mq-value\" class=\"mq-value\"\n               required type=\"text\" placeholder=\"screen and (min-width: 48em)\" value=\""
    + alias2(alias1((depth0 != null ? depth0.mq : depth0), depth0))
    + "\">\n    </td>\n\n    <td class=\"remove-row pure-u-3-24 pure-u-sm-2-24\">\n        <button type=\"button\" data-action=\"remove-mq\" class=\"remove-mq pure-button\">&times;</button>\n    </td>\n</tr>\n";
},"useData":true}};
root.app.pure || (root.app.pure = {});
root.app.pure.version = "1.0.0";
root.app.start || (root.app.start = {});
root.app.start.limits = {"cols":{"min":2,"max":100},"prefix":{"min":0,"max":20},"mediaQueries":{"min":0,"max":10}};
root.app.start.defaults = {"cols":24,"prefix":".pure-u-","mediaQueries":[{"id":"sm","mq":"screen and (min-width: 35.5em)"},{"id":"md","mq":"screen and (min-width: 48em)"},{"id":"lg","mq":"screen and (min-width: 64em)"},{"id":"xl","mq":"screen and (min-width: 80em)"}]};
root.app.start.options = {"mediaQueries":[]};
}(this));
