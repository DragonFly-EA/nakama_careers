<template>
    <div class="container">
        <Head title="Jobs"/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <main>
            <Header/>
            <section class="dashboard">
                <div class="card">
                    <div class="card-body">
                        <h3>Applicant Name: {{application.full_name}}</h3>
                        <h3>Email & Phone No: {{application.email+'/'+application.phone_number}}</h3>
                        <h3>Gender: {{application.gender}}</h3>
                        <h3>Job Title: {{application.job.title}}</h3>
                        <h3>years Of Experience: {{application.years_of_experience}}</h3>
                        <h3>Status: {{application.status.name}}</h3>
                        <p>Work Experience: {{application.work_experience}}</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <ul>
                            <li v-for="(attachment,index) in application.attachments">
                                <i class="fa fa-file-pdf"></i>
                                {{attachment.level}}
                            </li>
                        </ul>
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
<script>
export default {
    props: {
        application: [],
    }
}
</script>
