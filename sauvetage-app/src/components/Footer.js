import react from 'react';
import {NavLink} from "react-router-dom"
const Footer = () => {
    return(
        <div className="footer">
            <div className="footerCredit" >
                <h1>Infox</h1>
                <p>
                   Lorem ipsum dolor sit amet, consectetur adip
                </p>
                <p className="textCredit"> Site sous licence ©. Tous droits réservés.</p>
            </div>
            <div className="footerContact" >
                <h1>Contact</h1>
                <ul>
                    <li>Mail</li>
                    <li>Twitter</li>
                    <li>Facebook</li>
                    <li>Instagram</li>
                </ul>
            </div>
            <div className="footerPlus">
                <h1>En savoir plus</h1>
                <ul>
                    <li><NavLink to="/APropos">A propos</NavLink></li>
                    <li><NavLink to="/Historique">Historique</NavLink></li>
                </ul>
            </div>       
            <div className="footerLiens">
                <h1>Liens</h1>
                <ul>
                    <li>Blub</li>
                    <li>Blub</li>
                    <li>Blub</li>
                    <li>Blub</li>
                </ul>
            </div>
        </div>
    )
}
export default Footer;