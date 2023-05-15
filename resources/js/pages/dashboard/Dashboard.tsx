import React, { useEffect, useState } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import Widget from '../../components/Widget';
import './styles.scss';
import Bar from '../../components/charts/BarChart';
import { IData } from '../../components/charts/IProps'
import DoughnutChart from '../../components/charts/DoughnutChart';
const app = document.getElementById("r-dashboard");
const url = app?.getAttribute('data-url');

interface IState {
    count_example: number,
    data_example: {
        labels: Array<string>,
        datasets: Array<IData>
    },
}

const Dashboard = () => {

    const [state, setState] = useState<IState>({
        count_example: 0,
        data_example: {
            labels: [],
            datasets: []
        },
    });

    useEffect(() => {
        setState({ ...state, count_example: 5 });
        setState({
            ...state, data_example: {
                labels: ['example 1', 'example 2'],
                datasets: [
                    {
                        label: 'Title',
                        backgroundColor: ['#9E2BAF', '#9DEBAF'],
                        data: [2, 3],
                    },
                ]
            }
        });
        // axios.get(url + '/api/v1/url').then(response => {
        //     if (response.status == 200) {
        //         setState(state => {
        //             return { ...state, count_example: response.data.data }
        //         })
        //     }
        // }).catch(error => { });

        // axios.get(url + '/api/v1/url').then(response => {
        //     if (response.status == 200) {
        //         let labels = response.data.data.map((x: any) => x.label);
        //         let datasets = [
        //             {
        //                 label: 'Title',
        //                 backgroundColor: response.data.data.map((x: any) => "#color"),
        //                 data: response.data.data.map((x: any) => x.value),
        //             },
        //         ];
        //         setState(state => {
        //             return { ...state, data_example: { labels: labels, datasets: datasets } }
        //         })
        //     }
        // }).catch(error => { });
    }, []);

    return (
        <div className='container-fluid'>
            <div className="row">
                <div className="col-12 col-sm-6 col-md-3">
                    <Widget title='Example' icon='voyager-categories' number={state.count_example.toString()} color='has-background-gradient-blue' />
                </div>
            </div>
            <div className="row">
                <div className="col-md-6 col-sm-12">
                    <Bar data={state.data_example} options={{ responsive: true, plugins: { title: { display: true, text: 'Example' } } }} />
                </div>
            </div>
            <div className="row">
                <div className="col-12 col-sm-6 col-md-4">
                    <Widget title='Example 2' icon='voyager-dollar' number={'$ 50.00'} color='has-background-gradient-teal' />
                </div>
            </div>
            <div className="row">
                <div className="col-md-4 col-sm-12">
                    <DoughnutChart data={state.data_example} options={{ responsive: true, plugins: { title: { display: true, text: 'Example' } } }} />
                </div>
            </div>
        </div>
    )
}
export default Dashboard;

ReactDOM.render(<Dashboard />, app);




