import Acceuil from './pages/Accueil';
import  Admin from './pages/Admin';
import  APropos from './pages/APropos';
import  Articles from './pages/Articles';
import  Communaute from './pages/Communaute';
import  Connexion from './pages/Connexion';
import  Footer from './components/Footer';
import { BrowserRouter, Routes, Route } from "react-router-dom"; 
import Accueil from './pages/Accueil';
import Header from './components/Header';
const App = () => {
  return (
    <div className="App">
      <BrowserRouter>
      <Header/>
        <Routes>
            <Route path="/" element={<Accueil />} />
            <Route path="/articles" element={<Articles />} />
        </Routes>
        <Footer />
      </BrowserRouter>
    </div>
  
    );
}

export default App;
