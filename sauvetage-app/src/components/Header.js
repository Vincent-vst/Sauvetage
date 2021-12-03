import React from 'react';
import Logo from './Logo';
import Nav from './Nav';
import Recherche from './Recherche';

const Header = () => {
    return (
        <div classe="header">
            <Logo/>
            <Nav/>
            <Recherche/>
        </div>
    );
};

export default Header;