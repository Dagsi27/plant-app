import React, { useEffect, useState } from 'react';
import logo from '@assets/logo.webp';

function Home() {
    const [plants, setPlants] = useState([]);
    const [error, setError] = useState(null);

    useEffect(() => {
        fetch(`${process.env.API_BASE_URL}plants`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => setPlants(data.data))
            .catch(error => {
                console.error('Error fetching plants:', error);
                setError(error.message);
            });
    }, []);

    return (
        <section className="section">
            <div className="container">
                <h1 className="title has-text-centered is-size-3 has-text-black">Plants</h1>
                <div className="columns mt-5 is-8 is-variable">
                    {error && <p className="error">{error}</p>}
                    {plants.map(plant => (
                    <div key={plant.id} className="column is-4-tablet is-3-desktop">
                        <div className="card has-shadow">
                            <div className="card-image has-text-centered px-6">
                                    <img src={logo} alt="Plant Shop"/>
                            </div>
                            <div className="card-content">
                                <p className="custom-title">{plant.name}</p>
                            </div>
                            <footer className="card-footer">
                                <a href={`/`} className="card-footer-item button is-info no-top-radius">
                                    Watering
                                </a>
                            </footer>
                        </div>
                    </div>
                    ))}
                </div>
            </div>
        </section>
    );
}

export default Home;
