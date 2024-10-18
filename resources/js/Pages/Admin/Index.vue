<template>
    <div class="container">
        <Head title="Jobs"/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <!-- Main Content -->
        <main>
            <div>
                <Header/>
                <section class="dashboard">
                    <h1>Administration</h1>
                    <div class="card">
                        <div class="card-body">
                            <button class="btn">Add Admin</button>
                            <section class="table-section">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <template v-for="(user,index) in users" :key="user.id">
                                        <tr>
                                            <td>{{index+1}}</td>
                                            <td>{{user.firstname+' '+user.lastname}}</td>
                                            <td>{{user.email}}</td>
                                            <td>Admin</td>
                                            <td>Action</td>
                                        </tr>
                                    </template>
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                </section>
            </div>
            <Footer/>
        </main>
    </div>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Header from '@/Layouts/Header.vue'
import {Head} from '@inertiajs/vue3';
import {Link} from '@inertiajs/vue3';
import Footer from "@/Layouts/Footer.vue";
</script>
<script>
export default {
    props:{
        users:[]
    }
}
</script>
