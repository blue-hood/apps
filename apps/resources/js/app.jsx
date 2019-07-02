import React from 'react';
import ReactDOM from 'react-dom';
import TableOfContents from './components/TableOfContents';

const hambuger_button = document.querySelector("nav .hamburger-button");
const nav_menu = document.querySelector("nav .nav-menu");

if (hambuger_button && nav_menu) {
    hambuger_button.onclick = () => {
        nav_menu.classList.toggle("active");
    };
}

const table_of_contents = document.querySelectorAll(".table-of-contents");
//let table_of_contents_counter = 1;
table_of_contents.forEach(table => {
    ReactDOM.render(
        <TableOfContents />
        , table);
})