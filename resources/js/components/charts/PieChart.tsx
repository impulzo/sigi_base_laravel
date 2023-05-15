import React from "react";
import { Pie } from "react-chartjs-2";
import { IProps } from "./IProps";

import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";

ChartJS.register(ArcElement, Tooltip, Legend);

const PieChart = (props: IProps) => {
    return (<Pie data={props.data} options={props.options} />)
}

export default PieChart;