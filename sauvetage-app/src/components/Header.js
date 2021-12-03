import React from 'react';
import Logo from './Logo';
import Nav from './Nav';
import PopUp from './PopUp';
import Recherche from './Recherche';

const Header = () => {
    return (
        <div classe="header">
            <Logo/>
            <Nav/>
            <PopUp/>
            <Recherche/>
        </div>
    );
};

export default Header;