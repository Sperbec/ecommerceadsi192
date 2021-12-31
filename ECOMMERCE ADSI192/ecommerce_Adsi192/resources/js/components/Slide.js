import React from "react";
import ReactDOM from "react-dom";
import '../../../public/static/images/logo.jpg';
import '../../../public/static/images/testimg.jpg';

function Slide(props) {
    return (
        <div id="carouselExampleIndicators" className="carousel slide" data-bs-ride="carousel">
            <div className="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        className="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
            </div>
            <div className="carousel-inner">
                <div className="carousel-item active">
                    <img src={"https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/house-cleaning-product-on-wood-table-royalty-free-image-1584643103.jpg?crop=1.00xw:0.752xh;0,0&resize=1200:*"} className="d-block w-100" alt="Image is not loading" width={"460"} height={"360"} />
                </div>
                <div className="carousel-item">
                    <img src={"https://http2.mlstatic.com/D_NQ_NP_938756-MCO44071750559_112020-O.jpg"} className="d-block w-100" alt="Image is not loading" width={"460"} height={"360"} />
                </div>
                <div className="carousel-item">
                    <img src={"https://i.ytimg.com/vi/FQIHZhConmc/maxresdefault.jpg"} className="d-block w-100" alt="Image is not loading" width={"460"} height={"360"} />
                </div>
            </div>
            <button className="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                <span className="visually-hidden">Previous</span>
            </button>
            <button className="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                <span className="carousel-control-next-icon" aria-hidden="true"></span>
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
