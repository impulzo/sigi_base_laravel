import React, { useEffect, useState } from 'react';
import DataTable from 'react-data-table-component';
import { Button, TextField } from '@mui/material';
import { getInvoices } from '../../../services/invoice';
const TableInvoices = (props: { url: string }) => {
    const [invoices, setInvoices] = useState<Array<any>>([]);
    useEffect(() => {
        const fetchData = async () => {
            try {
                const apiProducts = await getInvoices(props.url);
                setInvoices(apiProducts);
            } catch (error) {
                // Manejar el error de alguna manera
            }
        };
        fetchData();
    }, []);

    const [filterText, setFilterText] = useState<string>('');
    const [resetPaginationToggle, setResetPaginationToggle] = useState<boolean>(false);
    const filteredItems = invoices.filter(
        item => item.client && item.client.full_name.toLowerCase().includes(filterText.toLowerCase()),
    );
    const columns = [
        {
            name: 'Enlace PDF',
            selector: (row: any) => row.link_pdf,
            style: { fontSize: '13px' },
            cell: (row: any) => <a href='#'>{row.link_pdf}</a>,
        },
        {
            name: 'Enlace XML',
            selector: (row: any) => row.link_xml,
            style: { fontSize: '13px' },
            cell: (row: any) => <a href='#'>{row.link_xml}</a>,
        },
        {
            name: 'Registrado',
            selector: (row: any) => row.date,
            style: { fontSize: '13px' }
        },
        {
            name: 'Cliente',
            selector: (row: any) => row.client.full_name,
            style: { fontSize: '13px' },
            sortable: true,
        }
    ];

    const handleClear = () => {
        if (filterText == '') {
            setResetPaginationToggle(!resetPaginationToggle);
            setFilterText('');
        }
    };

    const headerComponent = () => (
        <div>
            <TextField
                label="Buscar..."
                variant="standard"
                value={filterText}
                onChange={e => setFilterText(e.target.value)}
            />
            <Button color="error" onClick={handleClear}>X</Button>
        </div>
    );

    const paginationComponentOptions = {
        rowsPerPageText: 'Filas por página',
        rangeSeparatorText: 'de',
        selectAllRowsItem: true,
        selectAllRowsItemText: 'Todos',
    };

    return (
        <>
            <DataTable
                title="Facturas"
                columns={columns}
                data={filteredItems}
                pagination
                paginationComponentOptions={paginationComponentOptions}
                paginationResetDefaultPage={resetPaginationToggle} // optionally, a hook to reset pagination to page 1
                noDataComponent={<div>No hay datos que mostrar</div>}
                subHeader
                subHeaderComponent={headerComponent()}
                persistTableHead
            />
        </>
    )
}
export default TableInvoices;