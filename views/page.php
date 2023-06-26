<?php

session_start();
include_once '../connector/connect.php';
$conn = connect('spiderwork', 'root', '');


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpiderWork</title>
    <link rel="stylesheet" href="../styles/page.css?v=1.0" type="text/css">
</head>

<body>
    <div>
        <?php if(isset($_SESSION['userid'])): ?>
        <nav>
            <label class="logo">SpiderWork</label>
            <input class="searchBar" type="text" placeholder="Proffesion, Job Title or Keyword">
            <ul>
                <li><a class="navItem" href="#">Job Search</a></li>
                <li><a class="navItem" href="#">Career Guide</a></li>
                <li>|</li>
                <li><a class="navItem" href="#">For Employers</a></li>
            </ul>
        </nav>
        <?php endif; ?>
        <?php if(!isset($_SESSION['userid'])): ?>
        <nav>
            <label class="logo">SpiderWork</label>
            <input class="searchBar" type="text" placeholder="Proffesion, Job Title or Keyword">
            <ul>
                <li><a class="navItem" href="#">Job Search</a></li>
                <li><a class="navItem" href="#">Career Guide</a></li>
                <li><a class="navItem" href="#">Login</a></li>
                <li><a class="active" href="#">Register</a></li>
                <li>|</li>
                <li><a class="navItem" href="#">For Employers</a></li>
            </ul>
        </nav>
        <?php endif; ?>
    </div>
    <div class="mainPage">
        <section>
            <div class="bigSearchDiv">
                <div class="miniSearchDiv" id="miniSearchDiv">


                    <?php
                    $q = "SELECT * FROM  joblisting ORDER BY listing_id ASC";
                    $r123 = mysqli_query($dbc, $q);
                    while ($ro = mysqli_fetch_array($r123)) { ?>
                        <div class="jobListing" onclick="showDetails('<?php echo $ro['listing_id'] ?>')">
                            <div class="divisionLogoAndInfo">
                                <div class="jobLogo">
                                    <img class='profileImg' src="../images/bg image.jpeg" alt="profile" width="70" height="70">
                                </div>
                                <div class="jobInfo">
                                    <h3> <?php echo $ro['job_title'] ?></h3>
                                    <h4><?php echo $ro['company_profile'] ?></h4>
                                    <h4><?php echo $ro['salary'] ?></h4>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <main>
            <article class="jobArticle">
                <h2 class="jobTitle" id="jobTitle">Job Title</h2>
                <button class="applyLink" onclick="apply()"><a>Apply Now</a></button>

                <div id="notification"></div>

                <img class="jobImg" src="../images/team.png" alt="profile">
                <div>
                    <ul class="hoursAndSalary">
                        <li class="info" id="deadline">#Hours per week#</li>
                        <li class="info" id="salary">#Salary#</li>
                    </ul>
                </div>
                <div>
                    <p class="info" id="description">Job Description</p>
                </div>
            </article>
        </main>

    </div>
    <div id="page4">
        <div id="generalFooter">
            <ul>
                <li>
                    <h2>Contact Us</h2>
                </li>
                <li id="address">123 Anywhere St.<br>
                    Any City, ST 12345</li>
                <li id="tele">(123) 456-7890</li>
                <li id="mail">hello@reallygreatsite.com</li>
            </ul>
            <ul>
                <li>
                    <h2>SpiderWork</h2>
                </li>
                <li><a href="">About us</a></li>
            </ul>
            <ul>
                <li>
                    <h2>Browse</h2>
                </li>
                <li><a href="">All jobs</a></li>
                <li><a href="">All cities</a></li>
                <li><a href="">All companies</a></li>
                <li><a href="">All recruiters</a></li>
            </ul>
        </div>
        <div id="social">
            <li>Follow us online</li>
            <li class="logo"><img src="../images/facebook.png" width="20" height="20"></li>
            <li class='logo'><img src="../images/twitter.png" width="20" height="20"></li>
            <li class="logo"><img src="../images/instagram.png" width="20" height="20"></li>
        </div>
        <footer>
            <ul>
                <li><a href="">Terms of Service</a></li>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Cookie Settings</a></li>
            </ul>
        </footer>
    </div>
    <script>
        function showDetails(id) {
            const jobListings = <?php
                                $q = "SELECT * FROM joblisting ORDER BY listing_id ASC";
                                $r123 = mysqli_query($dbc, $q);
                                $jobListings = [];
                                while ($ro = mysqli_fetch_array($r123)) {
                                    $jobListings[] = $ro;
                                }
                                echo json_encode($jobListings);
                                ?>;

            const job = jobListings.find(item => item.listing_id === id);
            if (job) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '../controller/set_session.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                    console.log('Session variable set successfully');
                    } else {
                    console.error('Error setting session variable');
                    }
                }
                };
                xhr.send('listing_id=' + id); 

                document.getElementById("notification").innerHTML = "";
                document.getElementById("jobTitle").innerHTML = job.job_title;
                document.getElementById("deadline").innerHTML = "<b>Deadline</b>\n" + job.application_deadline;
                document.getElementById("salary").innerHTML ="<b>Salary</b>\n" + job.salary;
                document.getElementById("description").innerHTML ="<b>Description</b>\n" + job.job_description;
            }


            const navItems = document.querySelectorAll(".jobListing");
            for (const navItem of navItems) {
                navItem.addEventListener("click", function() {
                    const target = event.target;
                    const parent = target.closest(".jobListing");
                    unSelectAll();
                    parent.classList.add("selected");
                });
            }

            function unSelectAll() {
                for (const navItem of navItems) {
                    navItem.classList.remove("selected");
                }
            }
        }
        
        const apply = function() {
            //window.location.replace("../controller/application.php");

            fetch('../controller/application.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("notification").innerHTML = data;
                    });
        }
    </script>
</body>

</html>