import React, { Component } from 'react';
import data from "../data/medailles.json";

const sauveteur = data.objet;

class Sauveteur extends Component {
    render () {
        return (
            <div>
                {sauveteur.map(sauveteurData => (
                    <div>
                        <h1>{sauveteurData.nom} {sauveteurData.prenom}</h1>
                        <ul>
                            <li>Date de naissance : {sauveteurData.date_naissance}</li>
                            <li>Lieu de naissance : {sauveteurData.lieu_naissance}</li>
                            <li>Date de décès : {sauveteurData.date_deces}</li>
                            <li>Lieu de décès : {sauveteurData.lieu_deces}</li>
                            <li>Métier : {sauveteurData.metier}</li>
                            <li>Médailles : {sauveteurData.medailles.map(medaillesData => (<div>{medaillesData.nom}, {medaillesData.date}</div>))}</li>
                            <li>Sauvetages : {sauveteurData.sauvetages.map(sauvetages => <div>{sauvetages.date}, {sauvetages.bateau_coule}</div>)}</li>
                        </ul>
                    </div>
                    ))}

            </div>
        );
    }
}

export default Sauveteur;