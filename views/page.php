<?php
include '../connector/connect.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpiderWork</title>
    <link rel="stylesheet" href="../styles/page.css" type="text/css">
</head>

<body>
<div>
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
                    document.getElementById("jobTitle").innerText = job.job_title;
                    document.getElementById("deadline").innerText = job.application_deadline;
                    document.getElementById("salary").innerText = job.salary;
                    document.getElementById("description").innerText = job.job_description;
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
        </script>
</body>

</html>