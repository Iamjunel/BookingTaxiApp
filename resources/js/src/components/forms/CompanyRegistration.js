import React from 'react';
import { BsFillArrowLeftSquareFill } from 'react-icons/bs';
import {
    Link
} from 'react-router-dom';
const CompanyRegistration= () =>{
    
    return (
        <div className="vh-100 vw-100" style={{ backgroundColor: "rgb(231 226 190 / 38%)" }}>
            <div className="row justify-content-center align-items-center m-1 pt-5" style={{ overflow: "auto" }}>
                <div>
                    <div className="col-md-12 col-sm-12 clearfix">
                        <h2><Link to={'/admin'} className="text-dark mr-1"><BsFillArrowLeftSquareFill /></Link>Register a Company</h2>
                        <form>
                            <div className="mb-2">
                                <label className="form-label">Company Name:</label>
                                <input type="text" name="company_name" className="form-control" id="exampleInputEmail1"/>
                            </div>
                            <div className="mb-2">
                                <label className="form-label">ID:</label>
                                <input type="type" name="id" className="form-control" id="exampleInputEmail2"/>
                            </div>
                            <div className="mb-2">
                                <label  className="form-label">Password:</label>
                                <input type="password" className="form-control" id="exampleInputPassword1" />
                            </div>
                            <button type="submit" className="btn btn-block btn-secondary text-center">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        
    );

}

export default CompanyRegistration;