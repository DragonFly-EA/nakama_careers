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
                                <h3>{{jobs}}</h3>
                                <p>Posted Jobs</p>
                            </div>
                            <div class="stat-icon">
                                <i class="fa-regular fa-square-full"></i>
                            </div>
                        </div>
                        <div class="stat-box">
                            <div class="stat-content">
                                <h3>03</h3>
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
                                <select id="job-select">
                                    <option>Web & Mobile Prototype designer...</option>
                                </select>
                            </div>
                            <div class="graph-container">
                            </div>
                        </div>

                        <!-- Posted Job Section -->
                        <div class="posted-jobs">
                            <h2>Posted Jobs</h2>
                            <ul>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <div class="job-info">
                                        <strong>Web & Mobile Prototype</strong>
                                        <span>Fulltime - Spain</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <div class="job-info">
                                        <strong>Document Writer</strong>
                                        <span>Part-time - Italy</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <div class="job-info">
                                        <strong>Outbound Call Service</strong>
                                        <span>Fulltime - USA</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <div class="job-info">
                                        <strong>Product Designer</strong>
                                        <span>Part-time - Dubai</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <div class="job-info">
                                        <strong>Marketing Specialist</strong>
                                        <span>Part-time - UK</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="job-views-section">

                        <!-- Posted Job Section -->
                        <div class="posted-jobs">
                            <h2>Posted Jobs</h2>
                            <ul>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <div class="job-info">
                                        <strong>Web & Mobile Prototype</strong>
                                        <span>Fulltime - Spain</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <div class="job-info">
                                        <strong>Document Writer</strong>
                                        <span>Part-time - Italy</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <div class="job-info">
                                        <strong>Outbound Call Service</strong>
                                        <span>Fulltime - USA</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <div class="job-info">
                                        <strong>Product Designer</strong>
                                        <span>Part-time - Dubai</span>
                                    </div>
                                </li>
                                <li>
                                    <i class="fas fa-check-circle"></i>
                                    <div class="job-info">
                                        <strong>Marketing Specialist</strong>
                                        <span>Part-time - UK</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Job Views Graph Section -->
                        <div class="job-views">
                            <h2>Job Views</h2>
                            <div class="job-views-filter">
                                <label for="job-select">Jobs:</label>
                                <select id="job-select">
                                    <option>Web & Mobile Prototype designer...</option>
                                </select>
                            </div>
                            <div class="graph-container">
                                <canvas id="jobViewsChart"></canvas>
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
// import Chart from "chart.js/auto"

export default {
    props: {
        jobs:"",
        accepted: "",
        applications:"",
    },
    mounted() {
      //  this.radarChart();
        // this.barChart();
    //    this.doughnutChart();
        this.lineChart();
        //this.bubbleChart();
    },
    methods: {
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
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
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

