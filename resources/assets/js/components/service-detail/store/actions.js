import {
  SET_SERVICE_PACKAGE_NAME,
  SET_ARRAY_SERVICE_PACKAGES
} from '../../../store/mutation-types'

const setServicePackageName = ({commit, dispatch}, name = '') => {
    commit(SET_SERVICE_PACKAGE_NAME, name)
}

const setArrayServicePackages = ({commit, dispatch}, data = '') => {
    console.log(data)
    commit(SET_ARRAY_SERVICE_PACKAGES, data)
}

export default {
    setServicePackageName,
    setArrayServicePackages
}
