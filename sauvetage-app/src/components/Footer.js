import react from 'react';
import {NavLink} from "react-router-dom"
const Footer = () => {
    return(
        <div className="footer">
            <NavLink exact activeClassName="active" to="/home">
                Acceuil
            </NavLink>
            <NavLink exact activeClassName="active" to="/erreur">
                A propos
            </NavLink>
        </div>
    )
}
export default Footer;