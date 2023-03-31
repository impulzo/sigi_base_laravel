<template>
    <Pie :chart-data="values" />
</template>

<script>
import { Pie } from "vue-chartjs";
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";

ChartJS.register(ArcElement, Tooltip, Legend);

export default {
    name: "PieChart",
    components: { Pie },
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
                            color: ''
                        },
                        {
                            label: "Completed",
                            value: 15,
                            color: ''
                        },
                        {
                            label: "Cancel",
                            value: 5,
                            color: ''
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
