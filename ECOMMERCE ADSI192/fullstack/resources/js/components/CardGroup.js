import React from "react";
import ReactDOM from "react-dom";
import Card from "./Card";

function CardGroup(){
    return (
        <>
            <Card url={"images/4f345a.png"}/>
            <Card url={"images/5d4e6d.png"}/>
            <Card url={"images/48a9a6.png"}/>
        </>
    );
}

export default CardGroup;

if (document.getElementById('card-group')) {
    ReactDOM.render(<CardGroup />, document.getElementById('card-group'));
}
