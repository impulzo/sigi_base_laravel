<template>
    <div class="row">
        <div class="col-md-6">
            <BarChart />
        </div>
        <div class="col-md-6">
            <PieChart />
        </div>
        <div class="col-md-6">
            <DoughnutChart />
        </div>
        <div class="col-md-6">
            <LineChart />
        </div>
    </div>
</template>

<script>
import BarChart from "./components/BarChart.vue";
import PieChart from "./components/PieChart.vue";
import LineChart from "./components/LineChart.vue";
import DoughnutChart from "./components/DoughnutChart.vue";
export default {
    name: "Dashboard",
    components: {
        BarChart,
        PieChart,
        LineChart,
        DoughnutChart,
    },
};
</script>

<style></style>
