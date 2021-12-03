import React, {useState} from 'react';




const PopUp = () => {

    const[popUp, setPopUp] = useState(false);

    const togglePupUp = () => {
        setPopUp(!popUp)
    }

    const url = () => {
        return window.location.protocol + "/" + window.location.host + "/" + window.location.pathname + window.location.search
    }

    

    return (
        <>
            <input
            type="image"
            src="./img/connexion.png"
                onClick={togglePupUp}
                className="btn-connexion"/>

            {popUp && (
                <div className="popUp">
                <div onClick={togglePupUp} className="overlay">
                </div>
                <div className="popUp-content">
                    <h2>Connexion</h2>
                    <div className="input-co"><input type="text" placeholder="Identifiant"/></div>
                    <div className="input-co"><input type="password" placeholder="Mot de passe"/></div>
                    <div className="input-co"><input type="submit" placeholder="Valider"/></div>
                    <button className="close-popUp" onClick={togglePupUp}> X
                    </button>
                    <button className="google-popUp" onClick= {() => window.location.href = "../../../php-files/auth/login-google.php?prev="+url()}> S'authentifier avec Google
                    </button>
                    
                </div>
            </div>
            )}

            
        </>
    );
};

export default PopUp;