export const helper = {
    data () {
        return {}
    },
    methods: {
        trimText (text, number) {
          if (text) {
            var html = new DOMParser().parseFromString(text, 'text/html')
            var plainText = html.body.textContent || ''
            if (plainText.length < number) {
              return plainText
            } else {
              return plainText.substr(0, number) + '...'
            }
          } else {
            return ''
          }
        }
    }
}
