<template>
    <div class="container">
        <Head :title='job.title'/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <main>
            <Header/>
            <section class="dashboard">
                <h1>{{job.title}}</h1>
                <div class="card">
                    <div class="card-body">
                        <span v-html="job.description"></span>
                        <span v-html="job.requirements"></span>
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
        job:{},
    }
}
</script>
