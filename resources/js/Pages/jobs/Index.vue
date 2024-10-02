<template>
    <div class="container">
        <Head title="Jobs"/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <!-- Main Content -->
        <main>
            <Header/>
            <section class="dashboard">
                <h1>Jobs</h1>
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
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </section>
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
