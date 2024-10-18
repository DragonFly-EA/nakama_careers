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
                    <h1>Jobs</h1>
                    <div class="desktop-card">
                        <div class="card">
                            <div class="card-body">
                                <Link :href="route('jobs.create')" class="btn">Post a Job</Link>
                                <section class="table-section">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>Requirements</th>
                                            <th>Expires on</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <template v-if="jobs.length>0">
                                            <tr v-for="(job,index) in jobs" :key="job.id">
                                                <td>{{ index + 1 }}</td>
                                                <td>
                                                    <Link :href="route('jobs.view',job.id)">
                                                        {{ job.title }}
                                                    </Link>
                                                </td>
                                                <td>{{ job.location }}</td>
                                                <td v-html="truncatedData(job.description)"></td>
                                                <td v-html="truncatedData(job.requirements)"></td>
                                                <td>{{ job.expires_on }}</td>
                                                <td>
                                                    <template v-if="job.status===1">
                                                        Active
                                                    </template>
                                                    <template v-else>
                                                        Inactive
                                                    </template>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="dropbtn">Action<i class="fa fa-caret-down"></i>
                                                        </button>
                                                        <div class="dropdown-content">
                                                            <Link :href="route('jobs.view',job.id)">View</Link>
                                                            <Link :href="route('jobs.edit',job.id)">Edit</Link>
                                                            <a href="#">Archive</a>
                                                            <a href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                        <template v-else>
                                            <tr>
                                                <td colspan="8" style="text-align: center;color: var(--color1)">
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
                    <div class="mobile-card">
                        <ul>
                            <template v-if="jobs.length>0">
                                <li v-for="(job,index) in jobs" :key="job.id">
                                    <h3><span>Title:</span> {{ job.title }}</h3>
                                    <h3><span>Location:</span> {{ job.location }}</h3>
                                    <h3><span>Expires On:</span> {{ job.expires_on }}</h3>
                                    <h3><span>Status:</span>
                                        <template v-if="job.status===1">
                                            Active
                                        </template>
                                        <template v-else>
                                            Inactive
                                        </template>
                                    </h3>
                                    <div class="dropdown">
                                        <button class="dropbtn">Action<i class="fa fa-caret-down"></i>
                                        </button>
                                        <div class="dropdown-content">
                                            <Link :href="route('jobs.view',job.id)">View</Link>
                                            <Link :href="route('jobs.edit',job.id)">Edit</Link>
                                            <a href="#">Archive</a>
                                            <a href="#">Delete</a>
                                        </div>
                                    </div>
                                </li>
                            </template>
                            <template v-else>
                                <li>Failed</li>
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
    props: {
        jobs: [],
    },
    methods: {
        truncatedData(description) {
            return description.substring(0, 150) + '...';
        }
    },
}
</script>
<style>
</style>
