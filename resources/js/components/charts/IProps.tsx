export interface IProps {
    data: {
        labels: Array<string>,
        datasets: Array<IData>
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

export interface IData {
    label: string,
    data: Array<number>,
    backgroundColor: Array<string>,
}