import {
  SET_SERVICE_PACKAGE_NAME
} from '../../../store/mutation-types'

export default {
  [SET_SERVICE_PACKAGE_NAME] (state, name) {
    state.package_name = name
  }
}
