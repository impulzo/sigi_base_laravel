import { ChartData } from "../../components/charts/Props";

export interface dashboardState {
    invoiceUse: number,
    invoiceAvailable: number,
    data_example: {
        labels: Array<string>,
        datasets: Array<ChartData>
    },
}