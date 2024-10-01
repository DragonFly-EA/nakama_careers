<script>
import { Head } from '@inertiajs/vue3';
</script>
<template>
    <header class="row d-flex">
        <nav class="col-12 d-flex justify-content-between align-items-center py-3 px-4">
            <h1 class="fs-4">
            </h1>
            <div class="search-profile d-flex align-items-center">
                <div class="search-container d-flex">
                    <input type="text" id="search" placeholder="Search for ...">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="profile-container d-flex align-items-center">
                    <img :src="$page.props.auth.user.profile" alt="Profile Image">
                    <div class="profile-name d-block">
                        <h3 class="">{{$page.props.auth.user.firstname+' '+$page.props.auth.user.lastname}}</h3>
<!--                        <p>{{$page.props.auth.user.role.name}}</p>-->
                    </div>
                </div>
            </div>
        </nav>
    </header>
</template>
