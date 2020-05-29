import React from 'react';
import Navbar from "../components/navbar/Navbar";

import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
} from "react-router-dom";
import Dashboard from "../pages/Dashboard";

export default () => {
    return (
        <>
        <Navbar />
            <Router>
                <div>
                    <Switch>
                        <Route path="/dashboard/about">
                            about
                        </Route>
                        <Route path="/dashboard/users">
                           users
                        </Route>
                        <Route path="/dashboard">
                            <Dashboard/>
                        </Route>
                    </Switch>
                </div>
            </Router>
        </>

    )
};
