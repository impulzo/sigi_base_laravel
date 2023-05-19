import React from "react";
import { Doughnut } from "react-chartjs-2";
import { chartOptions } from "./Props";
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";

ChartJS.register(ArcElement, Tooltip, Legend);

const DoughnutChart = (props: chartOptions) => {
    return (<Doughnut data={props.data} options={props.options} height={100} />)
}

export default DoughnutChart;