(function () {
    var e, t, a, d, r, l, i, m, n, u, o;
    for (window.CREDLY_EMBED_JS_LOADER_VERSION = "20210331", e = "www.credly.com", u = function (e) {
        if (null != e) return /(.*\.credly.com$|(acclaim\.local|localhost|web):500[0-1]$)/.test(e) ? e : void 0
    }, l = 0, i = (m = function (e) {
        var t, a, d, r, l;
        if (null != document.querySelectorAll) return document.querySelectorAll("[data-" + e + "]");
        for (l = [], d = 0, r = (t = document.getElementsByTagName("*")).length; d < r; d++)(a = t[d]).getAttribute("data-" + e) && l.push(a);
        return l
    }("share-badge-id")).length; l < i; l++) a = (d = m[l]).attributes.getNamedItem("data-share-badge-id").value, o = d.attributes.getNamedItem("data-iframe-width").value, r = d.attributes.getNamedItem("data-iframe-height").value, (t = u(null != (n = d.attributes.getNamedItem("data-badge-host")) ? n.value : void 0)) || (t = e), d.outerHTML = '<iframe name="acclaim-badge" allowTransparency="true" frameborder="0" id="embedded-badge-' + a + '" scrolling="no" src="//' + t + "/embedded_badge/" + a + '" style="width: ' + o + "px; height: " + r + 'px;" title="View my verified achievement on Credly." ></iframe>'
}).call(this);