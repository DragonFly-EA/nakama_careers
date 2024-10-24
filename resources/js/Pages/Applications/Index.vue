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
                                                <td>
                                                    <Link :href="route('applications.view',application.id)">
                                                        {{application.full_name}}
                                                    </Link>
                                                </td>
                                                <td>{{application.email+'/'+application.phone_number}}</td>
                                                <td>{{application.job.title}}</td>
                                                <td>{{application.work_experience}}</td>
                                                <td>{{formatDate(application.created_at)}}</td>
                                                <td>
                                                    <span class="status-class"
                                                          :style="'background-color:' +application.status.color">
                                                        {{application.status.name}}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="dropbtn">Action</button>
                                                        <div class="dropdown-content">
                                                            <Link :href="route('applications.view',application.id)">Review</Link>
                                                            <a href="#">Update</a>
                                                            <a href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                        <template v-else>
                                            <tr>
                                                <td colspan="8" style="text-align:center;color: var(--color1)">
                                                    <i class="fa fa-copy fa-5x"></i>
                                                    <p>No Applications</p>
                                                </td>
                                            </tr>
                                        </template>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
                    </div>Applicant Name
                    <div class="mobile-card">
                        <ul>
                            <template v-if="applications.length>0">
                                <li v-for="(application,index) in applications" :key="application.id">
                                    <h3>Applicant Name: {{application.full_name}}</h3>
                                    <h3>Email & Phone No: {{application.email+'/'+application.phone_number}}</h3>
                                    <h3>Job Title: {{application.job.title}}</h3>
                                    <h3>Applied on: {{formatDate(application.created_at)}}</h3>
                                    <h3>Status: <span class="status-class"
                                                      :style="'background-color:' +application.status.color">
                                                        {{application.status.name}}
                                                    </span></h3>
                                    <div class="dropdown">
                                        <button class="dropbtn">Action<i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-content">
                                            <Link :href="route('applications.view',application.id)">Review</Link>
                                            <a href="#">Archive</a>
                                            <a href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                            </template>
                            <template v-else>
                                <li style="text-align: center">
                                    <i class="fa fa-copy fa-5x"></i>
                                    <h3>No Applications</h3>
                                </li>
                            </template>
                        </ul>
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
        applications:[],
    },
    methods:{
        formatDate(dates) {
            const final_dates = new Date(dates);
            return new Intl.DateTimeFormat('en-US', {
                weekday: 'long',
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            }).format(final_dates)
        }
    }
}
</script>
