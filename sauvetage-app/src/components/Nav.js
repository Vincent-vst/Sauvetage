import React from 'react';
import { NavLink } from "react-router-dom";

const Nav = () => {
    return (
        <div className="navigation">
            <NavLink exact to="/">Accueil</NavLink>
            <NavLink exact to="/Articles">Articles</NavLink>
            <NavLink exact to="/AProros">À Propos</NavLink>
            <NavLink exact to="/Communaute">Communauté</NavLink>
        </div>
    );
};

export default Nav;