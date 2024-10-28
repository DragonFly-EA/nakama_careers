<script>
import { Head } from '@inertiajs/vue3';
import axios from "axios";
export default {
    data(){
        return{
            showSidebar: false,
            notifications:[],
        }
    },
    created(){
        this.getNotifications();
    },
    methods: {
        showSidebarMethod(){
            $(".sidebar").show();
        },
        getNotifications(){
            axios.get('/api/notifications')
                .then((response) => {
                    this.notifications = response.data;
                })
                .catch((err)=>{
                    console.log(err);
                })
        },
    }
}
</script>
<template>
    <header class="main-header">
        <button class="menu-bars" @click="showSidebarMethod">
            <i class="fa fa-bars"></i>
        </button>
        <div class="search-bar">
            <input type="text" placeholder="Search here...">
            <i class="fas fa-search search-icon"></i>
        </div>
        <!-- Notification Icon -->
        <div class="notification-icon">
            <i class="fas fa-bell"></i>
            <span class="notification-count">{{notifications.length}}</span>

            <!-- Notification Dropdown -->
            <div class="notification-dropdown">
                <ul>
                    <li v-for="(notification,index) in notifications" :key="index"><a href="#">{{notification.data}}</a></li>
                </ul>
            </div>
        </div>

<!--        <button class="post-job-btn"><i class="fas fa-plus-circle"></i> Post a Job</button>-->
    </header>
</template>

