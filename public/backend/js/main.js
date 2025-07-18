"use strict";
let isRtl = window.Helpers.isRtl(),
    isDarkStyle = window.Helpers.isDarkStyle(),
    menu,
    animate,
    isHorizontalLayout = !1;
document.getElementById("layout-menu") &&
    (isHorizontalLayout = document
        .getElementById("layout-menu")
        .classList.contains("menu-horizontal")),
    (function () {
        setTimeout(function () {
            window.Helpers.initCustomOptionCheck();
        }, 1e3),
            "undefined" != typeof Waves &&
                (Waves.init(),
                Waves.attach(
                    ".btn[class*='btn-']:not([class*='btn-outline-']):not([class*='btn-label-'])",
                    ["waves-light"]
                ),
                Waves.attach("[class*='btn-outline-']"),
                Waves.attach("[class*='btn-label-']"),
                Waves.attach(".pagination .page-item .page-link")),
            document.querySelectorAll("#layout-menu").forEach(function (e) {
                (menu = new Menu(e, {
                    orientation: isHorizontalLayout ? "horizontal" : "vertical",
                    closeChildren: !!isHorizontalLayout,
                    showDropdownOnHover: localStorage.getItem(
                        "templateCustomizer-" +
                            templateName +
                            "--ShowDropdownOnHover"
                    )
                        ? "true" ===
                          localStorage.getItem(
                              "templateCustomizer-" +
                                  templateName +
                                  "--ShowDropdownOnHover"
                          )
                        : void 0 === window.templateCustomizer ||
                          window.templateCustomizer.settings
                              .defaultShowDropdownOnHover,
                })),
                    window.Helpers.scrollToActive((animate = !1)),
                    (window.Helpers.mainMenu = menu);
            }),
            document.querySelectorAll(".layout-menu-toggle").forEach((e) => {
                e.addEventListener("click", (e) => {
                    if (
                        (e.preventDefault(),
                        window.Helpers.toggleCollapsed(),
                        config.enableMenuLocalStorage &&
                            !window.Helpers.isSmallScreen())
                    )
                        try {
                            localStorage.setItem(
                                "templateCustomizer-" +
                                    templateName +
                                    "--LayoutCollapsed",
                                String(window.Helpers.isCollapsed())
                            );
                            var t,
                                a = document.querySelector(
                                    ".template-customizer-layouts-options"
                                );
                            a &&
                                ((t = window.Helpers.isCollapsed()
                                    ? "collapsed"
                                    : "expanded"),
                                a.querySelector(`input[value="${t}"]`).click());
                        } catch (e) {}
                });
            }),
            window.Helpers.swipeIn(".drag-target", function (e) {
                window.Helpers.setCollapsed(!1);
            }),
            window.Helpers.swipeOut("#layout-menu", function (e) {
                window.Helpers.isSmallScreen() &&
                    window.Helpers.setCollapsed(!0);
            });
        let e = document.getElementsByClassName("menu-inner"),
            t = document.getElementsByClassName("menu-inner-shadow")[0];
        0 < e.length &&
            t &&
            e[0].addEventListener("ps-scroll-y", function () {
                this.querySelector(".ps__thumb-y").offsetTop
                    ? (t.style.display = "block")
                    : (t.style.display = "none");
            });
        var a,
            s = document.querySelector(".dropdown-style-switcher"),
            n =
                localStorage.getItem(
                    "templateCustomizer-" + templateName + "--Style"
                ) ||
                (window.templateCustomizer?.settings?.defaultStyle ?? "light"),
            s =
                (window.templateCustomizer &&
                    s &&
                    ([].slice
                        .call(s.children[1].querySelectorAll(".dropdown-item"))
                        .forEach(function (e) {
                            e.addEventListener("click", function () {
                                var e = this.getAttribute("data-theme");
                                "light" === e
                                    ? window.templateCustomizer.setStyle(
                                          "light"
                                      )
                                    : "dark" === e
                                    ? window.templateCustomizer.setStyle("dark")
                                    : window.templateCustomizer.setStyle(
                                          "system"
                                      );
                            });
                        }),
                    (s = s.querySelector("i")),
                    "light" === n
                        ? (s.classList.add("ti-sun"),
                          new bootstrap.Tooltip(s, {
                              title: "Light Mode",
                              fallbackPlacements: ["bottom"],
                          }))
                        : "dark" === n
                        ? (s.classList.add("ti-moon"),
                          new bootstrap.Tooltip(s, {
                              title: "Dark Mode",
                              fallbackPlacements: ["bottom"],
                          }))
                        : (s.classList.add("ti-device-desktop"),
                          new bootstrap.Tooltip(s, {
                              title: "System Mode",
                              fallbackPlacements: ["bottom"],
                          }))),
                "system" === (a = n) &&
                    (a = window.matchMedia("(prefers-color-scheme: dark)")
                        .matches
                        ? "dark"
                        : "light"),
                [].slice
                    .call(document.querySelectorAll("[data-app-" + a + "-img]"))
                    .map(function (e) {
                        var t = e.getAttribute("data-app-" + a + "-img");
                        e.src = assetsPath + "img/" + t;
                    }),
                "undefined" != typeof i18next &&
                    "undefined" != typeof i18NextHttpBackend &&
                    i18next
                        .use(i18NextHttpBackend)
                        .init({
                            lng: window.templateCustomizer
                                ? window.templateCustomizer.settings.lang
                                : "en",
                            debug: !1,
                            fallbackLng: "en",
                            backend: {
                                loadPath:
                                    assetsPath + "json/locales/{{lng}}.json",
                            },
                            returnObjects: !0,
                        })
                        .then(function (e) {
                            l();
                        }),
                document.getElementsByClassName("dropdown-language"));
        if (s.length) {
            var o = s[0].querySelectorAll(".dropdown-item");
            for (let e = 0; e < o.length; e++)
                o[e].addEventListener("click", function () {
                    let a = this.getAttribute("data-language"),
                        s = this.getAttribute("data-text-direction");
                    for (var e of this.parentNode.children)
                        for (var t = e.parentElement.parentNode.firstChild; t; )
                            1 === t.nodeType &&
                                t !== t.parentElement &&
                                t
                                    .querySelector(".dropdown-item")
                                    .classList.remove("active"),
                                (t = t.nextSibling);
                    this.classList.add("active"),
                        i18next.changeLanguage(a, (e, t) => {
                            if (
                                (window.templateCustomizer &&
                                    window.templateCustomizer.setLang(a),
                                "rtl" === s
                                    ? "true" !==
                                          localStorage.getItem(
                                              "templateCustomizer-" +
                                                  templateName +
                                                  "--Rtl"
                                          ) &&
                                      window.templateCustomizer &&
                                      window.templateCustomizer.setRtl(!0)
                                    : "true" ===
                                          localStorage.getItem(
                                              "templateCustomizer-" +
                                                  templateName +
                                                  "--Rtl"
                                          ) &&
                                      window.templateCustomizer &&
                                      window.templateCustomizer.setRtl(!1),
                                e)
                            )
                                return console.log(
                                    "something went wrong loading",
                                    e
                                );
                            l();
                        });
                });
        }
        function l() {
            var e = document.querySelectorAll("[data-i18n]"),
                t = document.querySelector(
                    '.dropdown-item[data-language="' + i18next.language + '"]'
                );
            t && t.click(),
                e.forEach(function (e) {
                    e.innerHTML = i18next.t(e.dataset.i18n);
                });
        }
        n = document.querySelector(".dropdown-notifications-all");
        function i(e) {
            "show.bs.collapse" == e.type || "show.bs.collapse" == e.type
                ? e.target.closest(".accordion-item").classList.add("active")
                : e.target
                      .closest(".accordion-item")
                      .classList.remove("active");
        }
        const r = document.querySelectorAll(".dropdown-notifications-read");
        n &&
            n.addEventListener("click", (e) => {
                r.forEach((e) => {
                    e.closest(".dropdown-notifications-item").classList.add(
                        "marked-as-read"
                    );
                });
            }),
            r &&
                r.forEach((t) => {
                    t.addEventListener("click", (e) => {
                        t.closest(
                            ".dropdown-notifications-item"
                        ).classList.toggle("marked-as-read");
                    });
                }),
            document
                .querySelectorAll(".dropdown-notifications-archive")
                .forEach((t) => {
                    t.addEventListener("click", (e) => {
                        t.closest(".dropdown-notifications-item").remove();
                    });
                }),
            [].slice
                .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                .map(function (e) {
                    return new bootstrap.Tooltip(e);
                });
        [].slice
            .call(document.querySelectorAll(".accordion"))
            .map(function (e) {
                e.addEventListener("show.bs.collapse", i),
                    e.addEventListener("hide.bs.collapse", i);
            });
        window.Helpers.setAutoUpdate(!0),
            window.Helpers.initPasswordToggle(),
            window.Helpers.initSpeechToText(),
            window.Helpers.initNavbarDropdownScrollbar();
        let d = document.querySelector("[data-template^='horizontal-menu']");
        if (
            (d &&
                (window.innerWidth < window.Helpers.LAYOUT_BREAKPOINT
                    ? window.Helpers.setNavbarFixed("fixed")
                    : window.Helpers.setNavbarFixed("")),
            window.addEventListener(
                "resize",
                function (e) {
                    window.innerWidth >= window.Helpers.LAYOUT_BREAKPOINT &&
                        document.querySelector(".search-input-wrapper") &&
                        (document
                            .querySelector(".search-input-wrapper")
                            .classList.add("d-none"),
                        (document.querySelector(".search-input").value = "")),
                        d &&
                            (window.innerWidth <
                            window.Helpers.LAYOUT_BREAKPOINT
                                ? window.Helpers.setNavbarFixed("fixed")
                                : window.Helpers.setNavbarFixed(""),
                            setTimeout(function () {
                                window.innerWidth <
                                window.Helpers.LAYOUT_BREAKPOINT
                                    ? document.getElementById("layout-menu") &&
                                      document
                                          .getElementById("layout-menu")
                                          .classList.contains(
                                              "menu-horizontal"
                                          ) &&
                                      menu.switchMenu("vertical")
                                    : document.getElementById("layout-menu") &&
                                      document
                                          .getElementById("layout-menu")
                                          .classList.contains(
                                              "menu-vertical"
                                          ) &&
                                      menu.switchMenu("horizontal");
                            }, 100));
                },
                !0
            ),
            !isHorizontalLayout &&
                !window.Helpers.isSmallScreen() &&
                ("undefined" != typeof TemplateCustomizer &&
                    (window.templateCustomizer.settings.defaultMenuCollapsed
                        ? window.Helpers.setCollapsed(!0, !1)
                        : window.Helpers.setCollapsed(!1, !1)),
                "undefined" != typeof config) &&
                config.enableMenuLocalStorage)
        )
            try {
                null !==
                    localStorage.getItem(
                        "templateCustomizer-" +
                            templateName +
                            "--LayoutCollapsed"
                    ) &&
                    window.Helpers.setCollapsed(
                        "true" ===
                            localStorage.getItem(
                                "templateCustomizer-" +
                                    templateName +
                                    "--LayoutCollapsed"
                            ),
                        !1
                    );
            } catch (e) {}
    })(),
    "undefined" != typeof $ &&
        $(function () {
            window.Helpers.initSidebarToggle();
            var t,
                a,
                e,
                s = $(".search-toggler"),
                n = $(".search-input-wrapper"),
                o = $(".search-input"),
                l = $(".content-backdrop");
            s.length &&
                s.on("click", function () {
                    n.length && (n.toggleClass("d-none"), o.focus());
                }),
                $(document).on("keydown", function (e) {
                    var t = e.ctrlKey,
                        e = 191 === e.which;
                    t && e && n.length && (n.toggleClass("d-none"), o.focus());
                }),
                setTimeout(function () {
                    var e = $(".twitter-typeahead");
                    o.on("focus", function () {
                        n.hasClass("container-xxl")
                            ? (n.find(e).addClass("container-xxl"),
                              e.removeClass("container-fluid"))
                            : n.hasClass("container-fluid") &&
                              (n.find(e).addClass("container-fluid"),
                              e.removeClass("container-xxl"));
                    });
                }, 10),
                o.length &&
                    ((t = function (s) {
                        return function (t, e) {
                            let a;
                            (a = []),
                                s.filter(function (e) {
                                    if (
                                        e.name
                                            .toLowerCase()
                                            .startsWith(t.toLowerCase())
                                    )
                                        a.push(e);
                                    else {
                                        if (
                                            e.name
                                                .toLowerCase()
                                                .startsWith(t.toLowerCase()) ||
                                            !e.name
                                                .toLowerCase()
                                                .includes(t.toLowerCase())
                                        )
                                            return [];
                                        a.push(e),
                                            a.sort(function (e, t) {
                                                return t.name < e.name ? 1 : -1;
                                            });
                                    }
                                }),
                                e(a);
                        };
                    }),
                    (s = "search-vertical.json"),
                    $("#layout-menu").hasClass("menu-horizontal") &&
                        (s = "search-horizontal.json"),
                    (a = $.ajax({
                        url: assetsPath + "json/" + s,
                        dataType: "json",
                        async: !1,
                    }).responseJSON),
                    o.each(function () {
                        var e = $(this);
                        o
                            .typeahead(
                                {
                                    hint: !1,
                                    classNames: {
                                        menu: "tt-menu navbar-search-suggestion",
                                        cursor: "active",
                                        suggestion:
                                            "suggestion d-flex justify-content-between px-3 py-2 w-100",
                                    },
                                },
                                {
                                    name: "pages",
                                    display: "name",
                                    limit: 5,
                                    source: t(a.pages),
                                    templates: {
                                        header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Pages</h6>',
                                        suggestion: function ({
                                            url: e,
                                            icon: t,
                                            name: a,
                                        }) {
                                            return (
                                                '<a href="' +
                                                e +
                                                '"><div><i class="ti ' +
                                                t +
                                                ' me-2"></i><span class="align-middle">' +
                                                a +
                                                "</span></div></a>"
                                            );
                                        },
                                        notFound:
                                            '<div class="not-found px-3 py-2"><h6 class="suggestions-header text-primary mb-2">Pages</h6><p class="py-2 mb-0"><i class="ti ti-alert-circle ti-xs me-2"></i> No Results Found</p></div>',
                                    },
                                },
                                {
                                    name: "files",
                                    display: "name",
                                    limit: 4,
                                    source: t(a.files),
                                    templates: {
                                        header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Files</h6>',
                                        suggestion: function ({
                                            src: e,
                                            name: t,
                                            subtitle: a,
                                            meta: s,
                                        }) {
                                            return (
                                                '<a href="javascript:;"><div class="d-flex w-50"><img class="me-3" src="' +
                                                assetsPath +
                                                e +
                                                '" alt="' +
                                                t +
                                                '" height="32"><div class="w-75"><h6 class="mb-0">' +
                                                t +
                                                '</h6><small class="text-muted">' +
                                                a +
                                                '</small></div></div><small class="text-muted">' +
                                                s +
                                                "</small></a>"
                                            );
                                        },
                                        notFound:
                                            '<div class="not-found px-3 py-2"><h6 class="suggestions-header text-primary mb-2">Files</h6><p class="py-2 mb-0"><i class="ti ti-alert-circle ti-xs me-2"></i> No Results Found</p></div>',
                                    },
                                },
                                {
                                    name: "members",
                                    display: "name",
                                    limit: 4,
                                    source: t(a.members),
                                    templates: {
                                        header: '<h6 class="suggestions-header text-primary mb-0 mx-3 mt-3 pb-2">Members</h6>',
                                        suggestion: function ({
                                            name: e,
                                            src: t,
                                            subtitle: a,
                                        }) {
                                            return (
                                                '<a href="app-user-view-account.html"><div class="d-flex align-items-center"><img class="rounded-circle me-3" src="' +
                                                assetsPath +
                                                t +
                                                '" alt="' +
                                                e +
                                                '" height="32"><div class="user-info"><h6 class="mb-0">' +
                                                e +
                                                '</h6><small class="text-muted">' +
                                                a +
                                                "</small></div></div></a>"
                                            );
                                        },
                                        notFound:
                                            '<div class="not-found px-3 py-2"><h6 class="suggestions-header text-primary mb-2">Members</h6><p class="py-2 mb-0"><i class="ti ti-alert-circle ti-xs me-2"></i> No Results Found</p></div>',
                                    },
                                }
                            )
                            .bind("typeahead:render", function () {
                                l.addClass("show").removeClass("fade");
                            })
                            .bind("typeahead:select", function (e, t) {
                                t.url && (window.location = t.url);
                            })
                            .bind("typeahead:close", function () {
                                o.val(""),
                                    e.typeahead("val", ""),
                                    n.addClass("d-none"),
                                    l.addClass("fade").removeClass("show");
                            }),
                            o.on("keyup", function () {
                                "" == o.val() &&
                                    l.addClass("fade").removeClass("show");
                            });
                    }),
                    $(".navbar-search-suggestion").each(function () {
                        e = new PerfectScrollbar($(this)[0], {
                            wheelPropagation: !1,
                            suppressScrollX: !0,
                        });
                    }),
                    o.on("keyup", function () {
                        e.update();
                    }));
        });
