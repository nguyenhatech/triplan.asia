import {
  SET_SERVICE_PACKAGE_NAME,
  SET_SERVICE_PACKAGE_DAY,
  SET_ARRAY_SERVICE_PACKAGES
} from '../../../store/mutation-types'

export default {
  [SET_SERVICE_PACKAGE_NAME] (state, name) {
    state.package_name = name
    state.service_packages = []
  },
  [SET_SERVICE_PACKAGE_DAY] (state, date) {
    state.date = date
  },
  [SET_ARRAY_SERVICE_PACKAGES] (state, data) {
    let index = _.findIndex(state.service_packages, function (o) {
      return o.id === data.id
    })
    if (index === -1) {
      state.service_packages.push(data)
    }
  }
}
