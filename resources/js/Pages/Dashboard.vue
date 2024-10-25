<template>
    <div class="container">
        <Head title="Dashboard"/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <!-- Main Content -->
        <main>
            <div>
                <Header/>

                <section class="dashboard">
                    <h1>Dashboard</h1>
                    <div class="stats-grid">
                        <div class="stat-box">
                            <div class="stat-content">
                                <h3>{{jobsCount}}</h3>
                                <p>Posted Jobs</p>
                            </div>
                            <div class="stat-icon">
                                <i class="fa-regular fa-square-full"></i>
                            </div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-content">
                                <h3>{{shortlisted}}</h3>
                                <p>Shortlisted</p>
                            </div>
                            <div class="stat-icon">
                                <i class="fa-regular fa-bookmark"></i>
                            </div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-content">
                                <h3>{{formatNumber(applications)}}</h3>
                                <p>Applications</p>
                            </div>
                            <div class="stat-icon">
                                <i class="fa fa-eye"></i>
                            </div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-content">
                                <h3>{{accepted}}</h3>
                                <p>Accepted Candidates</p>
                            </div>
                            <div class="stat-icon">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </div>
                        </div>
                    </div>

                    <div class="job-views-section">
                        <!-- Job Views Graph Section -->
                        <div class="job-views">
                            <h2>Job Views</h2>
                            <div class="job-views-filter">
                                <label for="job-select">Jobs:</label>
                                <select id="job-select" ref="job-select" @change="jobViews()">
                                    <template v-for="job in jobs" :key="job.id">
                                        <option :value="job.id">{{job.title}}</option>
                                    </template>
                                </select>
                            </div>
                            <div class="graph-container">
                                <canvas id="jobViewsChart" height="150px" width="400vw"></canvas>
                            </div>
                        </div>

                        <!-- Posted Job Section -->
                        <div class="posted-jobs">
                            <h2>Posted Jobs</h2>
                            <ul>
                                <template v-if="jobs.length>0">
                                    <li v-for="job in jobs" :key="job.id">
                                        <i class="fas fa-check-circle"></i>
                                        <div class="job-info">
                                            <strong>{{job.title}}</strong>
                                            <span>Fulltime - {{job.location}}</span>
                                        </div>
                                    </li>
                                </template>
                                <template v-else>
                                    <li style="justify-content: center">
                                        <i class="fa fa-copy fa-5x"></i>
                                        <p>No Jobs Posted</p>
                                    </li>
                                </template>
                            </ul>
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
// import Chart from "chart.js/auto"

export default {
    props: {
        jobsCount:"",
        jobs:[],
        accepted: "",
        applications:"",
        shortlisted:"",
    },
    mounted() {
      //  this.radarChart();
        // this.barChart();
    //    this.doughnutChart();
        this.lineChart();
        //this.bubbleChart();
    },
    methods: {
        jobViews(){
            let id = (this.$refs.options.job-select);
            console.log(id);
        },
        formatNumber(value) {
            return new Intl.NumberFormat('en', { notation: 'compact', compactDisplay: 'short' }).format(value);
        },
        lineChart(){
            const ctx = document.getElementById('jobViewsChart').getContext('2d');
            const jobViewsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    datasets: [{
                        label: 'Job Views',
                        data: [50, 100, 200, 150, 250, 150, 100],
                        fill: true,
                        backgroundColor: 'rgba(85, 230, 115, 0.2)',
                        borderColor: '#55E673',
                        borderWidth: 2,
                        pointBackgroundColor: '#55E673',
                        pointBorderColor: '#fff',
                        pointRadius: 5,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#ddd'
                            },
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    elements: {
                        line: {
                            tension: 0.1
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        },
    },
}
</script>

