import React from "react";
import { Line } from "react-chartjs-2";
import { ChartOptions } from "./Props";
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
	Legend,
);

const LineChart = (props: ChartOptions) => {
	return (<Line data={props.data} options={props.options} height={100} />);
};

export default LineChart;