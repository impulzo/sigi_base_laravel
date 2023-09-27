export interface ChartOptions {
	data: {
		labels: Array<string>,
		datasets: Array<ChartData>
	},
	options: {
		responsive: boolean,
		plugins: {
			title: {
				display: boolean,
				text: string,
			},
		},
	}
}

export interface ChartData {
	label: string,
	data: Array<number>,
	backgroundColor: Array<string>,
}