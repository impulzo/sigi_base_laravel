import { ChartData } from "../../components/charts/Props";

export interface DashboardState {
	countExample: number,
	dataExample: {
		labels: Array<string>,
		datasets: Array<ChartData>
	},
}
