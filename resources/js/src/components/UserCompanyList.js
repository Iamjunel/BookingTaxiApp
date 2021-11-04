
import React, { useEffect, useState } from 'react';
import { Button, Modal } from 'react-bootstrap';
import { BsFillArrowLeftSquareFill } from 'react-icons/bs';
import {
    Link
} from 'react-router-dom';
const UserCompanyList = () => {

   
    return (
        <div className="vh-100 vw-100">
            <div className="row justify-content-center align-items-center m-1 pt-5" style={{ overflow: "auto" }}>
                <div >

                    <div className="col-md-12 col-sm-12 clearfix">
                        <h2 className="text-center"><Link to={'/'} className="text-dark pr-2"><BsFillArrowLeftSquareFill /></Link>Company List</h2>
                        <table className="table table-striped bg-white table-bordered ">
                            <thead>
                                <tr className="text-center">
                                    <th>Company Name</th>
                                    <th>ID</th>
                                    <th>Password</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Genno Company</td>
                                    <td>GEnno The grear</td>
                                    <td>alalang</td>
                                    <td>
                                        <Link to={'/company/details'} className="btn btn-danger">Details</Link>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Genno Company</td>
                                    <td>GEnno The grear</td>
                                    <td>alalang</td>
                                    <td><Link to={'/company/details'} className="btn btn-danger">Details</Link></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    );

}

export default UserCompanyList;