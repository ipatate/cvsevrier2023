!(function (t) {
  var e = {}
  function n(o) {
    if (e[o]) return e[o].exports
    var r = (e[o] = { i: o, l: !1, exports: {} })
    return t[o].call(r.exports, r, r.exports, n), (r.l = !0), r.exports
  }
  ;(n.m = t),
    (n.c = e),
    (n.d = function (t, e, o) {
      n.o(t, e) || Object.defineProperty(t, e, { enumerable: !0, get: o })
    }),
    (n.r = function (t) {
      'undefined' != typeof Symbol &&
        Symbol.toStringTag &&
        Object.defineProperty(t, Symbol.toStringTag, { value: 'Module' }),
        Object.defineProperty(t, '__esModule', { value: !0 })
    }),
    (n.t = function (t, e) {
      if ((1 & e && (t = n(t)), 8 & e)) return t
      if (4 & e && 'object' == typeof t && t && t.__esModule) return t
      var o = Object.create(null)
      if (
        (n.r(o),
        Object.defineProperty(o, 'default', { enumerable: !0, value: t }),
        2 & e && 'string' != typeof t)
      )
        for (var r in t)
          n.d(
            o,
            r,
            function (e) {
              return t[e]
            }.bind(null, r),
          )
      return o
    }),
    (n.n = function (t) {
      var e =
        t && t.__esModule
          ? function () {
              return t.default
            }
          : function () {
              return t
            }
      return n.d(e, 'a', e), e
    }),
    (n.o = function (t, e) {
      return Object.prototype.hasOwnProperty.call(t, e)
    }),
    (n.p = ''),
    n((n.s = 12))
})([
  function (t, e) {
    !(function () {
      t.exports = this.wp.element
    })()
  },
  function (t, e, n) {
    'use strict'
    e.a = { apiUrl: 'https://booking.addock.co/widget.js' }
  },
  function (t, e, n) {
    'use strict'
    var o = function (t) {
        var e = document.createElement('script')
        ;(e.type = 'text/javascript'), (e.async = 'async'), (e.src = t)
        var n = document.getElementsByTagName('script')[0]
        void 0 !== n
          ? n.parentNode.insertBefore(e, n)
          : document.getElementsByTagName('head')[0].parentNode.appendChild(e)
        return e
      },
      r = function (t) {
        return document.querySelector('script[src="'.concat(t, '"]'))
      }
    e.a = function (t) {
      var e =
          arguments.length > 1 && void 0 !== arguments[1]
            ? arguments[1]
            : function () {
                return null
              },
        n = arguments.length > 2 ? arguments[2] : void 0,
        c = r(t)
      r(t) || (c = o(t)),
        void 0 === n
          ? c.addEventListener('load', function () {
              e()
            })
          : e()
    }
  },
  function (t, e) {
    !(function () {
      t.exports = this.wp.i18n
    })()
  },
  function (t, e) {
    !(function () {
      t.exports = this.wp.components
    })()
  },
  function (t, e, n) {},
  function (t, e) {
    !(function () {
      t.exports = this.wp.blocks
    })()
  },
  function (t, e) {
    !(function () {
      t.exports = this.wp.blockEditor
    })()
  },
  function (t, e) {
    !(function () {
      t.exports = this.wp.data
    })()
  },
  function (t, e) {
    !(function () {
      t.exports = this.wp.serverSideRender
    })()
  },
  ,
  ,
  function (t, e, n) {
    'use strict'
    n.r(e)
    var o = n(6),
      r = (n(8), n(9), n(0)),
      c = n(4),
      i = n(7),
      a = n(3),
      s = function (t) {
        var e = t.props,
          n = e.attributes,
          o = e.setAttributes,
          s = n.hash
        return Object(r.createElement)(
          i.InspectorControls,
          null,
          Object(r.createElement)(
            c.PanelBody,
            { title: Object(a.__)('Settings', 'gm-addock') },
            Object(r.createElement)(c.TextControl, {
              label: Object(a.__)('Hash', 'gm-addock'),
              value: s,
              onChange: function (t) {
                return o({ hash: t })
              },
            }),
          ),
        )
      },
      u = n(1),
      d = n(2),
      l =
        (n(5),
        wp.blockEditor.RichText,
        wp.i18n.__,
        function (t) {
          var e = t.attributes,
            n = (t.setAttributes, e.hash)
          return (
            Object(r.useEffect)(
              function () {
                Object(d.a)(
                  u.a.apiUrl,
                  function () {
                    return window.EasyLoisirsModule.init()
                  },
                  window.EasyLoisirsModule,
                )
              },
              [n],
            ),
            Object(r.createElement)(
              r.Fragment,
              null,
              Object(r.createElement)(s, { props: t }),
              '' === n
                ? Object(r.createElement)(
                    'div',
                    { className: 'gm-bloc-addock-container' },
                    'Enter hash key on the right panel !',
                  )
                : Object(r.createElement)('div', {
                    className: 'gm-bloc-addock-container easyloisirs_module',
                    'data-hash': n,
                  }),
            )
          )
        }),
      f =
        (wp.blockEditor.RichText,
        function (t) {
          var e = t.attributes.hash
          return Object(r.createElement)('div', {
            'data-gdpr': 'booking',
            className: 'gdpr-mask gm-bloc-addock-container easyloisirs_module',
            'data-hash': e,
          })
        })
    Object(o.registerBlockType)('gm/addock', {
      title: Object(a.__)('Block addock', 'gm-addock'),
      description: Object(a.__)('Display addock Widget', 'gm-addock'),
      icon: 'star-filled',
      category: 'theme-blocks',
      example: {},
      attributes: { hash: { type: 'string', default: '' } },
      edit: l,
      save: f,
    })
  },
])
