@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	@include('components.sidebar')
        <div class="col-md-8 col-md-offset-2">
            
				
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
			
				
				<h1 align="left">About UCM</h1>


					<p><strong>About the University of Central Missouri</strong><br>
					The  University of Central Missouri experience transforms students into lifelong  learners, dedicated to service, with the knowledge, skills and confidence to  succeed and lead in the region, state, nation and world.</p>
					<p align="right"><img src="images/admin/ucmo.jpg"/ alt="UCM quad" width="325" height="212" hspace="5" vspace="5" align="right"></p>
					<p><strong>Reasons to Believe in a UCM  education.</strong></p>
					<ul>
					  <li><strong>A Culture of service</strong> connects students to something bigger than themselves through  opportunities to give back to the community such as Habitat for Humanity. </li>
					  <li><strong>Engaged Learning </strong>through hands-on learning experiences in and outside the classroom includes  programs such as Innovative Public Relations and the Integrative Business  Experience.</li>
					  <li><strong>Future-Focused Academics</strong> offers state-of-the-art equipment such as Redbird  simulators and internships to equip students with up-to-date skills.</li>
					  <li><strong>A Worldly Perspective</strong> enhances students&rsquo; college experience by offering opportunities  to participate in study abroad programs in countries such as France or New  Zealand.</li>
					</ul>
					<p><strong>Champions of Student  Success<br>
					</strong>UCM&rsquo;s <a href="http://www.ucmo.edu/contract">Learning to a Greater Degree Contract</a> is our promise to you that  with your commitment, we'll help you complete a more valuable degree on time. We  foster a community of engagement by providing you with resources to help you  succeed, such as our Student Success Center and Writing Center. We are proud of  our more than 90 percent employment rate for students six months after  graduation.</p>
					<p><strong>Focused on the Future<br>
					</strong>Founded  in 1871 in Warrensburg, Missouri with only a few dozen students, more than 140  years later, UCM has grown to serve more than 14,000 students. Our diverse  student population represents nearly every state and 50 countries across the  globe.</p>
					<p>Questions? <a href="http://www.ucmo.edu/contact/">Let us answer them</a>. Better yet, why not come  for a <a href="http://www.ucmo.edu/undergrad/visit/">visit</a> and tour campus? </p>

</div>  
					
                </div>
            </div>
        </div>
	</div>
		
   

@endsection
