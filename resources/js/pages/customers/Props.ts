export interface Customer {
	apiToken: string,
	token: string,
	id: number,
	first_name: string,
	last_name: string,
	gender: string,
	address: string,
	phone: string,
	rfc: string,
	reason: string,
	email: string,
	postal_code: string,
	user_id: number,
	user: string,
	before_user: string,
	password: string
}

export interface IProps {
	nextStep: () => void,
	prevStep: () => void,
	handleChange: (fields: Partial<Customer>) => void,
	values: Partial<Customer>
}
