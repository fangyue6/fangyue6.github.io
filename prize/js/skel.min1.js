/* skelJS v0.3.3 | (c) n33 | n33.co @n33co | MIT + GPLv2 */
var skel = function() {
    var a = {
        config: {
            prefix: null,
            preloadStyleSheets: !1,
            pollOnce: !1,
            resetCSS: !1,
            normalizeCSS: !1,
            boxModel: null,
            useOrientation: !1,
            containers: 960,
            containerUnits: "px",
            debug: !1,
            grid: {
                collapse: !1,
                gutters: 40,
                gutterUnits: "px"
            },
            breakpoints: {
                all: {
                    range: "*",
                    hasStyleSheet: !1
                }
            },
            events: {}
        },
        isLegacyIE: !1,
        stateId: "",
        breakpoints: [],
        breakpointList: [],
        events: [],
        plugins: {},
        cache: {
            elements: {},
            states: {}
        },
        locations: {
            head: null,
            body: null
        },
        css: {
            r: "html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block;}body{line-height:1;}ol,ul{list-style:none;}blockquote,q{quotes:none;}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}table{border-collapse:collapse;border-spacing:0;}body{-webkit-text-size-adjust:none}",
            n: 'article,aside,details,figcaption,figure,footer,header,hgroup,main,nav,section,summary{display:block}audio,canvas,video{display:inline-block}audio:not([controls]){display:none;height:0}[hidden]{display:none}html{background:#fff;color:#000;font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}a:focus{outline:thin dotted}a:active,a:hover{outline:0}h1{font-size:2em;margin:.67em 0}abbr[title]{border-bottom:1px dotted}b,strong{font-weight:bold}dfn{font-style:italic}hr{-moz-box-sizing:content-box;box-sizing:content-box;height:0}mark{background:#ff0;color:#000}code,kbd,pre,samp{font-family:monospace,serif;font-size:1em}pre{white-space:pre-wrap}q{quotes:"\u0081C" "\u0081D" "\u00818" "\u00819"}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sup{top:-0.5em}sub{bottom:-0.25em}img{border:0}svg:not(:root){overflow:hidden}figure{margin:0}fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:.35em .625em .75em}legend{border:0;padding:0}button,input,select,textarea{font-family:inherit;font-size:100%;margin:0}button,input{line-height:normal}button,select{text-transform:none}button,html input[type="button"],input[type="reset"],input[type="submit"]{-webkit-appearance:button;cursor:pointer}button[disabled],html input[disabled]{cursor:default}input[type="checkbox"],input[type="radio"]{box-sizing:border-box;padding:0}input[type="search"]{-webkit-appearance:textfield;-moz-box-sizing:content-box;-webkit-box-sizing:content-box;box-sizing:content-box}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration{-webkit-appearance:none}button::-moz-focus-inner,input::-moz-focus-inner{border:0;padding:0}textarea{overflow:auto;vertical-align:top}table{border-collapse:collapse;border-spacing:0}',
            g: ".\\31 2u{width:100%}.\\31 1u{width:91.6666666667%}.\\31 0u{width:83.3333333333%}.\\39 u{width:75%}.\\38 u{width:66.6666666667%}.\\37 u{width:58.3333333333%}.\\36 u{width:50%}.\\35 u{width:41.6666666667%}.\\34 u{width:33.3333333333%}.\\33 u{width:25%}.\\32 u{width:16.6666666667%}.\\31 u{width:8.3333333333%}.\\31 u,.\\32 u,.\\33 u,.\\34 u,.\\35 u,.\\36 u,.\\37 u,.\\38 u,.\\39 u,.\\31 0u,.\\31 1u,.\\31 2u{float:left;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;-o-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box}.\\-11u{margin-left:91.6666666667%}.\\-10u{margin-left:83.3333333333%}.\\-9u{margin-left:75%}.\\-8u{margin-left:66.6666666667%}.\\-7u{margin-left:58.3333333333%}.\\-6u{margin-left:50%}.\\-5u{margin-left:41.6666666667%}.\\-4u{margin-left:33.3333333333%}.\\-3u{margin-left:25%}.\\-2u{margin-left:16.6666666667%}.\\-1u{margin-left:8.3333333333%}",
            gF: ".row.flush{margin-left:0}.row.flush>*{padding:0!important}",
            gR: ".row:after{content:'';display:block;clear:both;height:0}.row:first-child>*{padding-top:0}.row>*{padding-top:0}",
            gCo: ".row:not(.persistent){overflow-x:hidden;margin-left:0}.row:not(.persistent)>*{float:none!important;width:100%!important;padding:10px 0 10px 0!important;margin-left:0!important}",
            d: ".row>*{box-shadow:inset 0 0 0 1px red}"
        },
        presets: {
            standard: {
                breakpoints: {
                    mobile: {
                        range: "-480",
                        lockViewport: !0,
                        containers: "fluid",
                        grid: {
                            collapse: !0
                        }
                    },
                    desktop: {
                        range: "481-",
                        containers: 1200
                    },
                    "1000px": {
                        range: "481-1200",
                        containers: 960
                    }
                }
            }
        },
        defaults: {
            breakpoint: {
                test: null,
                config: null,
                elements: null
            },
            config_breakpoint: {
                range: "",
                containers: 960,
                containerUnits: "px",
                lockViewport: !1,
                viewportWidth: !1,
                hasStyleSheet: !0,
                grid: {}
            }
        },
        DOMReady: null,
        indexOf: null,
        extend: function(d, b) {
            for (var c in b)"object" == typeof b[c] ? ("object" != typeof d[c] && (d[c] = {}), a.extend(d[c], b[c])) : d[c] = b[c]
        },
        getDevicePixelRatio: function() {
            if (navigator.userAgent.match(/(iPod|iPhone|iPad|Macintosh)/)) return 1;
            if (void 0 !== window.devicePixelRatio && !navigator.userAgent.match(/(Firefox)/)) return window.devicePixelRatio;
            if (window.matchMedia) {
                if (window.matchMedia("(-webkit-min-device-pixel-ratio: 2),(min--moz-device-pixel-ratio: 2),(-o-min-device-pixel-ratio: 2/1),(min-resolution: 2dppx)").matches) return 2;
                if (window.matchMedia("(-webkit-min-device-pixel-ratio: 1.5),(min--moz-device-pixel-ratio: 1.5),(-o-min-device-pixel-ratio: 3/2),(min-resolution: 1.5dppx)").matches) return 1.5
            }
            return 1
        },
        getViewportWidth: function() {
            var d, b, c;
            d = document.documentElement.clientWidth;
            b = window.orientation ? Math.abs(window.orientation) : !1;
            c = a.getDevicePixelRatio();
            screen.width < d && (d = screen.width); ! 1 !== b && (d = a.config.useOrientation ? 90 === b ? screen.height: screen.width: screen.width > screen.height ? screen.height: screen.width);
            return d / c
        },
        isActive: function(d) {
            return - 1 !== a.indexOf(a.stateId, "#" + d)
        },
        bind: function(d, b) {
            a.events[d] || (a.events[d] = []);
            a.events[d].push(b)
        },
        trigger: function(d) {
            if (a.events[d] && 0 != a.events[d].length) for (var b in a.events[d]) a.events[d][b]()
        },
        onStateChange: function(d) {
            a.bind("stateChange", d)
        },
        registerLocation: function(d, b) {
            a.locations[d] = b
        },
        cacheElement: function(d, b, c, e) {
            return a.cache.elements[d] = {
                id: d,
                object: b,
                location: c,
                priority: e
            }
        },
        cacheBreakpointElement: function(d, b, c, e, g) {
            var h = a.getCachedElement(b);
            h || (h = a.cacheElement(b, c, e, g));
            a.breakpoints[d] && a.breakpoints[d].elements.push(h);
            return h
        },
        getCachedElement: function(d) {
            return a.cache.elements[d] ? a.cache.elements[d] : null
        },
        detachAllElements: function() {
            var d, b;
            for (d in a.cache.elements) if (b = a.cache.elements[d].object, b.parentNode && (!b.parentNode || b.parentNode.tagName)) if (b.parentNode.removeChild(b), a.cache.elements[d].onDetach) a.cache.elements[d].onDetach()
        },
        attachElements: function(d) {
            var b = [],
            c = [],
            e,
            g;
            for (e in d) b[d[e].priority] || (b[d[e].priority] = []),
            b[d[e].priority].push(d[e]);
            for (e in b) if (0 != b[e].length) for (g in b[e]) if (d = a.locations[b[e][g].location]) {
                if (d.appendChild(b[e][g].object), b[e][g].onAttach) b[e][g].onAttach()
            } else c.push(b[e][g]);
            0 < c.length && a.DOMReady(function() {
                for (var b in c) if (a.locations[c[b].location].appendChild(c[b].object), c[b].onAttach) c[b].onAttach()
            })
        },
        poll: function() {
            var d, b, c = "";
            b = a.getViewportWidth();
            for (d in a.breakpoints) a.breakpoints[d].test(b) && (c += "#" + d);
            "" === c && (c = "#");
            c !== a.stateId && a.changeState(c)
        },
        updateState: function() {
            var d, b, c, e = [],
            g = a.stateId.substring(1).split("#");
            for (b in g) if (d = a.breakpoints[g[b]], 0 != d.elements.length) for (c in d.elements) a.cache.states[a.stateId].elements.push(d.elements[c]),
            e.push(d.elements[c]);
            0 < e.length && a.attachElements(e)
        },
        changeState: function(d) {
            var b, c, e, g, h, f;
            a.stateId = d;
            if (a.cache.states[a.stateId]) f = a.cache.states[a.stateId];
            else {
                a.cache.states[a.stateId] = {
                    config: {},
                    elements: []
                };
                f = a.cache.states[a.stateId];
                d = "#" === a.stateId ? [] : a.stateId.substring(1).split("#");
                a.extend(f.config, a.defaults.config_breakpoint);
                for (b in d) a.extend(f.config, a.breakpoints[d[b]].config);
                if (a.config.boxModel) {
                    if (! (c = a.getCachedElement("iBM"))) c = a.cacheElement("iBM", a.newInline("*,*:before,*:after{-moz-@;-webkit-@;-o-@;-ms-@;@}".replace(/@/g, "box-sizing:" + a.config.boxModel + "-box")), "head", 3);
                    f.elements.push(c)
                }
                if (a.config.resetCSS) {
                    if (! (c = a.getCachedElement("iR"))) c = a.cacheElement("iR", a.newInline(a.css.r), "head", 2);
                    f.elements.push(c)
                } else if (a.config.normalizeCSS) {
                    if (! (c = a.getCachedElement("iN"))) c = a.cacheElement("iN", a.newInline(a.css.n), "head", 2);
                    f.elements.push(c)
                }
                if (a.config.prefix) {
                    if (! (c = a.getCachedElement("ssB"))) c = a.cacheElement("ssB", a.newStyleSheet(a.config.prefix + ".css"), "head", 4);
                    f.elements.push(c)
                }
                if (f.config.lockViewport) {
                    if (! (c = a.getCachedElement("mVL" + a.stateId))) c = a.cacheElement("mVL" + a.stateId, a.newMeta("viewport", "width=" + (f.config.viewportWidth ? f.config.viewportWidth: "device-width") + ",initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"), "head", 1);
                    f.elements.push(c)
                } else if (f.config.viewportWidth) {
                    if (! (c = a.getCachedElement("mV" + a.stateId))) c = a.cacheElement("mV" + a.stateId, a.newMeta("viewport", "width=" + f.config.viewportWidth), "head", 1);
                    f.elements.push(c)
                }
                e = parseInt(f.config.containers);
                "fluid" === f.config.containers ? (e = 100, u = "%") : (e = f.config.containers, u = f.config.containerUnits);
                if (! (c = a.getCachedElement("iC" + e + u))) c = a.cacheElement("iC" + e + u, a.newInline(".container{width:" + e + u + " !important;margin: 0 auto;}"), "head", 3);
                f.elements.push(c);
                if (! (c = a.getCachedElement("iG"))) c = a.cacheElement("iG", a.newInline(a.css.g + a.css.gF), "head", 3);
                f.elements.push(c);
                e = f.config.grid.gutters;
                g = e / 2;
                h = 2 * e;
                e += f.config.grid.gutterUnits;
                g += f.config.grid.gutterUnits;
                h += f.config.grid.gutterUnits;
                if (! (c = a.getCachedElement("iGG" + f.config.grid.gutters))) c = a.cacheElement("iGG" + f.config.grid.gutters, a.newInline(".row>*{padding:" + e + " 0 0 " + e + "}.row+.row>*{padding-top:" + e + "}.row{margin-left:-" + e + "}.row.half>*{padding:" + g + " 0 0 " + g + "}.row.half+.row.half>*{padding-top:" + g + "}.row.half{margin-left:-" + g + "}.row.double>*{padding:" + h + " 0 0 " + h + "}.row.double+.row.double>*{padding-top:" + h + "}.row.double{margin-left:-" + h + "}"), "head", 3);
                f.elements.push(c);
                if (f.config.grid.collapse) {
                    if (! (c = a.getCachedElement("iGCo"))) c = a.cacheElement("iGCo", a.newInline(a.css.gR + a.css.gCo), "head", 3)
                } else if (! (c = a.getCachedElement("iGNoCo"))) c = a.cacheElement("iGNoCo", a.newInline(a.css.gR), "head", 3);
                f.elements.push(c);
                if (! (c = a.getCachedElement("iCd" + a.stateId))) {
                    c = [];
                    e = [];
                    for (b in a.breakpoints) - 1 !== a.indexOf(d, b) ? c.push(".not-" + b) : e.push(".only-" + b);
                    c = (0 < c.length ? c.join(",") + "{display:none}": "") + (0 < e.length ? e.join(",") + "{display:none}": "");
                    c = a.cacheElement("icD" + a.stateId, a.newInline(c.replace(/\.([0-9])/, ".\\3$1 ")), "head", 3);
                    f.elements.push(c)
                }
                for (b in d) {
                    if (a.breakpoints[d[b]].config.hasStyleSheet && a.config.prefix) {
                        if (! (c = a.getCachedElement("ss" + d[b]))) c = a.cacheElement("ss" + d[b], a.newStyleSheet(a.config.prefix + "-" + d[b] + ".css"), "head", 5);
                        f.elements.push(c)
                    }
                    if (0 < a.breakpoints[d[b]].elements.length) for (c in a.breakpoints[d[b]].elements) f.elements.push(a.breakpoints[d[b]].elements[c])
                }
                if (a.config.debug) {
                    if (! (c = a.getCachedElement("d"))) c = a.cacheElement("d", a.newInline(a.css.d), "head", 3);
                    f.elements.push(c)
                }
            }
            a.detachAllElements();
            a.attachElements(f.elements);
            a.DOMReady(function() {
                var a, b;
                if ((a = document.getElementsByClassName("skel-cell-mainContent")) && 0 < a.length) if (a = a[0], f.config.grid.collapse) b = document.createElement("div"),
                b.innerHTML = "",
                b.id = "skel-cell-mainContent-placeholder",
                a.parentNode.insertBefore(b, a.nextSibling),
                a.parentNode.insertBefore(a, a.parentNode.firstChild);
                else if (b = document.getElementById("skel-cell-mainContent-placeholder")) a.parentNode.insertBefore(a, b),
                a.parentNode.removeChild(b)
            });
            a.trigger("stateChange")
        },
        newMeta: function(a, b) {
            var c = document.createElement("meta");
            c.name = a;
            c.content = b;
            return c
        },
        newStyleSheet: function(a) {
            var b = document.createElement("link");
            b.rel = "stylesheet";
            b.type = "text/css";
            b.href = a;
            return b
        },
        newInline: function(d) {
            var b;
            a.isLegacyIE ? (b = document.createElement("span"), b.innerHTML = '&nbsp;<style type="text/css">' + d + "</style>") : (b = document.createElement("style"), b.type = "text/css", b.innerHTML = d);
            return b
        },
        newDiv: function(a) {
            var b = document.createElement("div");
            b.innerHTML = a;
            return b
        },
        registerPlugin: function(d, b) {
            a.plugins[d] = b;
            b._ = this;
            a.initPluginConfig(d, b);
            b.init()
        },
        initPluginConfig: function(d, b) {
            var c;
            c = "_skel_" + d + "_config";
            window[c] ? c = window[c] : (c = document.getElementsByTagName("script"), (c = c[c.length - 1].innerHTML.replace(/^\s+|\s+$/g, "")) && (c = eval("(" + c + ")")));
            "object" == typeof c && (c.preset && b.presets[c.preset] && a.extend(b.config, b.presets[c.preset]), a.extend(b.config, c))
        },
        initConfig: function() {
            function d(b, d) {
                var e;
                "string" != typeof d && (e = function(a) {
                    return ! 1
                });
                "*" == d ? e = function(a) {
                    return ! 0
                }: "-" == d.charAt(0) ? (c[b] = parseInt(d.substring(1)), e = function(a) {
                    return a <= c[b]
                }) : "-" == d.charAt(d.length - 1) ? (c[b] = parseInt(d.substring(0, d.length - 1)), e = function(a) {
                    return a >= c[b]
                }) : -1 != a.indexOf(d, "-") ? (d = d.split("-"), c[b] = [parseInt(d[0]), parseInt(d[1])], e = function(a) {
                    return a >= c[b][0] && a <= c[b][1]
                }) : (c[b] = parseInt(d), e = function(a) {
                    return a == c[b]
                });
                return e
            }
            var b, c = [],
            e = [];
            window._skel_config ? b = window._skel_config: (b = document.getElementsByTagName("script"), (b = b[b.length - 1].innerHTML.replace(/^\s+|\s+$/g, "")) && (b = eval("(" + b + ")")));
            "object" == typeof b && (b.preset && a.presets[b.preset] ? (a.config.breakpoints = {},
            a.extend(a.config, a.presets[b.preset])) : b.breakpoints && (a.config.breakpoints = {}), a.extend(a.config, b));
            a.extend(a.defaults.config_breakpoint.grid, a.config.grid);
            a.defaults.config_breakpoint.containers = a.config.containers;
            for (k in a.config.breakpoints)"object" != typeof a.config.breakpoints[k] && (a.config.breakpoints[k] = {
                range: a.config.breakpoints[k]
            }),
            b = {},
            a.extend(b, a.defaults.config_breakpoint),
            a.extend(b, a.config.breakpoints[k]),
            a.config.breakpoints[k] = b,
            b = {},
            a.extend(b, a.defaults.breakpoint),
            b.config = a.config.breakpoints[k],
            b.test = d(k, b.config.range),
            b.elements = [],
            a.breakpoints[k] = b,
            a.config.preloadStyleSheets && b.config.hasStyleSheet && e.push(a.newStyleSheet(a.config.prefix + "-" + k + ".css")),
            a.breakpointList.push(k);
            for (k in a.config.events) a.bind(k, a.config.events[k]);
            0 < e.length && a.DOMReady(function() {
                var a, b = document.getElementsByTagName("head")[0];
                for (a in e) b.appendChild(e[a]),
                b.removeChild(e[a])
            })
        },
        initEvents: function() {
            a.config.pollOnce || (window.onresize = function() {
                a.poll()
            },
            a.config.useOrientation && (window.onorientationchange = function() {
                a.poll()
            }))
        },
        init: function() {
            a.isLegacyIE = navigator.userAgent.match(/MSIE ([0-9]+)\./) && 8 >= RegExp.$1 ? !0 : !1; (function() {
                var b = window,
                c = function(a) {
                    g = !1;
                    c.isReady = !1;
                    "function" === typeof a && h.push(a);
                    a = !1;
                    if (!g) if (g = !0, "loading" !== d.readyState && l(), d.addEventListener) d.addEventListener("DOMContentLoaded", f, !1),
                    b.addEventListener("load", f, !1);
                    else if (d.attachEvent) {
                        d.attachEvent("onreadystatechange", f);
                        b.attachEvent("onload", f);
                        try {
                            a = null == b.frameElement
                        } catch(n) {}
                        d.documentElement.doScroll && a && m()
                    }
                },
                d = b.document,
                g = !1,
                h = [],
                f = function() {
                    d.addEventListener ? d.removeEventListener("DOMContentLoaded", f, !1) : d.detachEvent("onreadystatechange", f);
                    l()
                },
                l = function() {
                    if (!c.isReady) {
                        if (!d.body) return setTimeout(l, 1);
                        c.isReady = !0;
                        for (var a in h) h[a]();
                        h = []
                    }
                },
                m = function() {
                    if (!c.isReady) {
                        try {
                            d.documentElement.doScroll("left")
                        } catch(a) {
                            setTimeout(m, 1);
                            return
                        }
                        l()
                    }
                };
                c.isReady = !1;
                a.DOMReady = c
            })();
            var d = document;
            d.getElementsByClassName || (d.getElementsByClassName = function(a) {
                return d.querySelectorAll ? d.querySelectorAll(("." + a.replace(" ", " .")).replace(/\.([0-9])/, ".\\3$1 ")) : []
            });
            a.indexOf = Array.prototype.indexOf ?
            function(a, c) {
                return a.indexOf(c)
            }: function(a, c) {
                "string" == typeof a && (a = a.split(""));
                var d = a.length >>> 0,
                g = Number(c) || 0,
                g = 0 > g ? Math.ceil(g) : Math.floor(g);
                for (0 > g && (g += d); g < d; g++) if (a instanceof Array && g in a && a[g] === c) return g;
                return - 1
            };
            a.initConfig();
            a.registerLocation("head", document.getElementsByTagName("head")[0]);
            a.DOMReady(function() {
                a.registerLocation("body", document.getElementsByTagName("body")[0])
            });
            a.initEvents();
            a.poll()
        }
    };
    a.init();
    return a
} ();