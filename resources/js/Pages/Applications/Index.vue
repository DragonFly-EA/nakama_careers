<template>
    <div class="container">
        <Head title="Jobs"/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <main>
            <div>
                <Header/>
                <section class="form-section">
                    <h1>Applications</h1>
                    <div class="desktop-card">
                        <div class="card">
                            <div class="card-body">
                                <section class="table-section">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Applicant Name</th>
                                            <th>Email & Phone Number</th>
                                            <th>Job</th>
                                            <th>Work & years of Experience</th>
                                            <th>Applied on</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <template v-if="applications.length>0">
                                            <tr v-for="(application,index) in applications" :key="application.id">
                                                <td>{{index+1}}</td>
                                                <td>{{application.full_name}}</td>
                                                <td>{{application.email+'/'+application.phone_number}}</td>
                                                <td>{{application.job.title}}</td>
                                                <td>{{application.work_experience}}</td>
                                                <td>{{application.created_at}}</td>
                                                <td>{{application.status.name}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="dropbtn">Dropdown</button>
                                                        <div class="dropdown-content">
                                                            <a href="#">Link 1</a>
                                                            <a href="#">Link 2</a>
                                                            <a href="#">Link 3</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                        <template v-else>
                                            <tr>
                                                <td colspan="8" style="text-align:center;color: var(--color1)">
                                                    <i class="fa fa-copy fa-5x"></i>
                                                </td>
                                            </tr>
                                        </template>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-card"></div>
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
        applications:[],
    }
}
</script>
