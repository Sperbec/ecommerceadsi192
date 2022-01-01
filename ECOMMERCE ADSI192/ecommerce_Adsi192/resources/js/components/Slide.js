import React from "react";
import ReactDOM from "react-dom";

function Slide() {
    return (
        <div id="carouselExampleIndicators" className="carousel slide" data-bs-ride="carousel">
            <div className="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        className="active" aria-current="true" aria-label="Slide 1" />
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2" />
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3" />
            </div>
            <div className="carousel-inner">
                <div className="carousel-item active">
                    <img src="images/4f345a.png" className="d-block w-100" alt="Image is not loading" width={"460"} height={"360"} />
                </div>
                <div className="carousel-item">
                    <img src="images/5d4e6d.png" className="d-block w-100" alt="Image is not loading" width={"460"} height={"360"} />
                </div>
                <div className="carousel-item">
                    <img src="images/48a9a6.png" className="d-block w-100" alt="Image is not loading" width={"460"} height={"360"} />
                </div>
            </div>
            <button className="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                <span className="carousel-control-prev-icon" aria-hidden="true" />
                <span className="visually-hidden">Previous</span>
            </button>
            <button className="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                <span className="carousel-control-next-icon" aria-hidden="true" />
                <span className="visually-hidden">Next</span>
            </button>
            <script src="{{ asset('js/app.js') }}"/>
        </div>
    );
}

export default Slide;

if (document.getElementById('slide')) {
    ReactDOM.render(<Slide />, document.getElementById('slide'));
}
