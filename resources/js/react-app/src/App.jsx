import React, {useState} from 'react';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import Header from './components/Header/Header';
import Footer from './components/Footer/Footer';
import Home from './components/Pages/Home';
import Add from './components/Modal/Add';
import 'bulma/css/bulma.min.css';

function App() {
    const [isModalActive, setIsModalActive] = useState(false);

    return (
        <Router>
            <Header setIsModalActive={setIsModalActive}/>
            <Add isModalActive={isModalActive} setIsModalActive={setIsModalActive}/>
            <Routes>
                <Route path="/" element={<Home />} />
            </Routes>
            <Footer />
        </Router>
    );
}

export default App;
