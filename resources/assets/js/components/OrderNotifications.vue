<template>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <i class="fa fa-bell"></i>
            <span class="notification-count label label-danger" v-if="notifications.length > 0">{{ notifications.length }}</span>
            <span class="caret"></span>
        </a>

        <ul class="dropdown-menu dropdown-menu-notifications" role="menu">
            <li v-for="notification in notifications">
                <a :href="notification.url">
                    <div>
                        <i class="fa fa-exclamation-circle fa-fw"></i> {{ notification.description }}
                        <span class="pull-right text-muted small"><timeago :since="notification.time" :auto-update="60"></timeago></span>
                    </div>
                </a>
                <div class="divider"></div>
            </li>

            <li>
                <div class="text-center see-all-notifications">
                    <a href="notifications.html" v-if="notifications.length > 0">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <div v-else>No notifications</div>
                </div>
            </li>

        </ul>
    </li>

</template>

<script>
    import VueTimeago from 'vue-timeago'

    Vue.use(VueTimeago, {
      name: 'timeago',
      locale: 'en-US',
      locales: {
        'en-US': require('vue-timeago/locales/en-US.json')
      }
    })

    export default {


        props: ['user_id'],

        data() {
            return {
                notifications: []
            }
        },

        mounted() {
            console.log('notifications mounted');
            Echo.channel('pizza-tracker')
            .listen('OrderStatusChanged', (order) => {
                if (this.user_id == order.user_id) {
                    this.notifications.unshift({
                        description: 'Order ID: ' + order.id + ' updated',
                        url: '/orders/' + order.id,
                        time: new Date()
                    })
                }
            });
        }
    }
</script>
