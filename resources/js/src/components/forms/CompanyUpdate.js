import React, { useEffect, useState } from 'react';
import { Button, Modal } from 'react-bootstrap';
import { BsFillArrowLeftSquareFill } from 'react-icons/bs';
import {
    Link
} from 'react-router-dom';

const CompanyUpdate= () =>{
    const [show, setShow] = useState(false);

    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);
    return (
        <div className="vh-100 vw-100" style={{backgroundColor:"#1885f5ad"}}>
            <div className="row justify-content-center align-items-center p-5">
                <div >
                    <div className="col-md-12 col-sm-12 clearfix">
                        <h2 className="float-left"><Link to={'/taxi-care'} className="text-dark pr-2"><BsFillArrowLeftSquareFill /></Link>Company Info</h2>
                        <form>
                        <a href="#" className="btn btn-primary float-right">Update</a>
                        <table className="table table-striped bg-white table-bordered p-1 ">
                            <thead>
                               
                            </thead>
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th><input type="text"/></th>


                                </tr>
                                <tr>
                                    <td>PW</td>
                                    <td><input type="text" /></td>
                                    
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text"/></td>

                                </tr>
                                <tr>
                                    <td>Phone number</td>
                                    <td><input type="text"/></td>

                                </tr>
                                <tr>
                                    <td>Cab Name</td>
                                    <td><input type="text"/></td>

                                </tr>
                                <tr>
                                    <td>Holidays</td>
                                    <td><input type="text"/></td>

                                </tr>
                                <tr>
                                    <td>Page</td>
                                    <td><input type="text"/></td>

                                </tr>
                                <tr>
                                    <td className="align-middle">Business Hours</td>
                                        <td className="p-1 m-0 pb-2"style={{width:"200px"}}>
                                            <tr>
                                                <td>Mon</td>
                                                <td><input type="text" /></td> <td>~</td> <td><input type="text" /></td>
                                            </tr>
                                            <tr>
                                                <td>Tue</td>
                                                <td><input type="text" /></td> <td>~</td> <td><input type="text" /></td>
                                            </tr>
                                            <tr>
                                                <td>Wed</td>
                                                <td><input type="text" /></td> <td>~</td> <td><input type="text" /></td>
                                            </tr>
                                            <tr>
                                                <td>Thurs</td>
                                                <td><input type="text" /></td> <td>~</td> <td><input type="text" /></td>
                                            </tr>
                                            <tr>
                                                <td>Fri</td>
                                                <td><input type="text" /></td> <td>~</td> <td><input type="text" /></td>
                                            </tr>
                                            <tr>
                                                <td>Sat</td>
                                                <td><input type="text" /></td> <td>~</td> <td><input type="text" /></td>
                                            </tr>
                                            <tr>
                                                <td>Sun</td>
                                                <td><input type="text" /></td> <td>~</td> <td><input type="text" /></td>
                                            </tr>
                                        </td>

                                </tr>

                                
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );

}

export default CompanyUpdate;