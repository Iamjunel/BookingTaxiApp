

import React from 'react';
import {
    Link
} from 'react-router-dom';
const Admin= () =>{

    return (
        <div className="vh-100 flex " style={{backgroundColor:"#ffff004a"}}>
            <div className="row justify-content-center align-items-center" style={{height:"100%"}}>
                <div className="col-md-3">
                    <Link to={"/admin/company/register"} className =" p-3 btn btn-lg btn-outline btn-secondary text-dark btn-block border-dark">New Registration</Link>
                    <Link to={"/admin/company"} className =" p-3 btn btn-lg btn-outline text-dark btn-secondary btn-block border-dark">Company List</Link>
                </div>
            </div>
        </div>  
    );

}

export default Admin;
 