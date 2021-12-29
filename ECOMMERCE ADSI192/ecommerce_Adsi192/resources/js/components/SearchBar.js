import React from "react";
import ReactDOM from "react-dom";

function SearchBar() {
    return (
        <div className="form-outline">
            <input type="search" id="form1" className="form-control" placeholder="Buscar" aria-label="Search"/>
            <script src="{{ asset('js/app.js') }}"/>
        </div>
    );
}

export default SearchBar;

if (document.getElementById('search-bar')) {
    ReactDOM.render(<SearchBar />, document.getElementById('search-bar'));
}
