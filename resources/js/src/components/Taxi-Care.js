import React from 'react';
import {
    Link
} from 'react-router-dom';
const TaxiCare= () =>{
    return (
        <div className="vh-100 flex " style={{backgroundColor:"#1885f5ad"}}>
            <div className="row justify-content-center pt-5" style={{height:"100%"}}>
                <div className="col-md-3 m-3">
                    <Link to={"/taxi-care/booking"} className=" p-3 btn btn-lg btn-secondary text-dark btn-block border-dark">Available Slot/Registration</Link>
                    <Link to={"/taxi-care/company/edit"} className=" p-3 btn btn-lg btn-secondary text-dark btn-block border-dark">Company Info/Edit</Link>
                </div>
            </div>
        </div>
    );

}

export default TaxiCare;