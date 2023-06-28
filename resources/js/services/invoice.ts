import axios from 'axios';

export const getCustomers = async (url: any) => {
    try {
        const response = await axios.get(url+'/api/v1/customers');
        return response.data.status == 200 ? response.data.data : [];
    } catch (error) {
        console.error('Error al obtener los datos:', error);
        throw error;
    }
};


export const getProducts = async (url: any) => {
    try {
        const response = await axios.get(url+'/api/v1/products');
        return response.data.status == 200 ? response.data.data : [];
    } catch (error) {
        console.error('Error al obtener los datos:', error);
        throw error;
    }
};

export const getRegimens = async (url: any) => {
    try {
        const response = await axios.get(url+'/api/v1/catalogs/fiscal_regimens');
        return response.data;
    } catch (error) {
        console.error('Error al obtener los datos:', error);
        throw error;
    }
};

export const getCurrencies = async (url: any) => {
    try {
        const response = await axios.get(url+'/api/v1/catalogs/currencies');
        return response.data;
    } catch (error) {
        console.error('Error al obtener los datos:', error);
        throw error;
    }
};

export const getCfdiTypes = async (url: any) => {
    try {
        const response = await axios.get(url+'/api/v1/catalogs/cfdi_types');
        return response.data;
    } catch (error) {
        console.error('Error al obtener los datos:', error);
        throw error;
    }
};

export const getPaymentsForm = async (url: any) => {
    try {
        const response = await axios.get(url+'/api/v1/catalogs/payment_forms');
        return response.data;
    } catch (error) {
        console.error('Error al obtener los datos:', error);
        throw error;
    }
};

export const getPaymentsMethod = async (url: any) => {
    try {
        const response = await axios.get(url+'/api/v1/catalogs/payment_methods');
        return response.data;
    } catch (error) {
        console.error('Error al obtener los datos:', error);
        throw error;
    }
};

export const getCfdisUse = async (url: any) => {
    try {
        const response = await axios.get(url+'/api/v1/catalogs/cfdi_uses?keyword=HERD9305118V8');
        return response.data;
    } catch (error) {
        console.error('Error al obtener los datos:', error);
        throw error;
    }
};