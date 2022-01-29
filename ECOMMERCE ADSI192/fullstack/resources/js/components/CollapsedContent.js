import React from "react";
import ReactDOM from "react-dom";

function CollapsedContent() {
    return (
        <>
            <div className="pos-f-t">
                <div className="collapse" id="navbarToggleExternalContent">
                    <div className="bg-dark p-4">
                        <h4 className="text-white">Categorias</h4>
                        <ul className={"list-group list-group-horizontal"}>
                            <li className={"list-group-item text-white bg-dark"}>
                                <a href={"/productos"} className={"text-white"}>Productos</a>
                            </li>
                            <li className={"list-group-item text-white bg-dark"}>
                                <a href={"/productos"} className={"text-white"}>Productos</a>
                            </li>
                            <li className={"list-group-item text-white bg-dark"}>
                                <a href={"/productos"} className={"text-white"}>Productos</a>
                            </li>
                            <li className={"list-group-item text-white bg-dark"}>
                                <a href={"/productos"} className={"text-white"}>Productos</a>
                            </li>
                            <li className={"list-group-item text-white bg-dark"}>
                                <a href={"/productos"} className={"text-white"}>Productos</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <nav className="navbar navbar-dark bg-dark">
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent"
                            aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
        </>
    );
}

export default CollapsedContent;

if (document.getElementById('collapsed-content')) {
    ReactDOM.render(<CollapsedContent />, document.getElementById('collapsed-content'))
}
