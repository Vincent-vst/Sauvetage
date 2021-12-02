import Actualites from "../components/Actualites";
import Logo from "../components/Logo";
import Nav from "../components/Nav";
import Pres from "../components/Pres";

const Accueil = () => {
    return (
        <div className="accueil">
            <Logo/>
            <Nav />
            <h1>Ceci est la home page</h1>
            <Pres />
            <Actualites />
        </div>
    );
};

export default Accueil;