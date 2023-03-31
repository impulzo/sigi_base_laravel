<template>
    <LineChartComponent :chart-data="values" />
</template>

<script>
import { Line as LineChartComponent } from "vue-chartjs";
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend,
} from "chart.js";

ChartJS.register(
    CategoryScale,
    LinearScale,
    PointElement,
    LineElement,
    Title,
    Tooltip,
    Legend
);

export default {
    name: "LineChart",
    components: { LineChartComponent },
    props: {
        chartData: {
            type: Object,
            default: () => {
                return {
                    title: "Status",
                    data: [
                        {
                            label: "Pending",
                            value: 10,
                            color: "",
                        },
                        {
                            label: "Completed",
                            value: 15,
                            color: "",
                        },
                        {
                            label: "Cancel",
                            value: 5,
                            color: "",
                        },
                    ],
                };
            },
        },
    },
    computed: {
        values: function () {
            return {
                labels: this.chartData.data.map((x) => x.label),
                datasets: [
                    {
                        label: this.chartData.title,
                        backgroundColor: this.chartData.data.map((x) =>
                            x.color === "" ? "#f87979" : x.color
                        ),
                        data: this.chartData.data.map((x) => x.value),
                    },
                ],
            };
        },
    },
};
</script>
