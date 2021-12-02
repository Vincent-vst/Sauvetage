import react from 'react';
import {NavLink} from "react-router-dom"
const Footer = () => {
    return(
        <div className="footer">
            <div className="footerLeft" >
                <h1>Infox</h1>
            </div>
            <div className="footerRight" >
                <h1>
                    <NavLink exact activeClassName="active" to="/Contact">
                        Contact
                    </NavLink>
                </h1>
                <h1>
                <NavLink exact activeClassName="active" to="/APropos">
                    A propos
                </NavLink>
                </h1>
                <h1>
                    Liens
                </h1>
            </div>
        </div>
    )
}
export default Footer;