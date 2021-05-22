import "../stylesheets/app.scss"
import React from 'react';
import ReactDOM from 'react-dom';
import { App } from "./Application/App";

const elements = Array.from(document.querySelectorAll('.app'));
elements.forEach((element) => {
    ReactDOM.render(<App {...element.dataset} />, element);
});
