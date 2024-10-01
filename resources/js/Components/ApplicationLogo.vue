<template>
    <div class="profile">
        <img src="/assets/images/logo.png" alt="Profile Picture" class="profile-img">
        <h2>{{$page.props.auth.user!==null?$page.props.auth.user.firstname+' '+$page.props.auth.user.lastname:""}}</h2>
<!--        <span class="status-dot"></span>-->
    </div>
</template>
