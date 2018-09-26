import {
  SET_SERVICE_PACKAGE_NAME,
  SET_SERVICE_PACKAGE_DAY,
  SET_SERVICE_INFO,
  SET_ARRAY_SERVICE_PACKAGES
} from '../../../store/mutation-types'

const setServicePackageName = ({commit, dispatch}, name = '') => {
    commit(SET_SERVICE_PACKAGE_NAME, name)
}

const setServiceInfo = ({commit, dispatch}, service_info = '') => {
    commit(SET_SERVICE_INFO, service_info)
}

const setServicePackageDay = ({commit, dispatch}, day = '') => {
    commit(SET_SERVICE_PACKAGE_DAY, day)
}

const setArrayServicePackages = ({commit, dispatch}, data = '') => {
    commit(SET_ARRAY_SERVICE_PACKAGES, data)
}

export default {
    setServicePackageName,
    setServicePackageDay,
    setArrayServicePackages,
    setServiceInfo
}
