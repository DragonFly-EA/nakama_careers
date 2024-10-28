<script setup>
import {ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link,usePage} from '@inertiajs/vue3';
const showingNavigationDropdown = ref(false);

const currentRoute = window.location.pathname;
</script>

<template>
    <aside class="sidebar">
        <div>
            <ApplicationLogo></ApplicationLogo>
            <nav class="sidebar-nav">
                <ul>
                    <li><Link :href="route('dashboard')"  :class="{'active': currentRoute === '/dashboard'}"><i class="fas fa-tachometer-alt"></i> Dashboard</Link></li>
                    <li><Link :href="route('jobs.index')" :class="{'active': currentRoute==='/jobs'}"><i class="fas fa-list"></i> Jobs</Link></li>
                    <li><Link :href="route('applications.index')" :class="{'active': currentRoute==='/applications'}"><i class="fas fa-table"></i> Applications</Link></li>
                    <li><Link :href="route('profile.edit')"><i class="fas fa-user"></i> My Profile</Link></li>
                    <li><Link :href="route('users.index')" :class="{'active':currentRoute==='/users'}"><i class="fas fa-cog"></i> Administration</Link></li>
                </ul>
            </nav>
        </div>
        <Link :href="route('logout')" method="post" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</Link>
    </aside>
</template>
