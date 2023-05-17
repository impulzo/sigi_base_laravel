import { chartData } from "../../components/charts/Props";

export interface dashboardState {
    count_example: number,
    data_example: {
        labels: Array<string>,
        datasets: Array<chartData>
    },
}