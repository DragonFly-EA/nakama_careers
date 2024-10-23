<template>
    <div class="container">
        <Head title="Jobs"/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <main>
            <div>
                <Header/>
                <section class="dashboard">
                    <h1>Application Details</h1>
                    <div class="card">
                        <div class="card-body card-size">
                            <div>
                                <h1 style="margin-bottom: 10px;">Applicant Details</h1>
                                <h3>Applicant Name: {{ application.full_name }}</h3>
                                <h3>Email & Phone No: {{ application.email + '/' + application.phone_number }}</h3>
                                <h3>Gender: {{ application.gender }}</h3>
                                <h3>Job Title: {{ application.job.title }}</h3>
                                <h3>years Of Experience: {{ application.years_of_experience }}</h3>
                                <h3 style="float: left;width: 100%;padding: 10px 0;">Status: <span class="status-class"
                                                                                                   :style="'background-color:' +application.status.color">{{
                                        application.status.name
                                    }}</span>
                                </h3>
                                <p>Work Experience: {{ application.work_experience }}</p>
                            </div>
                            <div>
                                <h1 style="margin-bottom: 10px;">Academic Attachments</h1>
                                <ul class="attachments-list">
                                    <li v-for="(attachment,index) in application.attachments">
                                        <a :href="'/storage/'+attachment.document" target="_blank">
                                            <i class="fa fa-file-pdf fa-2x"></i>
                                            {{ attachment.level }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h1 style="margin-bottom: 10px;">Referees</h1>
                                <ul>
                                    <li v-for="(referee,index) in application.referees">
                                        <h3>Fullname: {{referee.full_name}}</h3>
                                        <h3>Contact: {{referee.contact}}</h3>
                                        <h3>Consent: {{referee.consent}}</h3>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h1 style="margin-bottom: 10px;">Professional Qualification </h1>
                                <ul>
                                    <li v-for="qualification in application.qualifications">
                                        <h3>Name: {{qualification.name}}</h3>
                                        <h3>Year Completed: {{qualification.duration}}</h3>
                                        <h3>Grade: {{qualification.grade}}</h3>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <button class="dropbtn">Reject</button>
                                <button class="dropbtn">Schedule For Interview</button>
                            </div>
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
    props: {
        application: [],
    }
}
</script>
