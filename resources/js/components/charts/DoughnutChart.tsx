import React from "react";
import { Doughnut } from "react-chartjs-2";
import { IProps } from "./IProps";
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";

ChartJS.register(ArcElement, Tooltip, Legend);

const DoughnutChart = (props: IProps) => {
    return (<Doughnut data={props.data} options={props.options} height={100} />)
}

export default DoughnutChart;