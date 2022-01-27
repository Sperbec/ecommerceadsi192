import React from "react";
import ReactDOM from "react-dom";

function CollapsedContent() {
    return (
        <>
            <div className="pos-f-t">
                <div className="collapse" id="navbarToggleExternalContent">
                    <div className="bg-dark p-4">
                        <h4 className="text-white">Collapsed content</h4>
                        <span className="text-muted">Toggleable via the navbar brand.</span>
                    </div>
                </div>
                <nav className="navbar navbar-dark bg-dark">
                    <a className="navbar-toggler" type="button" data-bs-toggle="collapse"
                       data-bs-target="#navbarToggleExternalContent" href="#navbarToggleExternalContent"
                       aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </a>
                </nav>
            </div>
        </>
    );
}

export default CollapsedContent;

if (document.getElementById('collapsed-content')) {
    ReactDOM.render(<CollapsedContent />, document.getElementById('collapsed-content'))
}
