import {
  SET_SERVICE_PACKAGE_NAME
} from '../../../store/mutation-types'

const setServicePackageName = ({commit, dispatch}, name = '') => {
    commit(SET_SERVICE_PACKAGE_NAME, name)
}

export default {
    setServicePackageName
}
