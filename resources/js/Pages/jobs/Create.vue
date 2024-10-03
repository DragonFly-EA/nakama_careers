<template>
    <div class="container">
        <Head title="Jobs"/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <main>
            <Header/>
            <section class="form-section">
                <h2>Create a Job</h2>
                <form @submit.prevent="createJob" class="form">
                    <div v-if="loading" class="preloader">
                        <div class="spinner"></div>
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" v-model="title" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" id="location" v-model="location" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="expires_on">Expires On</label>
                        <input type="date" id="expires_on" v-model="expires_on">
                    </div>
                    <div class="form-group">
                        <label for="bio">Description:</label>
                        <quill-editor
                            placeholder="write description here..."
                            v-model="description"
                            @ready="onEditorReady"
                            toolbar="full"
                        />
                    </div>
                    <div class="form-group">
                        <label for="bio">Requirements:</label>
                        <quill-editor
                            placeholder="write description here..."
                            v-model="requirements"
                            @ready="onEditorReady"
                            toolbar="full"
                        />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-submit">Create a Job</button>
                    </div>
                </form>
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
import {QuillEditor} from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import axios from "axios";
export default {
    data(){
        return {
            description:"",
            title: "",
            location: "",
            requirements: "",
            expires_on: "",
            loading: false,
        }
    },
    components:{
        QuillEditor
    },
    methods:{
        onEditorReady(editor) {
            this.quill = editor
        },
        createJob(){
            this.loading = true;
            axios.post(route('jobs.store'), {
                description: this.description,
                location: this.location,
                requirements: this.requirements,
                title: this.title,
                expires_on: this.expires_on,
            })
                .then((response) => {
                    console.log(response)
                })
        }
    }
}
</script>
<style>


</style>
