<script setup>
import {ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/vue3';
const showingNavigationDropdown = ref(false);
</script>

<template>
    <aside class="sidebar">
        <ApplicationLogo></ApplicationLogo>
        <nav class="sidebar-nav">
            <ul>
                <li><Link :href="route('dashboard')" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</Link></li>
                <li><Link :href="route('jobs.index')"><i class="fas fa-list"></i> Jobs</Link></li>
                <li><a href="#"><i class="fas fa-table"></i> Applications</a></li>
                <li><a href="#"><i class="fas fa-user"></i> My Profile</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Administration</a></li>
                <li><NavLink :href="route('logout')"><i class="fas fa-trash"></i> Delete Account</NavLink></li>
            </ul>
        </nav>
        <div class="profile-progress">
            <p>87% Profile Complete</p>
            <div class="progress-bar">
                <div class="progress"></div>
            </div>
        </div>
        <Link :href="route('logout')" method="post" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</Link>
    </aside>
</template>
