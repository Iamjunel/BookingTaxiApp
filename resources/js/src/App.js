
import React from 'react';
import ReactDOM from 'react-dom';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
} from 'react-router-dom';
import Admin from './components/Admin';
import TaxiCare from './components/Taxi-Care';
import User from './components/User';
import Company from './components/Company';
import CompanyRegistration from './components/forms/CompanyRegistration';
import DeleteCompany from './components/modals/DeleteCompany';
import CompanyUpdate from './components/forms/CompanyUpdate';
import Booking from './components/Booking';
import BookingByDate from './components/BookingByDate';
import BookingUpdate from './components/forms/BookingUpdate';
const App = () =>{
    return (
        <Router>
            <Switch>
                <Route exact path= "/">
                    <User/>
                </Route>
                
                <Route exact path= "/admin">
                    <Admin/>
                </Route>
                <Route exact path= "/admin/company">
                    <Company/>
                </Route>
                <Route exact path= "/admin/company/register">
                    <CompanyRegistration/>
                </Route>
                <Route exact path= "/admin/company/deleteCompany">
                    <DeleteCompany/>
                </Route>

                <Route exact path= "/taxi-care">
                    <TaxiCare/>
                </Route>
                <Route exact path= "/taxi-care/company/edit">
                    <CompanyUpdate/>
                </Route>
                <Route exact path= "/taxi-care/booking">
                    <Booking/>
                </Route>
                <Route exact path= "/taxi-care/booking/edit">
                    <BookingByDate/>
                </Route>
                <Route path="*">
                    <Admin/>
                </Route>
            </Switch>
        </Router>
    );

}

export default App;
ReactDOM.render(<App/>,document.getElementById('app'));