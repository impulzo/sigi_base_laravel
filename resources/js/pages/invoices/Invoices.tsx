import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import './styles.scss';
import { Customer, Invoice } from './Props';
import Box from '@mui/material/Box';
import { Button, TextField, FormControl } from '@mui/material';
import Select from 'react-select';
import Divider from '@mui/material/Divider';
import Chip from '@mui/material/Chip';
import { getCfdiTypes, getCfdisUse, getCurrencies, getCustomers, getPaymentsForm, getPaymentsMethod, getRegimens } from '../../services/invoice';
import TableProducts from './components/TableProducts';

const app = document.getElementById("r-invoices");
const CSRF = app?.getAttribute('data-csrf');
const URL = app?.getAttribute('data-url');
const IP = app?.getAttribute('data-ip');

const Invoices = () => {

    const [state, setState] = useState<Invoice>({
        customer: {
            id: 0,
            full_name: '',
            rfc: '',
            address: '',
            reason: '',
            regime: '',
            cfdi_use: '',
            postal_code: '',
            email: '',
        },
        customers: [],
        regimens: [],
        currencies: [],
        cfdiTypes: [],
        paymentsForm: [],
        paymentsMethod: [],
        cfdisUse: [],
    });

    useEffect(() => {
        const fetchData = async () => {
            try {
                const [apiCustomers, apiRegimens, apiCurrencies, apiCfdiTypes, apiPaymentsForm, apiPaymentsMethod, apiCfdisUse] = await Promise.all([
                    getCustomers(URL),
                    getRegimens(IP),
                    getCurrencies(IP),
                    getCfdiTypes(IP),
                    getPaymentsForm(IP),
                    getPaymentsMethod(IP),
                    getCfdisUse(IP),
                ]);
                setState({
                    ...state,
                    customers: apiCustomers,
                    regimens: apiRegimens,
                    currencies: apiCurrencies,
                    cfdiTypes: apiCfdiTypes,
                    paymentsForm: apiPaymentsForm,
                    paymentsMethod: apiPaymentsMethod,
                    cfdisUse: apiCfdisUse,
                });
            } catch (error) {
                // Manejar el error de alguna manera
            }
        };
        fetchData();
    }, []);

    const handleChange = (value: number) => {
        let customer = state.customers.find(x => x.id == value);
        setState({ ...state, customer: customer as Customer });
    };

    const responsiveStyle = {
        '& > :not(style)': {
            m: '1%',
            width: '30%',
        },
        '@media (max-width: 768px)': {
            '& > :not(style)': {
                m: '1%',
                width: '48%',
            },
        },
    };

    return (
        <>
            <div className='div__content'>
                <div className="row">
                    <div className="col-md-12">
                        <Box
                            component="form"
                            sx={responsiveStyle}
                            noValidate={false}
                            action={URL + "/admin/invoices"}
                            method="POST"
                        >
                            <input type="hidden" name="_token" value={CSRF as string} />
                            <Divider style={{ width: '100%' }}>
                                <Chip label="DATOS DEL RCEPTOR" color={'info'} />
                            </Divider>
                            <FormControl fullWidth>
                                <Select
                                    className="basic-single"
                                    classNamePrefix="select"
                                    placeholder="Seleccionar cliente"
                                    isLoading={false}
                                    isClearable={true}
                                    isSearchable={true}
                                    name="customer_id"
                                    required
                                    options={state.customers.map((customer) => ({
                                        value: customer.id,
                                        label: customer.full_name,
                                    }))}
                                    onChange={e => handleChange(e?.value as number)}
                                    styles={{
                                        option: (provided) => ({
                                            ...provided,
                                            backgroundColor: '#07366C',
                                            opacity: 1,
                                            color: 'white',
                                        }),
                                        menuList: (provided) => ({
                                            ...provided,
                                            backgroundColor: '#07366C',
                                            opacity: 1
                                        }),
                                    }}
                                />
                            </FormControl>
                            <TextField id="Rfc" name="Rfc" label="Rfc" variant="outlined" value={state.customer ? state.customer.rfc : ''} onChange={(e) => setState({...state,customer: {...state.customer,rfc: e.target.value}})} required />
                            <TextField id="Name" name="Name" label="Nombre o Rázon social (sin régimen capital)" variant="outlined" value={state.customer ? state.customer.reason : ''} onChange={(e) => setState({...state,customer: {...state.customer,reason: e.target.value}})} required />
                            <TextField id="TaxZipCode" name="TaxZipCode" label="Código postal fiscal" variant="outlined" value={state.customer ? state.customer.postal_code : ''} onChange={(e) => setState({...state,customer: {...state.customer,postal_code: e.target.value}})} required />

                            <FormControl fullWidth>
                                <label htmlFor="">Uso de CFDI</label>
                                <select name="CfdiUse" id="CfdiUse" className="form-select select2" required>
                                    {
                                        state.customer.cfdi_use &&
                                        state.cfdisUse.map((item, index) => (
                                            state.customer.cfdi_use == item.Value ?
                                                <option key={index} value={item.Value} selected >{item.Name}</option>
                                                :
                                                <option key={index} value={item.Value}>{item.Name}</option>
                                        ))
                                    }
                                </select>
                            </FormControl>
                            <FormControl fullWidth>
                                <label htmlFor="">Régimen fiscal</label>
                                <select name="FiscalRegime" id="FiscalRegime" className="form-select select2" required>
                                    {
                                        state.customer.regime &&
                                        state.regimens.map((item, index) => (
                                            state.customer.regime == item.Value ?
                                                <option key={index} value={item.Value} selected >{item.Name}</option>
                                                :
                                                <option key={index} value={item.Value}>{item.Name}</option>
                                        ))
                                    }
                                </select>
                            </FormControl>
                            <TextField id="Rfc" name="Email" label="Correo electrónico (envio de factura)" variant="outlined" value={state.customer ? state.customer.email : ''} required />

                            <Divider style={{ width: '100%' }}>
                                <Chip label="DATOS DE LA FACTURA" color={'info'} />
                            </Divider>
                            <FormControl fullWidth>
                                <label htmlFor="">Moneda</label>
                                <select name="Currency" id="Currency" className="form-select select2" required>
                                    {state.currencies.map((item, index) => (
                                        <option key={index} value={item.Value}>{item.Name}</option>
                                    ))}
                                </select>
                            </FormControl>
                            <FormControl fullWidth>
                                <label htmlFor="">Forma de pago</label>
                                <select name="PaymentForm" id="PaymentForm" className="form-select select2" required>
                                    {state.paymentsForm.map((item, index) => (
                                        <option key={index} value={item.Value}>{item.Name}</option>
                                    ))}
                                </select>
                            </FormControl>
                            <FormControl fullWidth>
                                <label htmlFor="">Método de pago</label>
                                <select name="PaymentMethod" id="PaymentMethod" className="form-select select2" required>
                                    {state.paymentsMethod.map((item, index) => (
                                        <option key={index} value={item.Value}>{item.Name}</option>
                                    ))}
                                </select>
                            </FormControl>
                            <FormControl fullWidth>
                                <label htmlFor="">Tipo de CFDI</label>
                                <select name="CfdiType" id="CfdiType" className="form-select select2" required>
                                    {state.cfdiTypes.map((item, index) => (
                                        <option key={index} value={item.Value}>{item.Name}</option>
                                    ))}
                                </select>
                            </FormControl>
                            <TextField id="Serie" name="Serie" label="Serie" variant="outlined" required />
                            <TextField id="PaymentConditions" name="PaymentConditions" label="Condiciones de pago" variant="outlined" required />
                            <TextField id="ExpeditionPlace" name="ExpeditionPlace" label="C.P lugar de expedición" variant="outlined" required />
                            <Divider style={{ width: '100%' }}>
                                <Chip label="PRODUCTOS O SERVICIOS DE LA FACTURA" color={'info'} />
                            </Divider>
                            <TableProducts url={URL as string} />
                            <Button variant="contained" size="large" color="success" type="submit" style={{ width: '50%', margin: 'auto', marginLeft: '25%', marginTop: 20 }}>
                                Generar
                            </Button>
                        </Box>
                    </div>
                </div>
            </div>
        </>
    )
}
export default Invoices;

ReactDOM.render(<Invoices />, app);




