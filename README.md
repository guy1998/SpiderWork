# SpiderWork
The newest job seeking web app

This app is designed to facilitate the process of looking for a new job. The aim here is to have users such as jobseekers and employers. Employers have the opportunity to create new job listings and wait for job seekers to apply. On the other hand job seekers can view job listings or employer's profile and decide where they want to apply. The app provides a series of features like a cv generator that can be used from both employers and job seekers or a search bar that allows you to search for the job listings of a specific employer. 

# Specific details:

As of now the "SpiderWork" application provides two user levels: Employer and JobSeeker. The app is however designed to have another user (Recruiter) which will be added on the next update. 

Employer user:
-can view job seekers from his/her own field and can invite them
-can view job seekers' applications and reject or accept them
-can add new job listings
-is notified for each application
-can view job listings from other employers

JobSeeker user:
-can view employers from his/her own field
-gets notified for any response to his application
-can browse job listings from different employers
-can search for the job listings of a specific employer
-can apply to job listings
-can view employers upon their invitation

Both users can also generate their cv and can also change their profile information and delete their account.

# Security Details:

-The application is entirely secured from any injections with the use of placeholders for each query. 
-The application also provides a security system for users that try to go to one of the userviews (employer or jobseeker view) without logging in or signing up first. In such case a -user is redirected to the log in page. 
-If the user tries to log in even though they are already logged in, the program redirects them to their own feed page. 
-When the user tries to apply to a job listing without logging in first he is notified and the process does not go through. 
-If the user tries to apply to a job listing when they are actually an employer they are notified that they should be a job seeker to apply for jobs and the process does not go through. 
-The system provides form validations with dynamic responses for both login and signup processes.
-If the user tries to signup with an existant username the process does not go through and the user is redirected to an unsuccessful sign up page.
-If the user tries to log in with an unexisting username or a wrong password they are notified.
-The system guards against html tags injections and other special chars that should not be on the database.

# Next update brings:
-New user level: Recruiter
-Changing profile picture
-Dynamic search bars
-Searching by job title

# Contacts
ftafciu21@epoka.edu.al
acifliku21@epoka.edu.al
lertekin21@epoka.edu.al
dkreci21@epoka.edu.al
akasolli21@epoka.edu.al
oalsafarti21@epoka.edu.al