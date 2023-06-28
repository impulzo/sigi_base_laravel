export interface Invoice {
    customer: Customer,
    customers: Array<Customer>,
    regimens: Array<any>,
    currencies: Array<any>,
    cfdiTypes: Array<any>,
    paymentsForm: Array<any>,
    paymentsMethod: Array<any>,
    cfdisUse: Array<any>,
}

export interface Customer{
    id: number,
    full_name: string,
    rfc: string,
    address: string,
    reason: string,
    regime: string,
    cfdi_use: string,
    postal_code: string,
    email: string,
}
