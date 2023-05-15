import React from "react";

interface IProps {
    title: string,
    number: string,
    icon: string,
    color: string
}

const Widget = (props: IProps) => {
    return (
        <div className={`card my-card ${props.color}`}>
            <div className="my-auto mx-auto">
                <span className={`${props.icon} my-icon py-3 px-4`}></span>
            </div>
            <div className="my-auto px-4">
                <p className="mb-1">{props.title}</p>
                <h2 className="text-center">{props.number}</h2>
            </div>
        </div>
    )
}

export default Widget;