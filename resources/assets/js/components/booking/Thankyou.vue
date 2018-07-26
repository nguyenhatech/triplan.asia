<template>
    <div class="container">
        <p>Thankyou</p>
    </div>
</template>

<script>
    export default {
        name: 'Thankyou',
        props: {
            data_params: {
                type: Object,
                default: () => {
                    return {}
                }
            },
            uuid: {
                type: String,
                default: () => {
                    return '';
                }
            }
        },
        data () {
            return {

            }
        },
        components: {

        },
        computed: {

        },
        mounted () {

        },
        methods: {
            getBooking () {
                if (!uuid) {
                    console.log('huhuhuhuhuhuhuuh')
                }
            },
        }
    }
</script>

<style type="text/css" scoped>

</style>
