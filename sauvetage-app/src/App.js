import Acceuil from './pages/Accueil';
import  Admin from './pages/Admin';
import  APropos from './pages/APropos';
import  Articles from './pages/Articles';
import  Communaute from './pages/Communaute';
import  Connexion from './pages/Connexion';
import  Footer from './components/Footer';
import Historique from './pages/Historique'
import { BrowserRouter, Routes, Route } from "react-router-dom"; 
import Accueil from './pages/Accueil';
import Header from './components/Header';
import MedaillesList from './posts/MedaillesList';
import Test from './posts/Test';

const App = () => {
  return (
    <div className="App">
      <BrowserRouter>
      <Header/>
        <Routes>
            <Route path="/" element={<Accueil />} />
            <Route path="/articles" element={<Articles />} />
            <Route path="/historique" element={<Historique />} />
            <Route path="/apropos" element={<APropos />} />
        </Routes>
        <Footer />
      </BrowserRouter>
      <Test />
    </div>
  
    );
}

export default App;
