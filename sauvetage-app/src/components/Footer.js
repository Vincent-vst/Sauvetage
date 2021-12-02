import react from 'react';
import {NavLink} from "react-router-dom"
const Footer = () => {
    return(
        <div className="footer">
            <NavLink exact activeClassName="active" to="/Contact">
                Contact
            </NavLink>
            <NavLink exact activeClassName="active" to="/APropos">
                A propos
            </NavLink>
            <h1>
                Liens
            </h1>
        </div>
    )
}
export default Footer;