import React from "react";
import ReactDOM from "react-dom";
import Card from "./Card";

function BasicSection(props) {
    return (
        <>
            <p className={"basic-paragraph"}>Lorem Ipsum</p>
            <div className={"container-fluid"}>
                <div className={"row"}>
                    <Card url={props.url} />
                    <Card url={props.url} />
                    <Card url={props.url} />
                </div>
            </div>
        </>
    );
}

export default BasicSection;

if (document.getElementById('basic-section')) {
    ReactDOM.render(<BasicSection />, document.getElementById('basic-section'));
}
