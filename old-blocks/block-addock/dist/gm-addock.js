!(function (e) {
  var t = {}
  function n(r) {
    if (t[r]) return t[r].exports
    var o = (t[r] = { i: r, l: !1, exports: {} })
    return e[r].call(o.exports, o, o.exports, n), (o.l = !0), o.exports
  }
  ;(n.m = e),
    (n.c = t),
    (n.d = function (e, t, r) {
      n.o(e, t) || Object.defineProperty(e, t, { enumerable: !0, get: r })
    }),
    (n.r = function (e) {
      'undefined' != typeof Symbol &&
        Symbol.toStringTag &&
        Object.defineProperty(e, Symbol.toStringTag, { value: 'Module' }),
        Object.defineProperty(e, '__esModule', { value: !0 })
    }),
    (n.t = function (e, t) {
      if ((1 & t && (e = n(e)), 8 & t)) return e
      if (4 & t && 'object' == typeof e && e && e.__esModule) return e
      var r = Object.create(null)
      if (
        (n.r(r),
        Object.defineProperty(r, 'default', { enumerable: !0, value: e }),
        2 & t && 'string' != typeof e)
      )
        for (var o in e)
          n.d(
            r,
            o,
            function (t) {
              return e[t]
            }.bind(null, o),
          )
      return r
    }),
    (n.n = function (e) {
      var t =
        e && e.__esModule
          ? function () {
              return e.default
            }
          : function () {
              return e
            }
      return n.d(t, 'a', t), t
    }),
    (n.o = function (e, t) {
      return Object.prototype.hasOwnProperty.call(e, t)
    }),
    (n.p = ''),
    n((n.s = 10))
})({
  1: function (e, t, n) {
    'use strict'
    t.a = { apiUrl: 'https://booking.addock.co/widget.js' }
  },
  10: function (e, t, n) {
    'use strict'
    n.r(t)
    var r = n(2),
      o = n(1)
    if (void 0 === _gdpr)
      Object(r.a)(
        o.a.apiUrl,
        function () {
          return window.EasyLoisirsModule.init()
        },
        window.EasyLoisirsModule,
      )
    else {
      var i = []
      i.push(function (e) {
        Object(r.a)(
          o.a.apiUrl,
          function () {
            return window.EasyLoisirsModule.init()
          },
          window.EasyLoisirsModule,
        )
      }),
        _gdpr.push([
          {
            type: 'booking',
            name: 'booking',
            description: "Service de réservation d'activités en ligne",
          },
          i,
        ])
    }
  },
  2: function (e, t, n) {
    'use strict'
    var r = function (e) {
        var t = document.createElement('script')
        ;(t.type = 'text/javascript'), (t.async = 'async'), (t.src = e)
        var n = document.getElementsByTagName('script')[0]
        void 0 !== n
          ? n.parentNode.insertBefore(t, n)
          : document.getElementsByTagName('head')[0].parentNode.appendChild(t)
        return t
      },
      o = function (e) {
        return document.querySelector('script[src="'.concat(e, '"]'))
      }
    t.a = function (e) {
      var t =
          arguments.length > 1 && void 0 !== arguments[1]
            ? arguments[1]
            : function () {
                return null
              },
        n = arguments.length > 2 ? arguments[2] : void 0,
        i = o(e)
      o(e) || (i = r(e)),
        void 0 === n
          ? i.addEventListener('load', function () {
              t()
            })
          : t()
    }
  },
})
