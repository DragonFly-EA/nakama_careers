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
<style>
/* Style for the dropdown button */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Button styling */
.dropbtn {
    background-color: #3498db;
    color: white;
    padding: 10px 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    background-color: #ddd;
}

/* Show the dropdown when hovering over the button */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change button color when dropdown is open */
.dropdown:hover .dropbtn {
    background-color: #2980b9;
}
</style>
