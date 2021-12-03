import React, { Component } from 'react'
import MedaillesData from "../data/medaille_MOCK.json"

class MedaillesList extends Component {
    render () {
        return (
            <div>
                <h1>Médaille</h1>
                {MedaillesData.map((medaillesDetail, index) => {
                    return (<p>Numéro de la médaille :{medaillesDetail.id}<br/>
                            Nom de la médaille :{medaillesDetail.nom}<br/>
                            Description de la médaille :{medaillesDetail.description}</p>)
                })}
            </div>
        )
    }
}

export default MedaillesList;