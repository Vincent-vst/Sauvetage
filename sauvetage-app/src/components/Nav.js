import React from 'react';
import { NavLink } from "react-router-dom";

const Nav = () => {
    return (
        <div className="navigation">
            <NavLink exact to="/" className={({ isActive }) => isActive ? "red" : "blue"}>Accueil</NavLink>
            <NavLink exact to="/Articles" className={({ isActive }) => isActive ? "red" : "blue"}>Articles</NavLink>
            <NavLink exact to="/AProros" className={({ isActive }) => isActive ? "red" : "blue"}>À Propos</NavLink>
            <NavLink exact to="/Communaute" className={({ isActive }) => isActive ? "red" : "blue"}>Communauté</NavLink>
        </div>
    );
};

export default Nav;