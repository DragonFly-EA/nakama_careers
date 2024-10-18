<script>
import { Head } from '@inertiajs/vue3';
export default {
    data(){
        return{
            showSidebar: false,
        }
    },
    methods: {
        showSidebarMethod(){
            $(".sidebar").show();
        }
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
            <span class="notification-count">3</span>

            <!-- Notification Dropdown -->
            <div class="notification-dropdown">
                <ul>
                    <li><a href="#">New comment on your post</a></li>
                    <li><a href="#">New friend request</a></li>
                    <li><a href="#">New message from John</a></li>
                </ul>
            </div>
        </div>

<!--        <button class="post-job-btn"><i class="fas fa-plus-circle"></i> Post a Job</button>-->
    </header>
</template>

