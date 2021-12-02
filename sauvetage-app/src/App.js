import Acceuil from './pages/Accueil';
import  Admin from './pages/Admin';
import  APropos from './pages/APropos';
import  Articles from './pages/Articles';
import  Communaute from './pages/Communaute';
import  Connexion from './pages/Connexion';
import  Footer from './components/Footer';
import { BrowserRouter, Routes, Route } from "react-router-dom"; 
import Accueil from './pages/Accueil';
const App = () => {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
            <Route path="/" element={<Accueil />} />
        </Routes>
      </BrowserRouter>
    </div>
  
    );
}

export default App;
