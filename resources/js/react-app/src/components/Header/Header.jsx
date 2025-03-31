import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import '@styles/header.css';
import logo from '@assets/logo.webp';

function Header() {
    const [isActive, setIsActive] = useState(false);

    const toggleMenu = () => {
        setIsActive(!isActive);
    };

    return (
        <nav className="navbar has-light-shadow is-white" role="navigation" aria-label="main navigation">
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
                <div className="navbar-end">
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
                    <Link className="navbar-item is-hoverable" to="/sagn-moct">
                        Sagn Moct
                    </Link>
                </div>
            </div>
        </nav>
    );
}

export default Header;
