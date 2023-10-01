import React, { SyntheticEvent } from "react";
import { IProps } from "../Props";

const Personal = (props: IProps) => {

	const nextStep = (e: SyntheticEvent) => {
		e.preventDefault();
		props.nextStep();
	};

	return (
		<form onSubmit={nextStep}>
			<div className="row">
				<div className="col-md-6">
					<div className="mb-3">
						<label htmlFor="first_name" className="form-label">Nombre (s)</label>
						<input type="text" className="form-control" name="first_name" id="first_name" placeholder="Nombre (s)" value={props.values.first_name} onChange={e => props.handleChange({ first_name: e.target.value })} required maxLength={25} />
					</div>
				</div>
				<div className="col-md-6">
					<div className="mb-3">
						<label htmlFor="last_name" className="form-label">Apellidos</label>
						<input type="text" className="form-control" name="last_name" id="last_name" placeholder="Apellidos" value={props.values.last_name} onChange={e => props.handleChange({ last_name: e.target.value })} required maxLength={25} />
					</div>
				</div>
				<div className="col-md-6">
					<div className="mb-3">
						<label htmlFor="gender" className="form-label">Género</label>
						<select name="gender" id="gender" className="form-select select--with" value={props.values.gender} onChange={e => props.handleChange({ gender: e.target.value })} required >
							<option value="Hombre">Hombre</option>
							<option value="Mujer">Mujer</option>
						</select>
					</div>
				</div>
				<div className="col-md-6">
					<div className="mb-3">
						<label htmlFor="phone" className="form-label">Num. Teléfono</label>
						<input type="text" className="form-control" name="phone" id="phone" placeholder="Num. Teléfono" value={props.values.phone} onChange={e => props.handleChange({ phone: e.target.value })} required maxLength={20} pattern="^(?:\+52|0)?[1-9]\d{9}$" />
					</div>
				</div>
				<div className="col-md-12">
					<div className="mb-3">
						<label htmlFor="address" className="form-label">Dirección</label>
						<input type="text" className="form-control" name="address" id="address" placeholder="Dirección" value={props.values.address} onChange={e => props.handleChange({ address: e.target.value })} required maxLength={100} />
					</div>
				</div>
				<div className="col-md-12 text-center">
					<button type="submit" className="btn btn-primary">Siguiente</button>
				</div>
			</div>
		</form>
	);
};

export default Personal;