import React from "react";
import ReactDOM from "react-dom";

function Card(props){
    return (
        <div className="card col-md-3">
            <img src={props.url} className="card-img" alt="Not loading" />
        </div>
    );
}

export default Card;

if (document.getElementById('card')) {
    ReactDOM.render(<Card />, document.getElementById('card'));
}
