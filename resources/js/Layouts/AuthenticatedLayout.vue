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
    <aside class="dashboard-aside-wrapper col-2 p-3">
        <ApplicationLogo></ApplicationLogo>
        <ul>
            <li>
                <Link :href="route('dashboard')" class="d-flex justify-content-between align-items-center p-2">
                    <p><i class="fa-solid fa-dashboard pe-2"></i>Dashboard</p>
                </Link>
            </li>
<!--            <li>-->
<!--                <NavLink :href="route('teams')" class="d-flex justify-content-between align-items-center p-2">-->
<!--                    <p><i class="fa-solid fa-futbol pe-2"></i>Teams</p>-->
<!--                </NavLink>-->
<!--            </li>-->
<!--            <li>-->
<!--                <NavLink :href="route('tournaments')" class="d-flex justify-content-between align-items-center p-2">-->
<!--                    <p><i class="fa-solid fa-trophy pe-2"></i>Tournaments</p>-->
<!--                </NavLink>-->
<!--            </li>-->
<!--            <li>-->
<!--                <NavLink :href="route('matches')" class="d-flex justify-content-between align-items-center p-2">-->
<!--                    <p><i class="fa-solid fa-futbol pe-2"></i>Matches</p>-->
<!--                </NavLink>-->
<!--            </li>-->
<!--            <li>-->
<!--                <NavLink :href="route('counties')" class="d-flex justify-content-between align-items-center p-2">-->
<!--                    <p><i class="fa-solid fa-earth-africa pe-2"></i>Counties</p>-->
<!--                </NavLink>-->
<!--            </li>-->
<!--            <li>-->
<!--                <NavLink :href="route('news.index')" class="d-flex justify-content-between align-items-center p-2">-->
<!--                    <p><i class="fa-solid fa-copy pe-2"></i>News</p>-->
<!--                </NavLink>-->
<!--            </li>-->
<!--            <li>-->
<!--                <NavLink :href="route('profile.edit')" class="d-flex justify-content-between align-items-center p-2">-->
<!--                    <p><i class="fa-regular fa-address-card pe-2"></i>Profile</p>-->
<!--                </NavLink>-->
<!--            </li>-->
<!--            <li>-->
<!--                <NavLink :href="route('users.index')" class="d-flex justify-content-between align-items-center p-2">-->
<!--                    <p><i class="fa-solid fa-user pe-2"></i>Administration</p>-->
<!--                </NavLink>-->
<!--            </li>-->
            <li>
                <NavLink :href="route('logout')" method="post" as="button"
                         class="d-flex justify-content-between align-items-center p-2">
                    <p><i class="fa-solid fa-power-off pe-2"></i>Logout</p>
                </NavLink>
            </li>
        </ul>
    </aside>
</template>
