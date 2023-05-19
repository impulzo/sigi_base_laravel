export interface chartOptions {
    data: {
        labels: Array<string>,
        datasets: Array<chartData>
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

export interface chartData {
    label: string,
    data: Array<number>,
    backgroundColor: Array<string>,
}