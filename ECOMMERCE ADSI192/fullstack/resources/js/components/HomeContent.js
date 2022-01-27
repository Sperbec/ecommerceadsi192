import React from "react";
import ReactDOM from "react-dom";
import Slide from "./Slide";
import BasicSection from "./BasicSection";
import CollapsedContent from "./CollapsedContent";

function HomeContent(){
    return (
        <>
            <div className={"container-xxl"}>
                <Slide />
                <BasicSection url={"images/4f345a.png"} />
                <BasicSection url={"images/5d4e6d.png"} />
                <BasicSection url={"images/48a9a6.png"} />
            </div>
        </>
    );
}

export default HomeContent;

if (document.getElementById('home-content')){
    ReactDOM.render(<HomeContent />, document.getElementById('home-content'));
}
