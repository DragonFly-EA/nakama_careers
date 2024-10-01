<template>
    <main class="container-fluid">
        <div class="row">
            <Head title="Dashboard"/>
            <AuthenticatedLayout>
            </AuthenticatedLayout>
            <article class="col-10">
                <Header/>
                <section class="">
                    <div class="container-fluid px-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mb-8">
                                    <h2 class="mb-2">Dashboard</h2>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <Link :href="route('dashboard')">
                                                <i class="fa-solid fa fa-home pe-2" style="color: #0a6b7a"></i>
                                            </Link>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="dashboard-2cards-grid d-grid gap-4">
                            <div class="dashboard-card dashboard-card1 p-4 text-center">
                                <canvas id="myRadarChart" width="400" height="400"></canvas>
                            </div>
                            <div class="dashboard-card dashboard-card2 p-4">
                                <canvas id="myDoughnutChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                        <div class="dashboard-3cards-grid d-grid gap-4 mt-4">

                        </div>
                    </div>
                </section>
            </article>
        </div>
    </main>
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
