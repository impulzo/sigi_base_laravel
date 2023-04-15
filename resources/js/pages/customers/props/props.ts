export interface IState {
    api_token: any,
    _token: any,
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
    nextStep: Function,
    prevStep: Function,
    handleChange: (fields: Partial<IState>) => void,
    values: Partial<IState>
}