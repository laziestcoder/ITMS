<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');

class Project
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkUserName($username)
    {
        $query = "SELECT * FROM tbl_user WHERE username = '$username'";
        $getuser = $this->db->select($query);

        if ($username == "") {
            echo "<span class='error'> Please Enter Username.</span>";

        } elseif (!$getuser) {
            echo "<span class='error'><b>$username</b> not available !</span>";


        } else {
            echo "<span class='success'><b>$username</b> available !</span>";


        }
        exit();
    }


    public function autoComplete($search, $db_tbl, $row_name)
    {
        $query = "SELECT * FROM $db_tbl WHERE $row_name LIKE '%$search%'";
        $getroute = $this->db->select($query);
        //print_r($getroute);
        //var_dump($getroute);
        $row = strtoupper($row_name);
        $result = '<div class="searchresult"><b>' . $row . '</b><ul>';
        if ($getroute) {
            while ($data = $getroute->fetch_assoc()) {
                $result .= '<li><ss>' . $data[$row_name] . '</ss></li>';
            }
        } else {
            $result .= 'No Result Found!';
        }
        $result .= '</ul></div>';
        echo $result;
        exit();
    }

    public function autoPoint($search, $db_tbl, $row_name)
    {
        $query = "SELECT * FROM $db_tbl WHERE $row_name = '$search'";
        $getroute = $this->db->select($query);
        //print_r($getroute);
        //var_dump($getroute);
        if($getroute) {
            $data = $getroute->fetch_assoc();
            $data = $data['routeid'];
            $query = "SELECT * FROM tbl_point WHERE routeid = '$data'";
            $getroute = $this->db->select($query);
            $row_name = 'point';
            $row = strtoupper($row_name);
            $result = '<div class="searchresult"><b>' . $row . '</b><ul>';
            if ($getroute) {
                while ($data = $getroute->fetch_assoc()) {
                    $result .= '<li><ss>' . $data[$row_name] . '</ss></li>';
                }
            } else {
                $result .= 'No Result Found!';
            }
            $result .= '</ul></div>';
        }else{
            $result = 'No Result Found!';
        }

        echo $result;
        exit();
    }


    public function checkSingleInsert($value, $tblName, $rowName)
    {
        if ($value != '') {
            $value = mysqli_real_escape_string($this->db->link, $value);
            $query = "SELECT * FROM $tblName WHERE $rowName = '$value'";
            $getdata = $this->db->select($query);
            if (!$getdata) {
                $query = "INSERT INTO $tblName($rowName) VALUES('$value')";
                $getdata = $this->db->insert($query);
                if ($getdata) {
                    echo "<span class='success'>Data Inserted Successfully.</span>";
                } else {
                    echo "<span class='error'>Data Insertion Failed!</span>";
                }
            } else {
                echo "<span class='error'>Inputed Data Exist!</span>";
            }
        } else {
            echo "<span class='error'>Input Data First!</span>";
        }
        //echo "Function Worked!";
    }

    public function busInfoInsert($route, $day, $point, $tbl)
    {
        if ($route && $day && $point) {
            $route = "SELECT * FROM tbl_route WHERE route = '$route'";
            $route = $this->db->select($route);
            $point = "SELECT * FROM tbl_point WHERE point = '$point'";
            $point = $this->db->select($point);
            $day = "SELECT * FROM tbl_day WHERE day = '$day'";
            $day = $this->db->select($day);
            //print_r($route);
            if ($route) {
                $route = $route->fetch_assoc();
                $route = $route['routeid'];
            } else {
                echo "<span class='error'>Route Do Not Exist!</span>";
                exit();
            }

            if ($point) {
                $point = $point->fetch_assoc();
                $point = $point['pointid'];
            } else {
                echo "<span class='error'>Point Do Not Exist!</span>";
                exit();
            }
            if ($day) {
                $day = $day->fetch_assoc();
                $day = $day['dayid'];
            } else {
                echo "<span class='error'>Day Do Not Exist!</span>";
                exit();
            }
            //print_r($route);
            if ($point && $route && $day) {
                $query = "SELECT * FROM $tbl WHERE dayid = '$day' AND routeid = '$route' AND pointid = '$point' ";
                $query = $this->db->select($query);
                //print_r($query);
                if ($query) {
                    $query = $query->fetch_assoc();
                    $data = $query['studentno'];
                    //echo $data;
                    $data = $data + 1;
                    // print_r($data);
                    $query = "UPDATE $tbl SET routeid='$route',pointid='$point',studentno='$data',dayid='$day' WHERE 1";
                    $query = $this->db->update($query);
                    if ($query) {
                        echo "<span class='success'>Data Inserted Successfully.</span>";
                        exit();
                    } else {
                        echo "<span class='error'>Data Insertion Failed!</span>";
                        exit();
                    }
                    // print_r($query);
                } else {
                    $query = "INSERT INTO $tbl(routeid, pointid, studentno, dayid) VALUES ('$route','$point','1','$day')";
                    $query = $this->db->insert($query);
                    if ($query) {
                        echo "<span class='success'>Data Inserted Successfully.</span>";
                        exit();
                    } else {
                        echo "<span class='error'>Data Insertion Failed!</span>";
                        exit();
                    }
                    //print_r($query);
                    //var_dump($query);
                }
            } else {
                echo "<span class='error'>Data Insertion Failed!</span>";
                exit();
            }
        } else {
            echo "<span class='error'>Input Data First!</span>";
            exit();
        }
    }
    public function pickTimeInsert($day,$tbl)
    {
        if ($day ) {
            //$route = "SELECT * FROM tbl_route WHERE route = '$route'";
            //$route = $this->db->select($route);
            //$point = "SELECT * FROM tbl_point WHERE point = '$point'";
            //$point = $this->db->select($point);
            //$day = "SELECT * FROM tbl_day WHERE day = '$day'";
            //$day = $this->db->select($day);
            //print_r($route);
            if ($route) {
                $route = $route->fetch_assoc();
                $route = $route['routeid'];
            } else {
                echo "<span class='error'>Route Do Not Exist!</span>";
                exit();
            }

            if ($point) {
                $point = $point->fetch_assoc();
                $point = $point['pointid'];
            } else {
                echo "<span class='error'>Point Do Not Exist!</span>";
                exit();
            }
            if ($day) {
                $day = $day->fetch_assoc();
                $day = $day['dayid'];
            } else {
                echo "<span class='error'>Day Do Not Exist!</span>";
                exit();
            }
            //print_r($route);
            if ($point && $route && $day) {
                $query = "SELECT * FROM $tbl WHERE dayid = '$day' AND routeid = '$route' AND pointid = '$point' ";
                $query = $this->db->select($query);
                //print_r($query);
                if ($query) {
                    $query = $query->fetch_assoc();
                    $data = $query['studentno'];
                    //echo $data;
                    $data = $data + 1;
                    // print_r($data);
                    $query = "UPDATE $tbl SET routeid='$route',pointid='$point',studentno='$data',dayid='$day' WHERE 1";
                    $query = $this->db->update($query);
                    if ($query) {
                        echo "<span class='success'>Data Inserted Successfully.</span>";
                        exit();
                    } else {
                        echo "<span class='error'>Data Insertion Failed!</span>";
                        exit();
                    }
                    // print_r($query);
                } else {
                    $query = "INSERT INTO $tbl(routeid, pointid, studentno, dayid) VALUES ('$route','$point','1','$day')";
                    $query = $this->db->insert($query);
                    if ($query) {
                        echo "<span class='success'>Data Inserted Successfully.</span>";
                        exit();
                    } else {
                        echo "<span class='error'>Data Insertion Failed!</span>";
                        exit();
                    }
                    //print_r($query);
                    //var_dump($query);
                }
            } else {
                echo "<span class='error'>Data Insertion Failed!</span>";
                exit();
            }
        } else {
            echo "<span class='error'>Input Data First!</span>";
            exit();
        }
    }

    public function checkPointInsert($value, $value2, $tblName, $rowName, $rowName2)
    {
        if ($value && $value2) {
            $value2 = "SELECT * FROM tbl_route WHERE route = '$value2'";
            $value2 = $this->db->select($value2);
            //print_r($value2);
            if ($value2) {
                $value2 = $value2->fetch_assoc();
                $value2 = $value2['routeid'];
                $query = "SELECT * FROM $tblName WHERE $rowName = '$value'";
                $query = $this->db->select($query);
                //var_dump($value2);
                if (!$query) {

                    $query = "INSERT INTO $tblName($rowName,$rowName2) VALUES('$value','$value2') ";

                    $getdata = $this->db->insert($query);
                    //print_r($getdata);
                    if ($getdata) {
                        echo "<span class='success'>Data Inserted Successfully.</span>";
                    } else {
                        echo "<span class='error'>Data Insertion Failed!</span>";
                    }
                } else {
                    echo "<span class='error'>Point Exist!</span>";

                }
            } else {
                echo "<span class='error'>Route Doesn't Exist!</span>";

            }
        } else {
            echo "<span class='error'>Input Data First!</span>";

        }
    }

    public function getValuedData($tbl, $row)
    {
        $query = "SELECT * FROM $tbl ORDER BY $row  ";//DESC or nothing
        $getContent = $this->db->select($query);
        $rowName = strtoupper($row);
        $result = '<div class="searchresult"><b>' . $rowName . ' </b><ul>';
        if ($getContent) {
            while ($data = $getContent->fetch_assoc()) {

                $result .= '<li>' . $data[$row] . '</li>';
            }
        } else {
            $result .= 'No Result Found!';
        }
        $result .= '</ul></div>';
        echo $result;
        //exit();
    }


    public function getBusRouteInfo($id)
    {
        $query = "SELECT * FROM tbl_bus WHERE routeid = '$id'";//DESC or nothing
        $getContent = $this->db->select($query);
        $result = '<div class="showRouteDetails" > <h2>Route Details Information</h2><br><h3>Route Name: </h3> ';
        $flag = 0;
        $totalstd = 0;
        $totalBus = 0;
        if ($getContent) {
            $totalBus = 1;
            $flag = 1;
            $no = 1;
            $route = $id;
            $query = "SELECT * FROM tbl_route where routeid = '$route'";
            $query = $this->db->select($query);
            $query = $query->fetch_assoc();
            $route = $query['route'];
            $result .= $route . "<br>";
            $result .= '<table style="width:90%; text-align: center; "><tr><th>Serial No</th><th>Point Name</th><th>Day</th><th>Student No</th><th>Bus No</th></tr>';
            while ($data = $getContent->fetch_assoc()) {
                $point = $data['pointid'];
                $day = $data['dayid'];
                $stdNo = $data['studentno'];
                $query = "SELECT * FROM tbl_point where pointid = '$point'";
                $query = $this->db->select($query);
                $query = $query->fetch_assoc();
                $point = $query['point'];
                $query = "SELECT * FROM tbl_day where dayid = '$day'";
                $query = $this->db->select($query);
                $query = $query->fetch_assoc();
                $day = $query['day'];
                $busNo = 1;
                if ($stdNo / 40 > 1) {
                    $busNo = $busNo + round(($stdNo / 40)) - 1;
                }
                $result .= '<tr><td>' . $no . '</td><td>' . $point . '</td><td>' . $day . '</td><td>' . $stdNo . '</td><td>' . $busNo . '</td></tr>';
                $totalstd += $stdNo;
                $no += 1;

            }
        } else {
            $result .= '<b>No Information Found!</b>';
        }
        if ($flag) {
            $result .= '</table>';
        }
        if($totalstd>40){
            $totalBus += round(($totalstd/40))-1;
            //echo $totalBus;
        }

        $result .= '<br><br><b>Total Student Number:</b> '.$totalstd.'<br><b>Total Bus Number:</b> '.$totalBus;
        //$result .= '<button type="button" id="okbutton" name ="bus info" value="OK">OK</button>';
        $result .= '</div>';


        echo $result;
        //exit();
    }

    public function getBusInfo()
    {
        $query = "SELECT * FROM tbl_route";//DESC or nothing
        $getContent2 = $this->db->select($query);
        $result = '<div class="searchresult"><table style="width:100%"><tr><th>Serial No</th><th>Route Name</th><th>Day</th><th>Student No</th><th>Bus No</th></tr>';
        if ($getContent2) {
            $No = 1;
            while ($data2 = $getContent2->fetch_assoc()) {
                $routeid = $data2['routeid'];
                $query = "SELECT SUM(studentno) AS stdSum FROM tbl_bus WHERE routeid = '$routeid'";
                $query = $this->db->link->query($query);
                $query = mysqli_fetch_assoc($query);
                //print_r($query);
                $stdNo = $query['stdSum'];
                if (!$stdNo) {
                    $stdNo = 0;
                }
                $query = "SELECT * FROM tbl_bus WHERE routeid = '$routeid'";
                $getContent = $this->db->select($query);
                if ($getContent) {
                    //while (
                    $data = $getContent->fetch_assoc();
                }
                //){
                //$route = $data['routeid'];
                $point = $data['pointid'];
                $day = $data['dayid'];
                $route = $data2['route'];
                $query = "SELECT * FROM tbl_day where dayid = '$day'";
                $query = $this->db->select($query);
                $query = $query->fetch_assoc();
                $day = $query['day'];
                $busNo = 1;
                if ($stdNo == 0) {
                    $busNo = 0;
                } else if ($stdNo / 40 > 1) {
                    $busNo = $busNo + round(($stdNo / 40)) - 1;
                }
                $result .= '<tr><td>' . $No . '</td><td><ss><a target="_blank" href="details.php?id=' . $No . '" >' . $route . '</a></ss></td><td>' . $day . '</td><td>' . $stdNo . '</td><td>' . $busNo . '</td></td>';
                $No += 1;
                //}
                // }
            }
        } else {
            $result .= 'No Result Found!';
        }
        $result .= '</ul></table>';
        $result .= '<button type="button" id="okbutton" name ="bus info" value="OK">OK</button></div>';


        echo $result;
        //exit();
    }


    public function checkSearch($data)
    {
        $query = "SELECT * FROM tbl_search WHERE username LIKE '%$data%'";
        $getSearch = $this->db->select($query);
        if ($getSearch) {
            $data = "<table class ='tblone'>
			<tr>
			<th>Username</th>
			<th>Name</th>
			<th>Student ID</th>
			</tr>";
            while ($result = $getSearch->fetch_assoc()) {
                $data .= "<tr>
				<td>" . $result['username'] . "</td>
				<td>" . $result['name'] . "</td>
				<td>" . $result['studentid'] . "</td>
				</tr>";

            }
            $data .= "</table>";
            echo $data;

        } else {
            echo "Data Not Found.";
        }

    }

    public function autoSave($content, $contentid)
    {
        if ($contentid) {
            $query = "UPDATE tbl_autosave SET content = '$content', status = 'saved' WHERE contentid = '$contentid'";
            $updateData = $this->db->update($query);

        } else {
            $query = "INSERT INTO tbl_autosave(content,status) VALUES('$content','draft')";
            $insertData = $this->db->insert($query);
            $lastId = $this->db->link->insert_id;
            echo $lastId;
            exit();
        }
    }


}

?>