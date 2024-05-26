//src/components/navigation/Navbar.js
import React from 'react';
import { Link } from 'react-router-dom';

const Navbar = () => {
    return (
        <div>
            <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
                <div class="container-fluid">
                    <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                            <li className="nav-item">
                                <Link className="nav-link" to="/">Home</Link>
                            </li>
                            <li className="nav-item">
                                <Link className="nav-link" to="/produtos">Produtos</Link>
                            </li>
                            <li className="nav-item">
                                <Link className="nav-link" to="/vendas">Vendas</Link>
                            </li>
                        </ul>

                        <form class="d-flex" role="search">
                            {/* <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> */}
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

                    </div>
                </div>
            </nav>

        </div>
    );
};

export default Navbar;