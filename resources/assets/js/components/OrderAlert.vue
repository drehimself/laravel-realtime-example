<template>
    <alert v-model="showAlert" placement="top-right" duration="4000" type="success" width="400px" dismissable>
      <span class="icon-ok-circled alert-icon-float-left"></span>
      <strong>Order Status Updated</strong>
      <p>Order ID: {{ order_id }} has been updated.</p>
    </alert>
</template>

<script>
    import { alert } from 'vue-strap'

    export default {
        components: {
            alert
        },

        props: ['user_id'],

        data() {
            return {
                showAlert: false,
                order_id: ''
            }
        },

        mounted() {
            Echo.channel('pizza-tracker')
            .listen('OrderStatusChanged', (order) => {
                if (this.user_id == order.user_id) {
                    this.showAlert = true,
                    this.order_id = order.id
                }
            });
        }
    }
</script>
