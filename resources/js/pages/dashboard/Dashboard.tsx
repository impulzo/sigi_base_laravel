import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import Widget from "../../components/widgets/Widget";
import Bar from "../../components/charts/BarChart";
import DoughnutChart from "../../components/charts/DoughnutChart";
import { DashboardState } from "./Props";
const app = document.getElementById("r-dashboard");

const Dashboard = () => {

	const [state, setState] = useState<DashboardState>({
		countExample: 0,
		dataExample: {
			labels: [],
			datasets: [],
		},
	});

	useEffect(() => {
		setState({ ...state, countExample: 5 });
		setState({
			...state, dataExample: {
				labels: ["example 1", "example 2"],
				datasets: [
					{
						label: "Title",
						backgroundColor: ["#9E2BAF", "#9DEBAF"],
						data: [2, 3],
					},
				],
			},
		});
	}, []);

	return (
		<div className='container-fluid'>
			<div className="row">
				<div className="col-12 col-sm-6 col-md-3">
					<Widget title='Example' icon='voyager-categories' number={state.countExample.toString()} color='div__card--green' />
				</div>
			</div>
			<div className="row">
				<div className="col-md-6 col-sm-12">
					<Bar data={state.dataExample} options={{ responsive: true, plugins: { title: { display: true, text: "Example" } } }} />
				</div>
			</div>
			<div className="row">
				<div className="col-12 col-sm-6 col-md-4">
					<Widget title='Example 2' icon='voyager-dollar' number={"$ 50.00"} color='div__card--teal' />
				</div>
			</div>
			<div className="row">
				<div className="col-md-4 col-sm-12">
					<DoughnutChart data={state.dataExample} options={{ responsive: true, plugins: { title: { display: true, text: "Example" } } }} />
				</div>
			</div>
		</div>
	);
};
export default Dashboard;

ReactDOM.render(<Dashboard />, app);
