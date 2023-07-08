import injectScript from '../helpers/injectScript'
import config from '../../config'

if (_gdpr === undefined) {
  injectScript(
    config.apiUrl,
    () => window.EasyLoisirsModule.init(),
    window.EasyLoisirsModule,
  )
} else {
  var addockCB = []
  addockCB.push(function (helpers) {
    injectScript(
      config.apiUrl,
      () => window.EasyLoisirsModule.init(),
      window.EasyLoisirsModule,
    )
  })
  _gdpr.push([
    {
      type: 'booking',
      name: 'Addock',
      description: "Service de réservation d'activités en ligne",
    },
    addockCB,
  ])
}
