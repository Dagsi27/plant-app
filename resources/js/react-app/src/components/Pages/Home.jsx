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
                {error && <p className="error">{error}</p>}
                <div className="columns is-centered">
                    <div className="column">
                        <h2 className="title">Plants List</h2>
                        <ul>
                            {plants.map(plant => (
                                <li key={plant.id}>{plant.name}</li>
                            ))}
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    );
}

export default Home;
