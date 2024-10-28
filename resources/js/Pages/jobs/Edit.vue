<template>
    <div class="container">
        <Head :title="job.title"/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <main>
            <div>
                <Header/>
                <section class="form-section">
                    <h1>{{job.title}}</h1>
                    <form @submit.prevent="createJob" class="form">
                        <div v-if="loading" class="preloader">
                            <div class="spinner"></div>
                        </div>
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" v-model="job.title" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" id="location" v-model="job.location" placeholder="Location">
                        </div>
                        <div class="form-group">
                            <label for="expires_on">Expires On</label>
                            <input type="date" id="expires_on" v-model="job.expires_on">
                        </div>
                        <div class="form-group">
                            <label for="bio">Description:</label>
                            <quill-editor
                                placeholder="write description here..."
                                v-model:content="job.description"
                                @ready="onEditorReady"
                                contentType="html"
                                @input="onEditorInput('description', $event)"
                                toolbar="full"
                            />
                        </div>
                        <div class="form-group">
                            <label for="bio">Requirements:</label>
                            <quill-editor
                                placeholder="write description here..."
                                v-model:content="job.requirements"
                                @ready="onEditorReady"
                                contentType="html"
                                @input="onEditorInput('requirements', $event)"
                                toolbar="full"
                            />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-submit">Update</button>
                        </div>
                    </form>
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
import {QuillEditor} from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();
import axios from "axios";
export default {
    data(){
        return {
            // description:"",
            // title: this.job.title,
            // location: this.job.location,
            // requirements: this.job.requirements,
            // expires_on: "",
            loading: false,
        }
    },
    props:{
        job:{},
    },
    components:{
        QuillEditor
    },
    methods:{
        onEditorReady(editor) {
            this.quill = editor
        },
        onEditorInput(field,event){
            console.log(field)
            this[field] = event.target.innerHTML;
        },
        createJob(){
            this.loading = true;
            axios.post(route('jobs.update'), {
                description: this.job.description,
                location: this.job.location,
                requirements: this.job.requirements,
                title: this.job.title,
                expires_on: this.job.expires_on,
                id: this.job.id,
            })
                .then((response) => {
                    console.log(response)
                    console.log(response.status===200)
                    if (response.status===200)
                    {
                        $toast.success(response.data.message,{
                            position: 'top-right',
                            pauseOnHover: true,
                            hideProgressBar: false,
                        })
                    }
                    console.log(response.statusText)
                })
                .catch((error)=>{
                    if (error.response && error.response.status === 422) {
                        $.each(error.response.data.errors,function (key, value) {
                            $toast.error(value[0],{
                                position: 'top-right',
                                pauseOnHover: true,
                                hideProgressBar: false,
                            })
                        })
                    } else {
                        console.error(error);
                    }
                })
                .finally(()=>{
                    this.loading = false;
                    this.description = "";
                    this.requirements = "";
                    this.title = "";
                    this.expires_on = "";
                    this.location  = "";
                })
        }
    }
}
</script>
<style>


</style>

