import React, {useState} from 'react';

const PopUp = () => {

    const[popUp, setPopUp] = useState(false);

    const togglePupUp = () => {
        setPopUp(!popUp)
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
                    <div className="input-co"><input type="text" placeholder="Mot de passe"/></div>
                    <div className="input-co"><input type="submit" placeholder="Valider"/></div>
                    <button className="close-popUp" onClick={togglePupUp}> X
                    </button>
                </div>
            </div>
            )}

            
        </>
    );
};

export default PopUp;