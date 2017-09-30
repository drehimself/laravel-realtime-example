<template>
    <div>
        <div class="progress">
          <progressbar :now="progress" type="success" striped animated></progressbar>
        </div>

        <div class="order-status">
            <strong>Order Status:</strong> {{ statusNew }}
        </div>

        <img src="/img/delivery.gif" alt="delivery" v-if="progress >= 100">
    </div>
</template>

<script>
    import { progressbar } from 'vue-strap'

    export default {
        components: {
            progressbar
        },

        props: ['status', 'initial', 'order_id'],

        data() {
            return {
                statusNew: this.status,
                progress: this.initial
            }
        },

        mounted() {
            Echo.private('pizza-tracker.' + this.order_id)
            .listen('OrderStatusChanged', (order) => {
              this.statusNew = order.status_name
              this.progress = order.status_percent
            });
        }
    }
</script>
