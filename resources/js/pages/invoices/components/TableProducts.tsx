import React, { useEffect, useState } from 'react';
import DataTable from 'react-data-table-component';
import { Product } from './Props';
import { getProducts } from '../../../services/invoice';
import { Button, FormControl } from '@mui/material';
import Select from 'react-select';

const TableProducts = (props: { url: string }) => {
    const [products, setProducts] = useState<Array<Product>>([]);
    const [selection, setSelections] = useState<Array<Product>>([]);

    const columns = [
        {
            name: 'Producto/Servicio',
            selector: (row: any) => row.name,
            sortable: true,
            style: { fontSize: '13px' }
        },
        {
            name: 'Descripción',
            selector: (row: any) => row.description,
            style: { fontSize: '13px' }
        },
        {
            name: 'Precio',
            selector: (row: any) => row.price,
            style: { fontSize: '13px' }
        },
        {
            name: 'Cantidad',
            selector: (row: any) => row.quantity,
            style: { fontSize: '13px' },
            cell: (row: any) => <input type="number" style={{ padding: 5, width: '80%' }} defaultValue={row.quantity} onChange={(e) => updateProduct(row.id, parseInt(e.target.value))} onBlur={(e) => handleBlur(row.id, parseInt(e.target.value))} />,
        },
        {
            name: 'Subtotal',
            selector: (row: any) => row.subtotal,
            style: { fontSize: '13px' }
        },
        {
            name: 'IVA',
            selector: (row: any) => row.iva,
            style: { fontSize: '13px' }
        },
        {
            name: 'Total',
            selector: (row: any) => row.total,
            style: { fontSize: '13px' }
        },
        {
            name: 'Quitar',
            cell: (row: any) => <button className='btn btn-danger' onClick={(e) => removeProduct(row.id)} ><i className='voyager-trash'></i></button>,
        },
    ];

    const paginationComponentOptions = {
        rowsPerPageText: 'Filas por página',
        rangeSeparatorText: 'de',
        selectAllRowsItem: true,
        selectAllRowsItemText: 'Todos',
    };

    const customStyles = {
        head: {
            style: {
                color: '#07366C',
                fontSize: '15px'
            },
        },
    };

    useEffect(() => {
        const fetchData = async () => {
            try {
                const apiProducts = await getProducts(props.url);
                setProducts(apiProducts);
            } catch (error) {
                // Manejar el error de alguna manera
            }
        };
        fetchData();
    }, []);

    const handleChange = (id: number) => {
        let product = products.find(x => x.id == id);
        let productExist = selection.find(x => x.id == id);
        if (product && !productExist) {
            product.quantity = 1;
            product.subtotal = parseFloat((1 * product.price).toFixed(2));
            product.iva = parseFloat((product.subtotal * 0.16).toFixed(2));
            product.total = parseFloat((product.subtotal * 1.16).toFixed(2));
            setSelections([...selection, product]);
        }
    };

    const removeProduct = (id: number) => {
        const updated = selection.filter((item) => item.id !== id);
        setSelections(updated);
    }

    const updateProduct = (id: number, cant: number) => {
        let productIndex = selection.findIndex((product) => product.id == id);
        let productExist = selection.find(x => x.id == id);
        if (productExist && !isNaN(cant) && cant > 0) {
            let quantity = cant;
            let subtotal = parseFloat((quantity * productExist.price).toFixed(2));
            let updatedProduct = {
                ...selection[productIndex],
                quantity: quantity,
                subtotal: subtotal,
                iva: parseFloat((subtotal * 0.16).toFixed(2)),
                total: parseFloat((subtotal * 1.16).toFixed(2)),
            };
            let updatedSelection = [...selection];
            updatedSelection[productIndex] = updatedProduct;

            setSelections(updatedSelection);
        }
    }

    const handleBlur = (id: number, cant: number) => {
        if (isNaN(cant) || cant <= 0) {
            removeProduct(id);
        }
    }

    return (
        <div style={{ width: '98%' }}>
            <FormControl fullWidth >
                <Select
                    className="basic-single"
                    classNamePrefix="select"
                    placeholder="Seleccionar producto"
                    isLoading={false}
                    isClearable={true}
                    isSearchable={true}
                    options={products.map((product) => ({
                        value: product.id,
                        label: product.name,
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
            <DataTable
                columns={columns}
                data={selection}
                pagination
                paginationComponentOptions={paginationComponentOptions}
                customStyles={customStyles}
                noDataComponent={<div>No hay productos agregados</div>}
            />
            <input type="hidden" name="products" value={JSON.stringify(selection)} />
        </div>
    )
}
export default TableProducts;




