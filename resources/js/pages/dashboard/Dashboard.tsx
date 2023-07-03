import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import Widget from '../../components/widgets/Widget';
import DoughnutChart from '../../components/charts/DoughnutChart';
import { dashboardState } from './Props';
import TableInvoices from './components/TableInvoices';
const app = document.getElementById("r-dashboard");
const URL = app?.getAttribute('data-url');

const Dashboard = () => {

    const [state, setState] = useState<dashboardState>({
        invoiceUse: 10,
        invoiceAvailable: 90,
        data_example: {
            labels: [],
            datasets: []
        },
    });

    useEffect(() => {
        setState({
            ...state, data_example: {
                labels: ['Timbres usados', 'Timbres disponibles'],
                datasets: [
                    {
                        label: '',
                        backgroundColor: ['#9E2BAF', '#9DEBAF'],
                        data: [10, 90],
                    },
                ]
            }
        });
    }, []);



    return (
        <div className='container-fluid'>
            <div className="row">
                <div className="col-12 col-sm-6 col-md-4">
                    <Widget title='Timbres disponibles' icon='voyager-certificate' number={state.invoiceAvailable.toString()} color='div__card--green' />
                </div>
                <div className="col-12 col-sm-6 col-md-4">
                    <Widget title='Timbres usados' icon='voyager-certificate' number={state.invoiceUse.toString()} color='div__card--orange' />
                </div>
                <div className="col-12 col-sm-6 col-md-4">
                    <Widget title='Ingresos' icon='voyager-dollar' number={'$ 50.00'} color='div__card--teal' />
                </div>
            </div>
            <div className="row">
                <div className="col-md-12 col-sm-12">
                    <TableInvoices url={URL as string} />
                </div>
            </div>
            <div className="row">
                <div className="col-md-4 col-sm-12"></div>
                <div className="col-md-4 col-sm-12">
                    <DoughnutChart data={state.data_example} options={{ responsive: true, plugins: { title: { display: true, text: 'Facturas' } } }} />
                </div>
                <div className="col-md-4 col-sm-12"></div>
            </div>
        </div>
    )
}
export default Dashboard;

ReactDOM.render(<Dashboard />, app);




