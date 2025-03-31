function Add({ isModalActive, setIsModalActive }) {
    const closeModal = () => {
        setIsModalActive(false);
    };

    return (
        <div className={`modal is-centered  ${isModalActive ? 'is-active' : false}`}>
            <div className="modal-background" onClick={closeModal}></div>
            <div className="modal-content has-background-white py-5 px-5">
                <h3 className="title m-6">Test</h3>
                <form>
                    <div className="field">
                        <label className="label">Name</label>
                        <div className="control">
                            <input type="text" className="input" placeholder="Name"/>
                        </div>
                    </div>
                    <div className="field">
                        <label className="label">Name</label>
                        <div className="control">
                            <input type="text" className="input" placeholder="Name"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    );
}

export default Add;
