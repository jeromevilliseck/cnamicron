(function(d,id) {
    if (d.getElementById(id)) return;
    var s = d.createElement('script');
    var c = d.getElementsByTagName('script')[0];
    s.type = 'text/javascript';
    s.async = true;
    s.src = 'https://widgets.malt.com/v1/js/sdk.wgt.min.js';
    c.parentNode.insertBefore(s, c);
})(document,'hopwork-sdkjs-wgt');