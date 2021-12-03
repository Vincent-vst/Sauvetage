import React, { Component } from 'react'
import MedaillesData from "../data/medaille_MOCK.json"

class MedaillesList extends Component {
    render () {
        return (
            <div>
                <h1>Hello There</h1>
                {MedaillesData.map((medaillesDetail, index) => {
                    return <h1>{medaillesDetail.id}</h1>
                })}
            </div>
        )
    }
}

export default MedaillesList;