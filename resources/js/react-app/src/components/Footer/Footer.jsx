import React from 'react';

function Footer() {
    return (
        <footer className="footer">
            <div className="content has-text-centered">
                <p>
                    &copy; {new Date().getFullYear()} My Application. All rights reserved.
                </p>
            </div>
        </footer>
    );
}

export default Footer;
