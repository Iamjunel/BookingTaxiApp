import React from 'react';

const TaxiCare= () =>{

    return (
        <div className="vh-100 flex " style={{backgroundColor:"#1885f5ad"}}>
            <div className="row justify-content-center align-items-center" style={{height:"100%"}}>
                <div className="col-md-3">
                    <button className =" p-3 btn btn-lg btn-outline text-dark btn-block border-dark">Available Slot/Registration</button>
                    <button className =" p-3 btn btn-lg btn-outline text-dark btn-block border-dark">Company Info/Edit</button>
                </div>
            </div>
        </div>
    );

}

export default TaxiCare;