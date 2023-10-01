import React from "react";
import { Card } from "./Props";
import "./styles.scss";


const Widget = (props: Card) => {
	return (
		<div className={`card div__card--shape ${props.color}`}>
			<div className="div--margin">
				<span className={`${props.icon} div--padding`}></span>
			</div>
			<div className="div--padding">
				<p className="div__title--size">{props.title}</p>
				<h2 className="text-center">{props.number}</h2>
			</div>
		</div>
	);
};

export default Widget;