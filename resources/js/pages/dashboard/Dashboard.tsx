import React, { useEffect, useState } from 'react';
import axios from 'axios';
import ReactDOM from 'react-dom';
import Widget from '../../components/widgets/Widget';
import Bar from '../../components/charts/BarChart';
import DoughnutChart from '../../components/charts/DoughnutChart';
import { dashboardState } from './Props';
const app = document.getElementById("r-dashboard");
const url = app?.getAttribute('data-url');

const Dashboard = () => {

    const [state, setState] = useState<dashboardState>({
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
    }, []);

    return (
        <div className='container-fluid'>
            <div className="row">
                <div className="col-12 col-sm-6 col-md-3">
                    <Widget title='Example' icon='voyager-categories' number={state.count_example.toString()} color='div__card--green' />
                </div>
            </div>
            <div className="row">
                <div className="col-md-6 col-sm-12">
                    <Bar data={state.data_example} options={{ responsive: true, plugins: { title: { display: true, text: 'Example' } } }} />
                </div>
            </div>
            <div className="row">
                <div className="col-12 col-sm-6 col-md-4">
                    <Widget title='Example 2' icon='voyager-dollar' number={'$ 50.00'} color='div__card--teal' />
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




