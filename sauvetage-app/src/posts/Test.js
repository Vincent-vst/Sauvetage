import React, { Component } from 'react';
import data from "../data/medaille_MOCK.json";

const medailles = data.objet;

class Test extends Component {
    render() {
        return (
            <div>
                {medailles.map((medaillesDetail) => {
                    return (
                        <p>
                            Numéro de la médaille : {medaillesDetail.id}<br/>
                            Nom de la médaille : {medaillesDetail.nom}<br/>
                            Description de la médaille : {medaillesDetail.description}
                        </p>
                    )
                })}
            </div>
        )
    }
}

export default Test;