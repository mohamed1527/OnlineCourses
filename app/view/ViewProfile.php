<?php
require_once(__ROOT__ . "view/View.php");
class ViewProfile extends View{
	
    public function profilecard(){
        $str = "";
        $str= '<div class="card">';
        $str='<img src="/w3images/team2.jpg" alt="John" style="width:100%">';
        $str = '<h1>John Doe</h1>';
        $str='<p class="title">CEO & Founder, Example</p>';
        $str='<p>Harvard University</p>';
        $str='<p><button>Contact</button></p>';
        $str='</div>';