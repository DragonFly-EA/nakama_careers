<template>
    <div class="container">
        <Head title="Jobs"/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <main>
            <Header/>
            <section class="form-section">
                <h1>Applications</h1>
                <div class="card">
                    <div class="card-body">
                        <section class="table-section">
                            <table>
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full name</th>
                                    <th>Email & Phone Number</th>
                                    <th>Job</th>
                                    <th>Work & years of Experience</th>
                                    <th>Applied on</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(application,index) in applications" :key="application.id">
                                    <td>{{index+1}}</td>
                                    <td>{{application.full_name}}</td>
                                    <td>{{application.email+'/'+application.phone_number}}</td>
                                    <td>{{application.job.title}}</td>
                                    <td>{{application.work_experience}}</td>
                                    <td>{{application.created_at}}</td>
                                    <td>{{application.job.status}}</td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </section>
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
        applications:[],
    }
}
</script>
