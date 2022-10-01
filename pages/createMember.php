<div class="container-fluid inner">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12 top">
            <h1>Welcome to Clinton's HomeCell</h1>
        </div>
        <div class="col-md-12 col-lg-12 col-xl-12 bottom">
            <form action="createMember" method="POST">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-6 left">
                        <span>Member Details<span>
                        <div class="box tab">
                            <span>Personal Info<span>
                            <div class="form-group">
                                <input type="text" name="lastName" class="form-control" placeholder="Enter LastName" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="firstName" class="form-control" placeholder="Enter FirstName" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="otherName" class="form-control" placeholder="Enter otherName" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" name="dob" class="form-control" placeholder="Enter DOB" required>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="sex" required>
                                    <option value="Male">Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="box tab">
                            <span>Contact Info / Other Info<span>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Enter a valid email address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="number" class="form-control" placeholder="Enter a valid Mobile Number" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="occupation" class="form-control" placeholder="Enter your Occupation" required>
                            </div>
                            <div class="form-group">
                                <select name="maritalStatus" required>
                                    <option value="Single">Marital Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widow">Widow</option>
                                    <option value="Widower">Widower</option>
                                </select>
                            </div>
                        </div>
                        <div class="box tab">
                            <span>Location Info<span>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Enter House Address" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nationality" class="form-control" placeholder="Enter Nationality" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="state" class="form-control" placeholder="Enter State" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="town" class="form-control" placeholder="Enter Town" required>
                            </div>
                        </div>
                        <div class="box tab">
                            <span>Church Info<span>
                            <div class="form-group">
                                <select name="memberShip" required>
                                    <option value="Yes">Are you a Member</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="church" class="form-control" placeholder="Enter Church Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="branch" class="form-control" placeholder="Enter Church Branch" required>
                            </div>
                            <div class="form-group">
                                <select name="baptised" required>
                                    <option value="Yes">Are you Baptised</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-6 right">
                        <div class="box">
                            "Giving is a sign that you have conquered greed."
                            <br/>
                            <span style="color:red;">David Ibiyeomie</span>
                        </div>
                        <button type="button" class="prev" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" class="next" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        <input type="submit" name="registerMember" id="showSubmitBtn" class="btn btn2" value="Register">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

    if($_POST['registerMember']){

        extract($_POST);
    
        $tblquery = "INSERT INTO members VALUES(:memId, :lastName, :firstName, :otherName, :dob, 
        :sex, :email, :number, :occupation, :maritalStatus, :address, :nationality, :state, 
        :town, :areYouAMember, :churchName, :churchBranch, :areYouBaptised, :date)";
        $tblvalue = array(
            ':memId' => null,
            ':lastName' => htmlspecialchars(ucfirst($lastName)),
            ':firstName' => htmlspecialchars(ucfirst($firstName)),
            ':otherName' => htmlspecialchars(ucfirst($otherName)),
            ':dob' => htmlspecialchars($dob),
            ':sex' => htmlspecialchars($sex),
            ':email' => htmlspecialchars($email),
            ':number' => htmlspecialchars($number),
            ':occupation' => htmlspecialchars(ucfirst($occupation)),
            ':maritalStatus' => htmlspecialchars($maritalStatus),
            ':address' => htmlspecialchars(ucfirst($address)),
            ':nationality' => htmlspecialchars(ucfirst($nationality)),
            ':state' => htmlspecialchars(ucfirst($state)),
            ':town' => htmlspecialchars(ucfirst($town)),
            ':areYouAMember' => htmlspecialchars($memberShip),
            ':churchName' => htmlspecialchars(ucfirst($church)),
            ':churchBranch' => htmlspecialchars(ucfirst($branch)),
            ':areYouBaptised' => htmlspecialchars($baptised),
            ':date' => strftime("%Y-%m-%d %H:%M:%S", time())
        );
        //print_r($tblvalue);
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo '<script> window.location="http://localhost/favour/createMember/created"; </script>';
        }
    }
?>