# IS601-Final Project

Heroku Link: http://is601faq1.herokuapp.com/

Git hub link: https://github.com/sg397/is601faq

<h3>EPIC:</h3> Dashboard page displaying the below given 3 graphs.

1. Most viewed Questions Line Graph: Based on the views a question received. Note: The graph shows only Q's that has atleast one view.

2. Donut Graph showing how many question answered and how many unanswered questions in the FAQ application.

3. Most Active Users Bar Graph: Based on number of questions created by user.



<h3>Userstories:<h3>

<h4>Userstory#1.</h4> As a user when I visit FAQ website, I want to see a Dashboard page displaying a Bar graph of active users of this website. The user is considered more active based on number of questions he/she created.
<br><b><u>Test:</u></b> To test, please login to faq application and add few questions, click on Dashboard to see the updated "Active Users Creating FAQ's" graph. Note- The graph shows users only if they have atleast one question.
 
<h4>Userstory#2.</h4> As a login user when I go to my home page, I should see a question view count on Question card header.  
<br><b><u>Test:</u></b> To test, please login to faq application, verify the View Count:<int> on top of the question cards. This will be incremented whenever the question View button is clicked

<h4>Userstory#3.</h4> As a user when I go to FAQ website, I want to see a Dashboard page displaying a Line graph of most viewed questions of this website. View counter added in userstory#2 can be used to find the popularity of the questions.
<p><br><b><u>Test:</u></b> To test, please login to faq application, goto Home, verify the View Count:<int> on top of the question cards. This will be incremented whenever the question View button is clicked. The Dashboard "Popular Questions" graph will be updated with view counts. Note- The graph shows Questions only if they have atleast one view.</p> 

<h4>Userstory#4.</h4> As a user, I want to see Donut chart showing number of answered and un-answered questions in the website. 
<p><br><b><u>Test:</u></b> To test, please login to faq application, goto Home, add answers to question that was not answered. The Dashboard "Donut Chart" will be updated with updated. Note- Multiple answers to one question is still considered as question answered.</p> 



<h3>Development:</h3>

Charts are implmented using the below commands.

1. composer require consoletvs/charts
2. Added config details in config/app.php

consoleTVs\Charts\ChartsServiceProvider::class, ===>providers
'charts' => ConsoleTVs\Charts\Facades\Charts::class, ===>aliases
