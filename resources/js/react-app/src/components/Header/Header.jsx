import React, { useState } from 'react';
import { Link, useNavigate } from 'react-router-dom'; // Dodajemy useNavigate
import '@styles/header.css';
import logo from '@assets/logo.webp';

function Header({ setIsModalActive }) {
    const [isActive, setIsActive] = useState(false);
    const navigate = useNavigate(); // Inicjalizujemy useNavigate

    const toggleMenu = () => {
        setIsActive(!isActive);
    };

    const handleAddButton = () => {
        setIsModalActive(true);
    };

    return (
        <nav className="navbar has-light-shadow is-white px-4" role="navigation" aria-label="main navigation">
            <div className="navbar-brand">
                <Link className="navbar-item" to="/">
                    <img src={logo} alt="Logo plants" style={{ maxHeight: '70px' }} className="py-2 px-2"/>
                </Link>
                <button
                    className={`navbar-burger burger ${isActive ? 'is-active' : ''}`}
                    aria-label="menu"
                    aria-expanded="false"
                    onClick={toggleMenu}
                >
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </button>
            </div>

            <div className={`navbar-menu ${isActive ? 'is-active' : ''}`}>
                <div className="navbar-start">
                    <Link className="navbar-item is-hoverable" to="/">
                        Home
                    </Link>
                    <Link className="navbar-item is-hoverable" to="/nouuts">
                        Nouuts
                    </Link>
                    <Link className="navbar-item is-hoverable" to="/prior">
                        Prior
                    </Link>
                    <Link className="navbar-item is-hoverable" to="/orlesetets">
                        Orlesetets
                    </Link>
                </div>
                <div className="navbar-end">
                    <div className="navbar-item">
                        <button className="navbar-item button is-success has-text-white"
                                onClick={handleAddButton}>
                            Add Plant
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    );
}

export default Header;
