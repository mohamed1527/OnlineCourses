<?php
require_once("View.php");
class ViewTable extends View{
	
    public function output(){
        $str = "";
        //echo $this->model->getFruits();
        
        foreach($this->model->getCourses() as $course){
            $str= $str . '<tr>'.
            '<td> ' . $course->getID() . " </td>".
            '<td> ' . $course->getCourseName() . " </td> ".
            '<td>' . $course->getCourseID() . " </td> ".
            '<td> ' . $course->getCourseType() . " </td> ".
            '<td> ' . $course->getCourseCost() . " </td> ".
            '<td> ' . $course->getCourseDescription() . " </td> ".
            '<td> ' . $course->getCourseWeeks() . " </td> ".
            '<td> ' . $course->getCourseHours() . " </td> ".
            '<td> ' . $course->getStart() . " </td> ".
            '<td> ' . $course->getEnd() . " </td> ".
            '<td><a href="viewcourses.php?id='.$course->getID().'">View Course </a></td> '.
            '<td><a href="editcourse.php?id='.$course->getID().'">Edit Course </a></td> '.
            '<td><a href="deletecourse.php?id='.$course->getID().'">Delete Course </a></td> '.
            '</tr>';
        }
        //$courses = $this->model->getcourses()
        //$courses[$_POST['id']]->getcourseid()
    
       
        return $str;
    }
    public function Users(){
        $str = "";
        //echo $this->model->getFruits();
        
        foreach($this->model->getUsers() as $user){
            $str= $str . '<tr>'.
            '<td>' . $user->getID() . " </td> ".
            '<td> ' . $user->getFirstName() . "</td>".
            '<td> ' . $user->getLastName() . " </td> ".
            '<td>' . $user->getEmail() . " </td> ".
            '<td> ' . $user->getPassword() . " </td> ".
            '<td> ' . $user->getPhone() . " </td> ".
            '<td> ' . $user->getImage() . " </td> ".
            '<td> ' . $user->getUserType() . " </td> ".
            '<td><a href="editusers.php?id='.$user->getID().'">Edit User </a></td> '.
            '<td><a href="deleteusers.php?id='.$user->getID().'">Delete User </a></td> '.
            '</tr>';
        }
    
       
        return $str;
    }
    public function Messages(){
        $str = "";

        foreach($this->model->getMessages() as $message){
            $str = $str .'<tr>'.
            '<td>' . $message->getSender() . " </td> ".
            '<td> ' . $message->getReceiver() . "</td>".
            '<td> ' . $message->getMessage() . " </td> ".
            '<td><a href="deletemessage.php?id='.$message->getID().'">Delete Message </a></td> '.
            '</tr>';
        }
        return $str;
    }

    public function Section(){
        $str = "";

        foreach($this->model->getSections() as $section){
            $str= $str . '<tr>'.
            '<td>' . $section->getID() . " </td> ".
            '<td> ' .$section->getSectionname() . "</td>".
            '<td> ' . $section->getSectiontime() . " </td> ".
            '<td>' . $section->getSectioncost() . " </td> ".
            '<td> ' . $section->getSectionlink() . " </td> ".
            '<td><a href="editsections.php?id='.$section->getID().'">Edit Section </a></td> '.
            '<td><a href="deletesections.php?id='.$section->getID().'">Delete Section</a></td> '.
            '</tr>';

        }

        return $str;

    }
    public function CoursesSections(){
        $id=$_GET['id'];
        $str = ""; 
        $courses = $this->model->getCourses();
        
        foreach($courses[$id]->getSections() as $section){
        
            $str= $str . '<tr>'.
            '<td>' . $section->getID()."</td>".
            '<td>' . $section->getSectionName()."</td>".
            '<td>' . $section->getSectionTime()."</td>".
            '<td>' . $section->getSectionCost()."</td>".   
            '<td>' . $section->getSectionLink()."</td>".
            
            $str.='</tr>';
    }


        return $str;
}
public function SectionsStudents(){
    $id=$_GET['id'];
    $str = ""; 
    $courses = $this->model->getCourses();
    
    foreach($courses[$id]->getSections() as $section){
    foreach($section->getStudents() as $student){
        $str= $str . '<tr>'.
        $str .= '<td>'.$student->getID().'</td>';
        $str .= '<td>'.$student->getFirstName().'</td>';
        $str .= '<td>'.$student->getLastName().'</td>';
        $str .= '<td>'.$student->getEmail().'</td>';
        $str .= '<td>'.$student->getPhone().'</td>';
    }
    $str.='</tr>';
    
}


    return $str;
}
//$section->getTeacher()->getCareer()
}?>
 