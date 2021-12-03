import Actualites from "../components/Actualites";
import Logo from "../components/Logo";
import Nav from "../components/Nav";
import Pres from "../components/Pres";
import Recherche from "../components/Recherche";

const Accueil = () => {
    return (
        <div className="accueil">
            <Pres />
            <Actualites />
        </div>
    );
};

export default Accueil;