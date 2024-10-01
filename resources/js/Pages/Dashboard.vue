<template>
    <div class="container">
        <Head title="Dashboard"/>
        <AuthenticatedLayout>
        </AuthenticatedLayout>
        <!-- Main Content -->
        <main>
            <header class="main-header">
                <div class="search-bar">
                    <input type="text" placeholder="Search here...">
                    <i class="fas fa-search search-icon"></i>
                </div>
                <button class="post-job-btn"><i class="fas fa-plus-circle"></i> Post a Job</button>
            </header>

            <section class="dashboard">
                <h1>Dashboard</h1>
                <div class="stats-grid">
                    <div class="stat-box">
                        <div class="stat-content">
                            <h3>07</h3>
                            <p>Posted Jobs</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-content">
                            <h3>03</h3>
                            <p>Shortlisted</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-content">
                            <h3>1.7k</h3>
                            <p>Applications</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-content">
                            <h3>04</h3>
                            <p>Saved Candidates</p>
                        </div>
                        <div class="stat-icon">
                            <i class="fas fa-bookmark"></i>
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
                            <canvas id="jobViewsChart"></canvas>
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
            </section>
        </main>
    </div>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Header from '@/Layouts/Header.vue'
import {Head} from '@inertiajs/vue3';
import {Link} from '@inertiajs/vue3';
</script>
<script>
// import Chart from "chart.js/auto"

export default {
    props: {

    },
    mounted() {
      //  this.radarChart();
        // this.barChart();
    //    this.doughnutChart();
        //this.lineChart();
        //this.bubbleChart();
    },
    methods: {

    },
}
</script>

